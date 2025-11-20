<?php

namespace App\Livewire\Admin\Story;

use App\Models\Story;
use App\Traits\UploadFile;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination,WithFileUploads;

    public  $name;
    public  $thumbnail;
    public  $story;

    public function submit($formData)
    {
        if ($this->thumbnail)
        {
            $formData['thumbnail'] = $this->thumbnail;
        }

        if ($this->story)
        {
            $formData['story'] = $this->story;
        }
        $validator = Validator::make($formData, [
            'name' => 'required|string|max:50',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,webp|max:1024',//1MB
            'story' => 'required|mimes:mp4|max:51200',//50MB
        ], [
            '*.required' => 'فیلد ضروری است.',
            '*.string' => 'فرمت اشتباه است !',
            'name.max' => 'بیشتر',
            'thumbnail.mimes' => 'فرمت های مجاز تصویر : jpg,jpeg,png,webp !',
            'story.mimes' => 'فرمت های مجاز استوری : mp4 !',
            'thumbnail.max' => 'سایز تصویر حداکثر : ! 1MB',
            'story.max' => 'سایز استوری حداکثر : ! 50MB',
        ]);
        $validator->validate();
        $this->resetValidation();
        $thumbnailFileName = pathinfo($this->thumbnail->hashName(),PATHINFO_FILENAME).'.'.$this->thumbnail->extension();
        $storyFileName = pathinfo($this->story->hashName(),PATHINFO_FILENAME).'.'.$this->story->extension();

        Story::query()->create([
            'name' => $this->name,
            'thumbnail' => $thumbnailFileName,
            'story' => $storyFileName,
            'status' => true
        ]);

        Storage::disk('public')->put('stories/thumbnail',$this->thumbnail);
        Storage::disk('public')->put('stories/story',$this->story);

    }

    public function delete(Story $story_id)
    {
        $thumbnail = $story_id->thumbnail;
        $storyFile = $story_id->story;
        \Illuminate\Support\Facades\File::delete(public_path('stories/thumbnail/' . $thumbnail));
        \Illuminate\Support\Facades\File::delete(public_path('stories/story/' . $storyFile));
        $story_id->delete();
        $this->dispatch('success','عملیات حذف انجام شد');

    }

    public function  changeStatus(Story $story_id)
    {
        if ($story_id->status == false)
        {
            $story_id->update(['status' => true]);
            $this->dispatch('success','استوری فعال شد');

        }else
        {
            $story_id->update(['status' => false]);
            $this->dispatch('success','استوری غیر فعال شد');
        }
    }

    public function render()
    {
        $stories = Story::query()->paginate(10);
        return view('livewire.admin.story.index',[
            'stories' => $stories
        ])->layout('layouts.admin.app');
    }
}
