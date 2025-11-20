<?php

namespace App\Livewire\Client\Verify;


use App\Contracts\PaymentGateWayInterface;
use App\Models\Cart;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $paymentStatus = false;
    public $payment;
    public $orderNumber;

    public function mount(Request $request,PaymentGateWayInterface $paymentGateWay)
    {
       $paymentGateWay->verify($request);

       if ($request['success'] == "1")
       {
           $this->paymentStatus = true;
           if (session()->has('payment'))
           {
               $this->payment = session()->get('payment');
           }
           Cart::query()->where('user_id',Auth::id())->delete();
       }
       else
       {
           $this->paymentStatus = false;
           if (session()->has('payment'))
           {
               $this->payment = session()->get('payment');
               $this->orderNumber = session('orderNumber');
           }
       }
    }

    public function render()
    {
        return view('livewire.client.verify.index')->layout('layouts.client.app-verify');
    }
}
