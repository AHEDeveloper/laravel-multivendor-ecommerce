<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use App\Models\CategoryFeature;
use App\Models\CategoryFeatureValue;
use App\Repositories\admin\CategoryAdminRepository;
use Dotenv\Parser\Value;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class FeatureValue extends Component
{
    use WithPagination;
    public $featureId;
    public $featureName;

    public $valueId;
    public $value;
    public $megaCode;

    private $repository;
    public function boot(CategoryAdminRepository $repository)
    {
        $this->repository = $repository;
    }

    public function mount(CategoryFeature $featurevalue)
    {
        $this->featureId = $featurevalue->id;
        $this->featureName = $featurevalue->name;
    }

    public function submit($formData,CategoryFeatureValue $value)
    {

        $validator = Validator::make($formData,[
            'value' => 'required|string|max:30',
        ],[
            'value.required' => 'نام خالی است',
            'value.string' => 'لطفا از حروف استفاده کنید',
            'value.max' => 'مقدار وارد شده بیشتر از 30 کارکتر است',
        ]);
        $validator->validate();
        $this->repository->submitCategoryFeatureValue($formData,$this->valueId,$this->featureId);
        $this->reset('value');
         $this->dispatch('success','عملیات با موفقیت انجام شد');
    }

    public function edit($value_id)
    {
      $featurevalue = CategoryFeatureValue::query()->where('id',$value_id)->first();
      if($featurevalue)
      {
        $this->valueId = $value_id;
        $this->value = $featurevalue->value;
        $this->megaCode = $featurevalue->mega_code;
        $this->featureId = $featurevalue->category_feature_id;
      }
    }

    public function delete($value_id)
    {
        CategoryFeatureValue::query()->where('id',$value_id)->delete();
        $this->dispatch('success','عملیات حذف با موفقیت انجام شد');

    }

    public function render()
    {
        $featurevalues = CategoryFeatureValue::query()->where('category_feature_id',$this->featureId)->paginate(10);
        return view('livewire.admin.category.featureValue.index',[
            'featurevalues' => $featurevalues
        ])->layout('layouts.admin.app');
    }
}
