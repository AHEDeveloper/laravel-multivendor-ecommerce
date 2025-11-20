<?php

namespace App\Livewire\Client\Home\BestSellingProduct;

use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $dateNow = Carbon::now();
        $bestProducts = Product::query()
            ->whereNotNull('discount_duration')
            ->whereHas('category',function ($query){
                $query->where('category_id',1);
            })
            ->where('discount_duration', '>', $dateNow)
            ->where('featured', true)
            ->with('coverImage', 'coverImageNull')
            ->select('id', 'name', 'price', 'p_code', 'discount')
            ->limit(7)
            ->get();
        $bestProducts->map(function ($item) {
            $discountAmount = $item->discount ? ($item->price * $item->discount / 100) : 0;
            $item->finalPrice = $item->price - $discountAmount;
            return $item;
        });
        return view('livewire.client.home.best-selling-product.index',[
            'bestProducts' => $bestProducts
        ]);
    }
}
