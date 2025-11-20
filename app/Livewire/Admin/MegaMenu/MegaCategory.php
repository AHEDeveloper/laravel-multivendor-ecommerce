<?php

namespace App\Livewire\Admin\MegaMenu;

use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class MegaCategory extends Component
{

    public $name;
    public $megaCategoryId;

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
        \App\Models\MegaCategory::query()->updateOrCreate(
            [
                'id' => $this->megaCategoryId
            ],
            [
                'name' => $formData['name']
            ]
        );
        $this->megaCategoryId = null;
        $this->reset('name');
        $this->dispatch('success','عملیات با موفقیت انجام شد');
    }

    public function edit($megaCategory_id)
    {
        $mega = \App\Models\MegaCategory::query()->where('id',$megaCategory_id)->first();
        if ($mega)
        {
            $this->megaCategoryId = $mega->id;
            $this->name = $mega->name;
        }
    }

    public function delete($megaCategory_id)
    {
        $mega = \App\Models\MegaCategory::query()->where('id',$megaCategory_id)->first();
        if ($mega)
        {
            $mega->delete();
        }
    }

    public function render()
    {
        $megaCategorys = \App\Models\MegaCategory::query()->get();
        return view('livewire.admin.mega-menu.category-index.index',
        [
            'megaCategorys' => $megaCategorys
        ]
        )->layout('layouts.admin.app');
    }
}
