<?php

namespace App\Livewire\Client\Checkout;

use App\Contracts\PaymentGateWayInterface;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class Index extends Component
{
    public $order;
    public function mount($orderId)
    {
//        dd($orderId);
        $this->order = Order::query()->where('order_number',$orderId)->first();
//        dd($this->order);
    }

    public function submitOrder(PaymentGateWayInterface $paymentGateWay)
    {
        $paymentGateWay->request($this->order->amount,$this->order->order_number);
    }

    public function render()
    {
        return view('livewire.client.checkout.index')->layout('layouts.client.app-shipping');
    }
}
