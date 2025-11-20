<?php

namespace App\Livewire\Client\Product\ProductFeature;

use App\Models\ProductFeatureValue;
use Livewire\Component;

class Index extends Component
{
    public $productId;
    public $name;
    public $productFeatures;

    public function mount()
    {
        $this->productFeatures = ProductFeatureValue::query()
            ->with('categoryFeature','categoryFeatureValue')
            ->where('product_id',$this->productId)
            ->limit(8)
            ->get();
    }
    public function render()
    {
        return view('livewire.client.product.product-feature.index');
    }
}
