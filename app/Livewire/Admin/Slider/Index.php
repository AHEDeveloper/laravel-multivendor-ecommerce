<?php

namespace App\Livewire\Admin\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    public $title;
    public $link;
    public  $image;
    public  function submit($formData)
    {
        if ($this->title)
        {
            $formData['title'] = $this->title;
        }

        if ($this->link)
        {
            $formData['link'] =$this->link;
        }

        if ($this->image)
        {
            $formData['image'] = $this->image;
        }

        $validator = Validator::make($formData,[
            'name' => 'required|string|max:50',
            'link' => 'required|url',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp,gif|max:1024',//1MB
        ], [
            '*.required' => 'فیلد ضروری است.',
            '*.string' => 'فرمت اشتباه است !',
            'image.mimes' => 'فرمت های مجاز تصویر : jpg,jpeg,png,webp !',
            'image.max' => 'سایز تصویر حداکثر : ! 1MB',
        ]);
//        $validator->validate();
        $this->dispatch('success','عملیات ساخت اسلایدر انجام شد');
        $imageFile = pathinfo($this->image->hashName(),PATHINFO_FILENAME).'.'.$this->image->extension();

        Slider::query()->create([
            'name' => $formData['title'],
            'image' => $imageFile,
            'link' => $formData['link'],
            'status' => true
        ]);
        Storage::disk('public')->put('/banner/',$this->image);
    }

    public  function changeStatus(Slider $slider_id)
    {
        if ($slider_id->status == false)
        {
            $slider_id->update(['status' => true]);
            $this->dispatch('success','اسلایدر فعال شد');
        }
        else{
            $slider_id->update(['status' => false]);
            $this->dispatch('success','اسلایدر غیر فعال شد');
        }
    }

    public function delete(Slider $slider_id)
    {
        \Illuminate\Support\Facades\File::delete(public_path('/banner/'.$slider_id->image));
        $slider_id->delete();
        $this->dispatch('success','حذف انجام شد');
    }

    public function render()
    {
        $sliders = Slider::query()->get();
        return view('livewire.admin.slider.index',[
            'sliders' => $sliders
        ])->layout('layouts.admin.app');
    }
}
