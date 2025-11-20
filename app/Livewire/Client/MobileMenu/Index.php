<?php

namespace App\Livewire\Client\MobileMenu;

use App\Models\Cart;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $countFavorite;
    public $countCart;

    public function mount()
    {
        $this->countFavorite = Favorite::query()->where('user_id',Auth::id())->count();
        $this->countCart = Cart::query()->where('user_id',Auth::id())->count();
    }

    public function render()
    {
        return view('livewire.client.mobile-menu.index');
    }
}
