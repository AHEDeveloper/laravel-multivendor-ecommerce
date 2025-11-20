<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use App\Repositories\admin\ProductAdminRepositoryInterface;
use App\Repositories\prod;
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
        $products = Product::query()->paginate(30);

        return view('livewire.admin.product.index',
            [
                'products' => $products
            ]
        )->layout('layouts.admin.app');
    }
}
