<?php

namespace App\Livewire\Client\Product\ProductImage;

use Livewire\Component;

class Index extends Component
{
    public $productId;
    public $coverImage;
    public $images;
    public $product;

    public function mount()
    {
//        dd($this->product);
    }

    public function favorite()
    {
        if ($this->product->favorite == false)
        {
            $this->product->update(['favorite' => true]);
//            return redirect(route('client.favorite.index'));
        }
        elseif ($this->product->favorite == true)
        {
            $this->product->update(['favorite' => false]);
//            return redirect();
        }
    }
    public function render()
    {
        return view('livewire.client.product.product-image.index');
    }
}
