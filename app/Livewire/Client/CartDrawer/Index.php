<?php

namespace App\Livewire\Client\CartDrawer;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use function Laravel\Prompts\search;

class Index extends Component
{
    public function removeCardItem($cart_id)
    {
        $cart = Cart::query()->where('user_id',Auth::id())
            ->where('id',$cart_id)->delete();
        $this->dispatch('startRenderProductSingle');
        $this->dispatch('startGetCart');

    }
    #[On('startRenderCartDrawer')]
    public function render()
    {
        $invoice = [];
        $carts = Cart::query()->where('user_id',Auth::id())
            ->with([
                'product:id,name,price,discount,stock',
                'product.coverImage'
            ])
            ->get()
            ->map(function ($query){
                $product = $query->product;
                $originalPrice = $product->price * $query->quantity;
                $discountAmount = $product->discount ? ($product->discount * $product->price / 100) : 0;
                $discountPrice = $originalPrice - $discountAmount;

                $query->originalPrice = $originalPrice;
                $query->discountAmount = $discountAmount;
                $query->discountPrice = $discountPrice;

                return $query;
            })
        ;
//        dd($carts);
        $invoice = [
            'totalOriginalPrice' => $carts->sum('originalPrice'),
            'totalDiscountAmount' => $carts->sum('discountAmount'),
            'totalDiscountPrice' => $carts->sum('discountPrice'),
            'totalProductCount' => $carts->count()
        ];
        session()->put('invoice',$invoice);
        return view('livewire.client.cart-drawer.index',
        [
            'carts' => $carts,
            'invoice' => $invoice
        ]);
    }
}
