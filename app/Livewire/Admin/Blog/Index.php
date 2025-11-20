<?php

namespace App\Livewire\Admin\Blog;

use App\Models\blog;
use App\Models\BlogImage;
use App\Models\SeoItem;
use App\Repositories\admin\blog\BlogAdminRepositoryInterface;
use App\Traits\UploadFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads,UploadFile;
    public $photo;
    public $name;
    public $result;
    public $blogId;
    public $description;
    public $study_time;
    public $category;
    public $slug;
    public $meta_title;
    public $meta_description;
    public $longDescription;
    public $blog;
    private $repository;

    public function boot(BlogAdminRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function mount()
    {
        if (isset($_GET['id']) && $_GET['id'])
        {
            $this->blog = $blog = blog::query()->where('id',$_GET['id'])->first();
            $this->blogId = $blog->id;
            $this->name = $blog->name;
            $this->study_time = $blog->StudyTime;
            $this->category = $blog->category;
            $this->longDescription = $blog->description;
            File::deleteDirectory('/blog/'.$blog->id);
        }
        if (isset($_GET['result']) && $_GET['result'])
        {
            $result = $_GET['result'];
            session()->put('result',$result);
        }


    }

    public function submit($formData)
    {
        $formData['photo'] = $this->photo;
        $validator = Validator::make($formData,[
            'photo.*' => 'nullable|image|mimes:png,jpg,jpeg,webp,gif',
            'name' => 'required|min:5|max:1000',
            'study_time' => 'required|min:5|max:100',
            'category' => 'required|min:5|max:100',
            'description' => 'required|min:50|max:1000000',
        ],[
            '*.required' => 'این فیلد ضرروری هست',
            '*.min' => 'لطفا بیشتر از 5 کارکتر استفاده کنید',
            'name.max' => 'لطفا کمتر از 1000 کارکتر استفاده کنید',
            '*.max' => 'لطفا کمتر از 100 کارکتر استفاده کنید',
            'description.max' => 'لطفا کمتر از 1000000 کارکتر استفاده کنید',
            'description.min' => 'لطفا بیشتر از 50 کارکتر استفاده کنید',
            'photo.*.image' => '  فرمت نامعتبر است',
        ]);
        $validator->validate();
        $this->repository->submit($formData,$this->blogId,$this->photo);
        $this->resetValidation();
        $this->redirect(route('admin.blog.list'));
    }

    public function render()
    {
        return view('livewire.admin.blog.index')->layout('layouts.admin.app');
    }
}

