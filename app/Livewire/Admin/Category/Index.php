<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use App\Repositories\admin\CategoryAdminRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads,WithPagination;

    public $categorys = [];
    public $name;
    public $photo;
    public $categoryId;
    public $parent_id;

    private $repository;
    public function boot(CategoryAdminRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function mount()
    {
        $this->categorys = Category::all();
    }

    public function submit($formData)
    {
        $formData['photo'] = $this->photo;
        $validator = Validator::make($formData,[
            'photo' => 'nullable|image|mimes:png,jpg,jpeg,webp,gif',
            'name' => 'required|string|max:30',
            'parentId' => 'exists:categories,id'
        ],[
            'name.required' => 'نام خالی است',
            'name.string' => 'لطفا از حروف استفاده کنید',
            'name.max' => 'مقدار وارد شده بیشتر از 30 کارکتر است',
            'photo.mimes' => '  فرمت نامعتبر است',
            'photo.image' => 'لطفا عکس انتخاب کنید',
        ]);
        $validator->validate();
        $this->repository->submit($formData,$this->categoryId,$this->photo);
        $this->reset('name');
        $this->dispatch('success','عملیات با موفقیت انجام شد');

    }

    public function edit($category_id)
    {
        $category = Category::query()->where('id',$category_id)->first();
        if($category)
        {
            $this->categoryId = $category->id;
            $this->name = $category->name;
            $this->parent_id = $category->category_id;
        }
    }

    public function delete($category_id)
    {
        $category = Category::query()->where('id',$category_id)->first();
        if($category->children()->exists())
        {
            $this->dispatch('error','این رکورد دارای زیر شاخه است نمیتوان ان را حذف کرد');
            return;
        }

        if($category->childrenFeature()->exists())
        {
            $this->dispatch('error','این رکورد دارای ویژگی است نمیتوان ان را پاک کرد');
            return;
        }

        $category->delete();
        $this->dispatch('success','عملیات حذف انجام شود');
    }

    public function render()
    {
        $allCategorys = Category::query()
            ->with('cover')
            ->latest()
            ->paginate(10);
        return view('livewire.admin.category.category-index.index',[
            'allCategorys' => $allCategorys])->layout('layouts.admin.app');
    }
}
