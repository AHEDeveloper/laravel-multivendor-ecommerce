<?php

namespace App\Livewire\Admin\MegaMenu;

use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class MegaValue extends Component
{
    use WithPagination;
    public $name;
    public $value;
    public $megaValueId;
    public $megaFeature;


    public function mount(\App\Models\MegaFeature $feature)
    {
        $this->megaFeature = $feature;
    }

    public function submit($formData)
    {
        $validator = Validator::make($formData,[
            'name' => 'required|string|max:30',
            'value' => 'required|string|max:30',
        ],[
            'name.required' => 'نام خالی است',
            'name.string' => 'لطفا از حروف استفاده کنید',
            'name.max' => 'مقدار وارد شده بیشتر از 30 کارکتر است',
            'value.required' => 'فیلتر خالی است',
            'value.string' => 'لطفا از حروف استفاده کنید',
            'value.max' => 'مقدار وارد شده بیشتر از 30 کارکتر است',
        ]);
        $validator->validate();
        \App\Models\MegaValue::query()->updateOrCreate(
            [
                'id' => $this->megaValueId
            ],
            [
                'name' => $formData['name'],
                'value' => $formData['value'],
                'mega_feature_id' => $this->megaFeature->id
            ]
        );
        $this->megaValueId = null;
        $this->reset('name');
        $this->dispatch('success','عملیات با موفقیت انجام شد');
    }

    public function edit($megaValue_id)
    {
        $mega = \App\Models\MegaValue::query()->where('id',$megaValue_id)->first();
//        dd($mega);
        if ($mega)
        {
            $this->megaValueId = $mega->id;
            $this->name = $mega->name;
            $this->value = $mega->value;
        }
    }

    public function delete($megaValue_id)
    {
        $mega = \App\Models\MegaValue::query()->where('id',$megaValue_id)->first();
        if ($mega)
        {
            $mega->delete();
        }
    }

    public function render()
    {
        $megaValue = \App\Models\MegaValue::query()
            ->with('megaFeature')
            ->where('mega_feature_id',$this->megaFeature->id)
            ->paginate(10);
//        dd($megaValue);
        return view('livewire.admin.mega-menu.value-index.index',[
            'megaValue' => $megaValue
        ])->layout('layouts.admin.app');
    }
}
