<?php

namespace App\Livewire\Seller\Order;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;

    public function orderStatus($orderItem_id, $value)
    {
        $validator = Validator::make(['status' => $value, 'id' => $orderItem_id], [
            'status' => 'required|in:pending,processing,completed,cancelled',
            'id' => 'required|exists:order_items,id'
        ], [
            'status.in' => 'مقدار وارد شده صحیح نیست',
            'status.required' => 'مقدار وارد شده صحیح نیست',
            'id.exists' => 'سفارش شما نامعتبر هست'
        ]);
        $validator->validate();
        $this->resetValidation();
        OrderItem::query()->where('id',$orderItem_id)->update(['status' => $value]);
        $this->dispatch('success', 'عملیات تغییر وضعیت انجام شد');

//        $orderItem_id->update(['status' => $value]);
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
        $status = $_GET['status'] ?? null;
        $search = $this->search;
        $sellerId = Auth::guard('seller')->id();

        $orderItems = OrderItem::query()
            ->whereHas('product', function ($query) use ($sellerId) {
                $query->where('seller_id', $sellerId);
            })
            ->whereHas('order.payment', function ($query) {
                $query->where('status', 'completed');
            })
            ->when($status && $status != 'all',function ($query) use ($status){
                $query->where('status',$status);
            })
            ->when($search,function ($query){
                $query->whereHas('order.user',function ($query){
                    $query->where('name','like','%'.$this->search.'%');
                });
            })
//            ->where(function ($query) use($search){
//                $query->whereHas('order.user',function ($query) use($search){
//                   $query->where('name','like','%'.$search.'%');
//                });
//            })
            ->with([
                'order.user:id,name,email,mobile',
                'product:id,name',
                'product.coverImage:id,path,product_id',
                'order.address'
            ])
            ->get()->map(function ($item) {
                return [
                    'id' => $item->id,
                    'quantity' => $item->quantity,
                    'created_at' => $item->created_at,
                    'price' => $item->price,
                    'status' => $item->status,
                    'statusColor' => $this->getColor($item->status),
                    'product' => $item->product,
                    'user' => $item->order->user,
                    'address' => $item->order->address
                ];
            });
//        dd($orderItems);


//        $ordersQuery = Order::query()
//            ->with('user')
//            ->when($this->search,function ($query){
//                $query->where('order_number','like','%'.$this->search.'%')
//                    ->orWhereHas('user',function ($query){
//                        $query->Where('name','like','%'.$this->search.'%')
//                            ->orWhere('mobile','like','%'.$this->search.'%')
//                            ->orWhere('email','like','%'.$this->search.'%');
//                    });
//            })
//            ->latest();
//        if (isset($_GET['status'])&& $_GET['status'] != 'all')
//        {
//            $ordersQuery->where('status','=',$_GET['status']);
//        }
//        if (isset($_GET['user'])&& $_GET['user'])
//        {
//            $ordersQuery->where('user_id','=',$_GET['user']);
//        }
//        $orders = $ordersQuery->paginate(10);
//
//        $orders->getCollection()->transform(function ($order) {
//            $parts = explode('-', $order->order_number);
//            $order->order_number = $parts[2] ?? null;
//            $order->statusColor = $this->getColor($order->status);
//            $order->statusPaymentColor = $this->getColor($order->payment->status);
//            return $order;
//        });

        return view('livewire.seller.order.index', [
            'orderItems' => $orderItems
        ])->layout('layouts.seller.app');
    }
}
