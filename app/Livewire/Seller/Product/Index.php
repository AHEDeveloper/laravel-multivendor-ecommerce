<?php

namespace App\Livewire\Seller\Product;

use App\Models\Product;
use App\Repositories\admin\ProductAdminRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    private $repository;

    public function boot(ProductAdminRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function delete(Product $product)
    {
        $this->repository->removeProduct($product);
        $this->dispatch('success','عملیات حذف محصول انجام شد');
    }

    public function render()
    {
        $sellerId = Auth::guard('seller')->id();
        $products = Product::query()
            ->where('seller_id',$sellerId)
            ->paginate(30);

        return view('livewire.seller.product.index',
            [
                'products' => $products
            ]
        )->layout('layouts.seller.app');
    }
}
