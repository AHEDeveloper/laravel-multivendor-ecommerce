<?php

namespace App\Livewire\Client\Shop;

use App\Livewire\Admin\MegaMenu\MegaValue;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductFeatureValue;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $sort;
    public $search;
    public $filter;
    public $sendSearch;

    public $categoryId = null;
    public $productCategory = null;
    public $mobile = false;
    public $Ram = [];
    public $color = [];

    protected $queryString = [
        'sort',
        'Ram' => ['except' => ''],
        'categoryId',
        'filterRam' => ['except' => []]
    ];

    public function mount()
    {
        session()->forget('sendSearch');

        if (isset($_GET['filter']) && $_GET['filter']) {
            $this->filter = $_GET['filter'];
        }

        if (isset($_GET['q']) && $_GET['q']) {
            $this->sendSearch = $_GET['q'];
        }

        if (isset($_GET['categoryId']) && $_GET['categoryId']) {
            $number = intval($_GET['categoryId']);
            if ($number) {
                $this->productCategory = Category::query()->where('id', $number)->first();
                $this->categoryId = $this->productCategory->id;
            }
        }
    }

    public function filterOfRam()
    {
        return $this->Ram;
    }

    public function filterOfColor()
    {
        return $this->color;
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

    public function favorite($product_id)
    {
        $product = Product::query()->where('id', $product_id)->first();
        if ($product->favorite == false) {
            $product->update(['favorite' => true]);
            return redirect(route('client.favorite.index'));
        } elseif ($product->favorite == true) {
            $product->update(['favorite' => false]);
            return redirect(route('client.favorite.index'));
        }
    }

    public function sortFilter($number)
    {
        $this->sort = $number;
    }
    public function filterCategory($category_id)
    {
        $this->categoryId = $category_id;
    }

    public function render()
    {
        $dataNow = Carbon::now();
        $query = Product::query()
            ->whereNotNull('discount_duration')
            ->where('featured', true)
            ->where('discount_duration', '>', $dataNow)
            ->with('productFilter')
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            });

        if ($this->Ram)
        {
            $ram = $this->Ram;
            $query->whereHas('productFilter', function ($item) use ($ram){
                $item->whereIn('value',$ram);
            });
        }
        if ($this->color)
        {
            $color = $this->color;
            $query->whereHas('productFilter',function ($item) use ($color){
               $item->whereIn('value',$color);
            });
        }
        if ($this->sort == 1)
        {
            $query->where('price', '>', 70000000);
        } elseif ($this->sort == 2)
        {
            $query->where('price', '<', 70000000);
        }
        if ($this->filter) {
            $filter = $this->filter;
            $query->whereHas('productFilter', function ($query) use ($filter) {
                $query->where('value', '=', $filter);
            });
        }
        if ($this->categoryId) {
            $query->where('category_id', '=', $this->categoryId);
        }
        if ($this->sendSearch)
        {
            $query->where('name','like','%'.$this->sendSearch.'%');
        }
        $products = $query->with('coverImage', 'coverImageNull', 'productFilter')->paginate(6);
        $products->map(function ($item) {
            $discountAmount = $item->price ? ($item->price * $item->discount / 100) : 0;
            $item->finalPrice = $item->price - $discountAmount;
            return $item;
        });

        //category
        $queryCategorys = Category::query()
            ->with('cover');
        if ($this->productCategory) {
            if ($this->productCategory->category_id != 0) {
                $queryCategorys->where('category_id', '=', $this->productCategory->category_id);
            } else {
                $queryCategorys->where('category_id', '=', 1);
            }
        }
        if (!$this->productCategory) {
            $queryCategorys->where('category_id', '=', 1);
        }

        $categorys = $queryCategorys->get();

        return view('livewire.client.shop.index', [
            'products' => $products,
            'categorys' => $categorys
        ]);
    }
}
