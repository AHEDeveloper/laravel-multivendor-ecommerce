<?php

namespace App\Livewire\Client\Shop\Product;

use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $sort;
    public $search;
    public $productFilter;

    protected $queryString = [
        'sort'
    ];

    public function filter($number)
    {
        $this->sort = $number;
    }

    public function render()
    {
        $dataNow = Carbon::now();
        $query = Product::query()
            ->whereNotNull('discount_duration')
            ->where('featured', true)
            ->where('discount_duration', '>', $dataNow)
        ->when($this->search,function ($query){
            $query->where('name','like','%'.$this->search.'%');
    });

        if ($this->sort == 1)
        {
            $query->where('price', '>', 70000000);
        }
        elseif ($this->sort == 2)
        {
            $query->where('price', '<', 70000000);
        }
        $products = $query->with('coverImage', 'coverImageNull')->paginate(10);
        $products->map(function ($item) {
            $discountAmount = $item->price ? ($item->price * $item->discount / 100) : 0;
            $item->finalPrice = $item->price - $discountAmount;
            return $item;
        });

        return view('livewire.client.shop.product.index', [
            'products' => $products
        ]);
    }
}
