<?php

namespace App\Livewire\Client\Product;

use App\Models\Product;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools;

class Index extends Component
{
    use SEOTools;
    public $product;
    public function mount($p_code, $slug = null)
    {
            $this->product = $product = Product::query()
                ->with('coverImage','images','video')
                ->where('p_code',$p_code)
                ->select('id','name','price','stock','favorite')
                ->firstOrFail();
//            dd($product);
        $this->seoConfig();
    }

    public function seoConfig()
    {
        $this->seo()
            ->setTitle($this->product->seo->meta_title)
            ->setDescription($this->product->seo->meta_description);
    }

    public function render()
    {
        return view('livewire.client.product.index');
    }
}
