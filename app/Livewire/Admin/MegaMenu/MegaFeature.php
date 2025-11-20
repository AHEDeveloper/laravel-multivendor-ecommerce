<?php

namespace App\Livewire\Admin\MegaMenu;

use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class MegaFeature extends Component
{
    public $name;
    public $megaFeatureId;
    public $megaCategory;


    public function mount(\App\Models\MegaCategory $category)
    {
        $this->megaCategory = $category;
    }

    public function submit($formData)
    {
        $validator = Validator::make($formData,[
            'name' => 'required|string|max:30',
        ],[
            'name.required' => 'نام خالی است',
            'name.string' => 'لطفا از حروف استفاده کنید',
            'name.max' => 'مقدار وارد شده بیشتر از 30 کارکتر است',
        ]);
        $validator->validate();
        \App\Models\MegaFeature::query()->updateOrCreate(
            [
                'id' => $this->megaFeatureId
            ],
            [
                'name' => $formData['name'],
                'mega_category_id' => $this->megaCategory->id
            ]
        );
        $this->megaFeatureId = null;
        $this->reset('name');
        $this->dispatch('success','عملیات با موفقیت انجام شد');
    }

    public function edit($megaFeature_id)
    {
        $mega = \App\Models\MegaFeature::query()->where('id',$megaFeature_id)->first();
//        dd($mega);
        if ($mega)
        {
            $this->megaFeatureId = $mega->id;
            $this->name = $mega->name;
        }
    }

    public function delete($megaFeature_id)
    {
        $mega = \App\Models\MegaFeature::query()->where('id',$megaFeature_id)->first();
        if ($mega)
        {
            $mega->delete();
        }
    }

    public function render()
    {
        $megaFeature = \App\Models\MegaFeature::query()
            ->with('megaCategory')
            ->where('mega_category_id',$this->megaCategory->id)
            ->get();
//        dd($megaFeature);
        return view('livewire.admin.mega-menu.feature-index.index',
            [
                'megaFeature' => $megaFeature
            ]
        )->layout('layouts.admin.app');
    }
}
