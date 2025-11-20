<?php

namespace App\Livewire\Client\Compare;

use App\Models\CategoryFeature;
use App\Models\Product;
use App\Models\ProductFeatureValue;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {

        $compares = Product::query()
            ->with('coverImage', 'coverImageNull')
            ->where('compare', true)
            ->get();
        $idsArray = $compares->pluck('id')->toArray();
        $categoryFeature = CategoryFeature::query()
            ->get();
        $productFeatutes = ProductFeatureValue::query()
            ->with('categoryFeature','categoryFeatureValue')
            ->whereIn('product_id',$idsArray)
            ->get();
//        dd($productFeatutes);



        return view('livewire.client.compare.index', [
            'compares' => $compares,
            'productFeatutes' => $productFeatutes,
            'categoryFeature' => $categoryFeature
        ]);
    }
}
