<?php

namespace App\Livewire\Client\Profile\Order;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $orderCurrents = [];
    public $orderCompleteds = [];
    public $orderCancelled= [];
    public $activeTab;

    public function mount()
    {
       $this->activeTab = 1;
        $this->orderCurrents = Order::query()
            ->with([
                'orderItems','orderItems.product','orderItems.product.coverImage'
            ])
            ->where([
                'user_id' => Auth::id(),
                'status' => 'awaiting_payment'
            ])->get();
    }
    public function orderTab($number)
    {
        $this->activeTab = $number;
        if ($number == 1)
        {
            $this->orderCurrents = Order::query()
                ->with([
                    'orderItems','orderItems.product','orderItems.product.coverImage'
                ])
                ->where([
                    'user_id' => Auth::id(),
                    'status' => 'awaiting_payment'
                ])->get();
        }
        elseif ($number == 2)
        {
            $this->orderCompleteds = Order::query()
                ->with([
                    'orderItems','orderItems.product','orderItems.product.coverImage'
                ])
                ->where([
                    'user_id' => Auth::id(),
                    'status' => 'completed '
                ])->get();
        }
        else
        {
            $this->orderCancelled = Order::query()
                ->with([
                    'orderItems','orderItems.product','orderItems.product.coverImage'
                ])
                ->where([
                    'user_id' => Auth::id(),
                    'status' => 'cancelled '
                ])->get();
        }
    }

    public function render()
    {

        return view('livewire.client.profile.order.index'
//            ,[
//            'orderCurrents' => $orderCurrents
//        ]
        );
    }
}
