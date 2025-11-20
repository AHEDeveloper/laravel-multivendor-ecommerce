<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use App\Models\CategoryFeature;
use App\Repositories\admin\CategoryAdminRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class Feature extends Component
{
    use WithPagination;

    public $categoryName;
    public $categoryId;
    public $featureId;
    public $name;

    private $repository;
    public function boot(CategoryAdminRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function mount(Category $category)
    {
        $this->categoryName = $category->name;
        $this->categoryId = $category->id;
    }

    public function submit($formData,CategoryFeature $categoryfeature)
    {

        $validator = Validator::make($formData,[
            'name' => 'required|string|max:30'
        ],[
            'name.required' => 'نام خالی است',
            'name.string' => 'لطفا از حروف استفاده کنید',
            'name.max' => 'مقدار وارد شده بیشتر از 30 کارکتر است',
        ]);
        $validator->validate();
        $this->repository->submitCategoryFeature($formData,$this->categoryId,$this->featureId);
        $this->reset('name');
        $this->dispatch('success','عملیات با موفقیت انجام شد');
    }

    public function edit($feature_id)
    {
        $feature = CategoryFeature::query()->where('id',$feature_id)->first();
        if($feature)
        {
            $this->featureId = $feature->id;
            $this->name = $feature->name;
        }
    }

    public function delete($feature_id)
    {
        $feature = CategoryFeature::query()->where('id',$feature_id)->first();
        if($feature->value()->exists())
        {
           $this->dispatch('error','این ویژگی دارای مقادیر است نمیتوان ان را حذف کرد');
            return;
        }
        $feature->delete();
        $this->dispatch('success','عملیات حذف با موفقیت انجام شد');
    }

    public function render()
    {
        $categoryfeature = CategoryFeature::query()
        ->where('category_id',$this->categoryId)
        ->paginate(10);
        return view('livewire.admin.category.feature.index',[
            'categoryfeature' => $categoryfeature
        ])->layout('layouts.admin.app');
    }
}



