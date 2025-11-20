<?php

namespace App\Livewire\Client\Home\Offers;

use App\Models\Cart;
use App\Models\Favorite;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use function Laravel\Prompts\alert;

class Index extends Component
{

//    public $products = [];
//
//    public function mount()
//    {
//
//
//    }

    public function favorite($product_id)
    {
        $favorite = Favorite::query()->where([
            'product_id' => $product_id,
            'user_id' => Auth::id()
        ])->first();
         $product = Product::query()->where('id',$product_id)->first();
         if ($favorite)
         {
             $favorite->delete();
         }
         elseif(!$favorite)
         {
             Favorite::query()->create([
                 'product_id' => $product_id,
                 'user_id' => Auth::id(),
                 'is_active' => 1
             ]);
             $this->redirect(route('client.favorite.index'));
         }

    }

    public function compare($product_id)
    {
        $product = Product::query()->where('id',$product_id)->first();
        if (!$product->compare)
        {
            $product->update(['compare' => true]);
            return redirect(route('client.compare.index'));
        }
        else
        {
            $product->update(['compare' => false]);
            return redirect(route('client.compare.index'));
        }

    }

    public function addToCart($product_id)
    {
        $cart = Cart::query()->where('product_id',$product_id)
            ->where('user_id',Auth::id())
            ->first();
        if ($cart)
        {
            $cart->update(['quantity' => $cart->quantity + 1]);

        }
        else {
            Cart::query()->updateOrCreate(
                [
                    'product_id' => $product_id,
                    'user_id' => Auth::id(),
                    'quantity' => 1,
                ]
            );
        }
        $this->dispatch('startGetCart');
        $this->dispatch('startRenderCartDrawer');
    }

    public function placeholder()
    {
        return view('layouts.client.placeholder.skeleton-offer');

    }

    public function render()
    {
        $dataNow = Carbon::now();
        $product = Product::query()
            ->whereNotNull('discount_duration')
            ->where('featured',true)
            ->where('discount_duration','>',$dataNow)
            ->with('coverImage','images','seo','favorite')
            ->limit(7)
            ->get();
//        dd($product);
        $products = $product->map(function ($item){
            $discountAmount = $item->price ? ($item->price * $item->discount /100) : 0;
            $discountPrice = $item->price - $discountAmount;
            $item->finalPrice = $discountPrice;
            return $item;
        });
        return view('livewire.client.home.offers.index',[
            'products' => $products
        ]);
    }
}
