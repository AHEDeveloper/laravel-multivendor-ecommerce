<?php

namespace App\Livewire\Client\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $cartItems = [];
    public $invoice = [];
    public $outOfStock = false;

    public function mount()
    {

//    dd($this->cartItems);
    }

    public function removeCarts()
    {
        if ($this->cartItems) {
            $this->cartItems = [];
            Cart::query()->where('user_id', Auth::id())
                ->with('product', 'product.coverImage')
                ->delete();
        }
    }

    public function updateCartQuantity($cart_id, $type)
    {
        $cartItem = Cart::query()->where('id', $cart_id)
            ->with('product:id,stock')->firstOrFail();

        if ($type == 'increment') {
            if ($cartItem->quantity < $cartItem->product->stock) {
                $cartItem->increment('quantity', 1);
            }
            else
            {
                $this->outOfStock = true;
            }
        }
        else
        {
            $this->outOfStock = false;
            $cartItem->decrement('quantity',1);
            if ($cartItem->quantity < 1)
            {
                $cartItem->delete();
            }
        }
        $this->dispatch('startRenderCartDrawer');
    }

    public function sendInvoice()
    {
        session()->put('invoice',$this->invoice);
    }

    public function render()
    {
        $this->cartItems = Cart::query()->where('user_id', Auth::id())
            ->with('product:id,name,discount,stock,seller_id,price', 'product.coverImage:id,product_id,path', 'product.seller:id,shop_name')
            ->get()
            ->map(function ($item) {
                $product = $item->product;
                $originalPrice = $product->price * $item->quantity;
                $discountAmount = $product->discount ? ($product->discount * $product->price / 100) : 0;
                $discountPrice = $originalPrice - $discountAmount;

                $item->originalPrice = $originalPrice;
                $item->discountAmount = $discountAmount;
                $item->discountPrice = $discountPrice;

                return $item;
            });
        $this->invoice = [
            'totalOriginalPrice' => $this->cartItems->sum('originalPrice'),
            'totalDiscountAmount' => $this->cartItems->sum('discountAmount'),
            'totalDiscountPrice' => $this->cartItems->sum('discountPrice'),
            'totalProductCount' => $this->cartItems->count()
        ];
        session()->put('invoice',$this->invoice);
        return view('livewire.client.cart.index');
    }
}
