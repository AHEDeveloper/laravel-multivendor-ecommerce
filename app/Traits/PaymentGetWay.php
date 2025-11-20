<?php

namespace App\Traits;

use App\Classes\zibal;

trait PaymentGetWay
{
    protected function zibalRequest($amount)
    {
        $zibal = new zibal();
        $parameters = array(
            "merchant"=> config('services.zibal.merchent'),//required
            "callbackUrl"=> route('client.payment.callback'),//required
            "amount"=> $amount*10,//required

            "orderId"=> time(),//optional
            "mobile"=> "09120000000",//optional for mpg
        );

        $response = $zibal->postToZibal('request', $parameters);
        if ($response->result == 100)
        {
            $startGateWayUrl = "https://gateway.zibal.ir/start/".$response->trackId;
            return redirect($startGateWayUrl);
        }
        else{
          throw new \Exception('Error Code:' . $response->result . 'Message:' . $response->message) ;
        }
    }
    protected function zibalVerify()
    {
        $zibal = new zibal();
        if($_GET['success']==1) {
            echo "شناسه سفارش: ".$_GET['orderId']."<br>";

            //start verfication
            $parameters = array(
                "merchant" => 'zibal',//required
                "trackId" => $_GET['trackId'],//required

            );

            $response = $zibal->postToZibal('verify', $parameters);

            if ($response->result == 100) {
                echo "<pre>";//for pretty view :)
                var_dump($response);
                //update database or something else
            } else {
                throw new \Exception('result:' . $response->result . 'message:' . $response->message);
            }
        }else{
            echo "پرداخت با شکست مواجه شد.";
        }
    }
}
