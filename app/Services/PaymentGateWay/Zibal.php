<?php

namespace App\Services\PaymentGateWay;


use App\Contracts\PaymentGateWayInterface;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Auth;

class Zibal implements PaymentGateWayInterface
{
    public function request($amount,$orderNumber)
    {
        $zibal = new \App\Classes\zibal();
        $parameters = array(
            "merchant" => config('services.zibal.merchent'),//required
            "callbackUrl" => route('client.verify.index'),//required
            "amount" => $amount * 10,//required
            "orderId" => $orderNumber,//optional
            "mobile" => "09120000000",//optional for mpgwe
        );
        $response = $zibal->postToZibal('request', $parameters);
        if ($response->result == 100) {
            $startGateWayUrl = "https://gateway.zibal.ir/start/" . $response->trackId;
            return redirect($startGateWayUrl);
        } else {
            throw new \Exception('Error Code:' . $response->result . 'Message:' . $response->message);
        }
    }
    public function verify($request)
    {
        $payment = Payment::where('order_number', $request->orderId)
            ->with('user')
            ->firstOrFail();

        $order = Order::query()
            ->where('order_number', $request->orderId)
            ->firstOrFail();

        session()->forget(['paymentSuccess','paymentError']);

        $zibal = new \App\Classes\zibal();
        if($_GET['success']==1) {

            $parameters = array(
                "merchant" => 'zibal',
                "trackId" => $_GET['trackId'],
            );

            $response = $zibal->postToZibal('verify', $parameters);

            if ($response->result == 100)
            {

                $this->updatePayment($payment,$request);
                $this->updateOrder($order);
                $refNumber = $response->refNumber ?? 'نامشخص';
                session()->put('payment',$payment);
                session()->flash('paymentSuccess',"{$refNumber}");

            }
            elseif($response->result == 201)
            {
                session()->flash('paymentError','این تراکنش تکراری هست');
            }
        }else{
            session()->flash('paymentError','پرداخت با شکست مواجه شد');
        }
        session()->flash('portalName',"زرین پال");
        session()->flash('orderNumber',$payment->order_number);
    }

    public function updatePayment($payment,$request)
    {
        $payment->update([
            'status' => 'successful',
            'refNumber' => $request->refNumber,
            'cardNumber' => $request->cardNumber
        ]);
    }
    public function updateOrder($order)
    {
        $order->update([
            'status' => 'paid'
        ]);

        $order->whereHas('orderItems.product',function ($item){
           $item->update(['favorite' => 1]);
        });
    }

    public function getPaymentMethodId()
    {
        return PaymentMethod::query()->where('name', 'Zibal')->pluck('id')->first();
    }


}
