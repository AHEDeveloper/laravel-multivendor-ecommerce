<?php

namespace App\Livewire\Seller\Product;

use App\Models\Category;
use App\Models\CategoryFeature;
use App\Models\Product;
use App\Repositories\admin\ProductAdminRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Feature extends Component
{
    public $features =[];
    public $productId;
    private $repository;

    public function boot(ProductAdminRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function mount(Product $product)
    {
        $categoryId = $product->category_id;
        $category = Category::query()->find($categoryId);
        $this->productId = $product->id;
        $this->features = CategoryFeature::query()->where('category_id',$category->parent->id)->get();
    }

    public function submit($formData)
    {

        $featureIds = [];
        $featureValueIds = [];
        foreach($formData as $value)
        {
            list($featureId,$featureValueId) = explode('_',$value);
            $featureIds[] = $featureId;
            $featureValueIds[] = $featureValueId;
        }

        $data =[
            'featureIds' => $featureIds,
            'featureValueIds' => $featureValueIds
        ];

        $validator = Validator::make($data,[
            'feature_ids' => 'required|array',
            'feature_ids.*' => 'required|exists:category_features,id',
            'feature_value_ids' => 'required|array',
            'feature_value_ids.*' => 'required|exists:category_feature_values,id'
        ], [
            '*.required' => 'فیلد اجباری',
            '*.array' => 'نوع اطلاعات باید آرایه باشد',
            'feature_ids.*.exists' => 'وِیژگی نامعتبر است!',
            'feature_value_ids.*.exists' => 'مقادیر وِیژگی نامعتبر است!'

        ]);
        // $validator->validate('featureIds','featureValueIds');
        // $this->resetValidation();
        // dd('dd');
        $this->repository->submitProductFeature($formData,$this->productId);
        session()->flash('success','عملیات ویژگی ها با موفقیت انجام شد');
        return redirect(route('seller.product.list'));

    }

    public function render()
    {
        return view('livewire.seller.product.feature')->layout('layouts.seller.app');
    }
}
