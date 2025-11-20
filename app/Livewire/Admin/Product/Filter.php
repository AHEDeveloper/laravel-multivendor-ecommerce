<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use App\Models\ProductFilter;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Filter extends Component
{

    public $value;
    public $filterId;
    public $product;


    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function submit($formData)
    {
        $validator = Validator::make($formData,[
            'value' => 'required|string|max:30',
        ],[
            'value.required' => 'نام خالی است',
            'value.string' => 'لطفا از حروف استفاده کنید',
            'value.max' => 'مقدار وارد شده بیشتر از 30 کارکتر است',
        ]);
        $validator->validate();
        \App\Models\ProductFilter::query()->updateOrCreate(
            [
                'id' => $this->filterId
            ],
            [
                'value' => $formData['value'],
                'product_id' => $this->product->id
            ]
        );
        $this->filterId = null;
        $this->reset('value');
        $this->dispatch('success','عملیات با موفقیت انجام شد');
    }

    public function edit($product_id)
    {
        $mega = \App\Models\ProductFilter::query()->where('id',$product_id)->first();
//        dd($mega);
        if ($mega)
        {
            $this->filterId = $mega->id;
            $this->value = $mega->value;
        }
    }

    public function delete($product_id)
    {
        $mega = \App\Models\ProductFilter::query()->where('id',$product_id)->first();
        if ($mega)
        {
            $mega->delete();
        }
    }

    public function render()
    {
        $productFilter = ProductFilter::query()
            ->where('product_id',$this->product->id)
            ->get();
        return view('livewire.admin.product.filter.index',[
            'productFilter' => $productFilter
        ])->layout('layouts.admin.app');
    }
}
