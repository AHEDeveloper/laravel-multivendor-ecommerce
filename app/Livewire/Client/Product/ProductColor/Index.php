<?php

namespace App\Livewire\Client\Product\ProductColor;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public $productId;
    public $productStock;
    public $product;
    public $inCart = false;

    #[On('startRenderProductSingle')]
    public function mount()
    {
        $this->inCart = Cart::query()->where([
            'product_id' => $this->productId,
            'user_id' => Auth::id()
        ])->exists();
    }
    public function addToCart($formData)
    {
        $intCount = intval($formData['count']); // نتیجه: 123
        Cart::query()->create(
            [
                'product_id' => $this->productId,
                'user_id' => Auth::id(),
                'quantity' => $intCount,
            ]
        );
        $this->inCart = true;
        $this->dispatch('startRenderCartDrawer');
        $this->dispatch('startGetCart');

    }

    public function render()
    {
        return view('livewire.client.product.product-color.index');
    }
}
