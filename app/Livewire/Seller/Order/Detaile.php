<?php

namespace App\Livewire\Seller\Order;

use App\Models\Order;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Detaile extends Component
{
    public $orderDetails;
    public $statusColor;

    public function mount(Order $order)
    {
        $orderDetail = $this->orderDetails = $order->load([
            'orderItems', 'payment', 'paymentMethod',
            'orderItems.product:id,name,price,p_code',
            'orderItems.product.coverImage:id,path,product_id',
            'payment:status,cardNumber,refNumber,order_id'
        ]);
//        dd($this->orderDetails);

        $parts = explode('-', $orderDetail->order_number);
        $orderDetail->order_number = $parts[2] ?? null;
        $this->statusColor = $this->getColor($orderDetail->status);
        $orderDetail->statusColorPayment = $this->getColor($orderDetail->payment->status);
    }

    public function orderStatus(Order $order, $value)
    {
        $validator = Validator::make(['status' => $value, 'id' => $order->id], [
            'status' => 'required|in:pending,processing,completed,cancelled',
            'id' => 'required|exists:orders,id'
        ], [
            'status.in' => 'مقدار وارد شده صحیح نیست',
            'status.required' => 'مقدار وارد شده صحیح نیست',
            'id.exists' => 'سفارش شما نامعتبر هست'
        ]);
        $validator->validate();
        $this->resetValidation();
        $this->dispatch('success', 'عملیات تغییر وضعیت انجام شد');
        $order->update(['status' => $value]);
        $this->statusColor = $this->getColor($order->status);

    }

    public function getColor($status)
    {
        switch ($status) {
            case 'pending';
                return 'info';
            case 'processing';
                return 'primary';
            case 'completed';
                return 'success';
            case 'cancelled';
                return 'danger';
        }
    }

    public function render()
    {
        return view('livewire.seller.order.detail')->layout('layouts.seller.app');
    }
}
