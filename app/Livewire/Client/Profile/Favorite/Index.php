<?php

namespace App\Livewire\Client\Profile\Favorite;

use App\Models\Cart;
use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
use WithPagination;
    public function remove($favorite_id)
    {
        $favorite = Favorite::query()->where('id',$favorite_id)->first();
        if ($favorite)
        {
            $favorite->delete();
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

    public function render()
    {
        $favorites = Favorite::query()
            ->with('product')
            ->where('user_id',Auth::id())
            ->paginate(2);
//        dd($favorites);
        return view('livewire.client.profile.favorite.index',[
            'favorites' => $favorites
        ]);
    }
}
