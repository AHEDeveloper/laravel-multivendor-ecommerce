<?php

namespace App\Livewire\Admin\Order;

use App\Models\Order;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;

    public $search;

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
    }

    public function getColor($status)
    {
        switch ($status) {
            case 'awaiting_payment';
                return 'info';

            case 'paid';
                return 'success';

            case 'processing';
                return 'info';

            case 'completed';
                return 'success';

            case 'cancelled';
                return 'danger';

        }
    }

    public function render()
    {
        $ordersQuery = Order::query()
            ->with('user')
            ->when($this->search, function ($query) {
                $query->where('order_number', 'like', '%' . $this->search . '%')
                    ->orWhereHas('user', function ($query) {
                        $query->Where('name', 'like', '%' . $this->search . '%')
                            ->orWhere('mobile', 'like', '%' . $this->search . '%')
                            ->orWhere('email', 'like', '%' . $this->search . '%');
                    });
            })
            ->latest();
        if (isset($_GET['status']) && $_GET['status'] != 'all') {
            $ordersQuery->where('status', '=', $_GET['status']);
        }
        if (isset($_GET['user']) && $_GET['user']) {
            $ordersQuery->where('user_id', '=', $_GET['user']);
        }
        $orders = $ordersQuery->paginate(10);

        $orders->getCollection()->transform(function ($order) {
            $parts = explode('-', $order->order_number);
            $order->order_number = $parts[2] ?? null;
            $order->statusColor = $this->getColor($order->status);
            $order->statusPaymentColor = $this->getColor($order->payment->status);
            return $order;
        });

        return view('livewire.admin.order.index', [
            'orders' => $orders
        ])->layout('layouts.admin.app');
    }

}
