<?php

namespace App\Livewire\Client\MegaMenu;

use App\Models\Cart;
use App\Models\Category;
use App\Models\MegaCategory;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public $category;
    public $search;
    public $cart;
    #[On('startGetCart')]
    public function mount()
    {
        $this->cart = Cart::query()->where('user_id',Auth::id())->count();
    }

    public function render()
    {
        $megaCategory = MegaCategory::query()
            ->with('megaFeature','megaFeature.megaValue')
            ->get();
//        dd($megaCategory);
        return view('livewire.client.mega-menu.index', [
            'megaCategory' => $megaCategory,
        ]);
    }
}
