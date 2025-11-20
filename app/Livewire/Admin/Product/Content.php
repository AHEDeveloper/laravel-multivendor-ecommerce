<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use App\Repositories\admin\ProductAdminRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Content extends Component
{
    public $productName;
    public $longDescription;
    public $shortDescription;
    public $productId;

    private $repository;

    public function boot(ProductAdminRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function mount(Product $product)
    {
        $this->productName = $product->name;
        $this->productId = $product->id;
        $this->shortDescription = $product->short_description;
        $this->longDescription = $product->long_description;
    }

    public function submit($formData,Product $product)
    {
        $formData['long_description'] = $this->longDescription;
//        dd($formData);

        $validate = Validator::make($formData, [
            'short_description' => 'required|string',
            'long_description' => 'required|string',
        ], [
            '*.required' => 'فیلد ضروری است.',
            '*.string' => 'فرمت اشتباه است !',
        ]);
        $validate->validate();
        $this->repository->submitProductContent($formData,$this->productId);
        session()->flash('success', 'عملیات با موفقیت انجام شد');
        return redirect(route('admin.product.list'));
    }

    public function render()
    {
        return view('livewire.admin.product.content')->layout('layouts.admin.app');
    }
}
