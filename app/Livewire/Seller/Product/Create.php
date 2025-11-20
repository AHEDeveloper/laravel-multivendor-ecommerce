<?php

namespace App\Livewire\Seller\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImag;
use App\Models\Seller;
use App\Repositories\admin\ProductAdminRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    // #[Validate('image|max:1024')]
    // #[Validate(['photos.*' => 'image|max:1024'])]
    public $photos = [];

    public $productId;

    public $categorys = [];

    public $name;
    public $slug;

    public $coverImage = 0;
    private $repository;
    //edit
    public $product;
    public $story;
    public $storyFileName;

    public function boot(ProductAdminRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function mount()
    {
        if ($_GET and $_GET['p_id']) {

            $this->productId = $_GET['p_id'];
            $product = $this->product = Product::query()
                ->with('seo', 'images')
                ->where('id', $_GET['p_id'])->firstOrFail();
            $this->name = $product->name;
            $this->slug = $product->seo->slug;
        }
        $this->categorys = Category::query()
            ->where('category_id','!=',null)
            ->select('id', 'name')->get();
        $this->sellers = Seller::query()->select('id', 'shop_name')->get();
    }

    public function updatedName()
    {
        $this->slug = Str::slug($this->name, '-', null);
    }

    public function submit($formData, Product $product)
    {
        if (isset($formData['featured'])) {
            $formData['featured'] = true;
        } else {
            $formData['featured'] = false;
        } //ویژگی

        if ($formData['discount_duration'] == "") {
            $formData['discount_duration'] = null;
        } //زمان انقظا

        if (!isset($formData['selleId'])) {
            $formData['sellerId'] = null;
        } //فروشنده

        $formData['photos'] = $this->photos;
        $formData['coverImage'] = $this->coverImage;
        $formData['story'] = $this->story;

        $validator = Validator::make($formData, [
            'photos.*' => 'nullable|image|mimes:png,jpg,jpeg,webp,gif',
            'name' => 'required|string',
            'slug' => 'required|string',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'price' => 'required|integer',
            'discount' => 'nullable|integer',
            'short_description' => 'nullable|string|min:50',
            'long_description' => 'nullable|string|min:50',
            'stock' => 'required|integer',
            'featured' => 'nullable|boolean',
            'discount_duration' => 'nullable|string',
            // 'categoryId' => 'nullable|exists:sellers,id',
            'coverImage' => 'required',
            'story' => 'nullable|mimes:mp4|max:51200'

        ], [
            'coverImage.required' => 'یک کاور برای ذخیره سازی نیاز است!!',
            '*.required' => 'فیلد ضروری است.',
            '*.string' => 'فرمت اشتباه است !',
            '*.integer' => 'این فیلد باید از نوع عددی باشد!',
            '*.min' => 'حداکثر تعداد کاراکترها : 50',
            'categoryId.exists' => 'دسته بندی نامعتبر است .',
            'sellerId.exists' => 'فروشنده نامعتبر است .',
            'photos.*.image' => '  فرمت نامعتبر است',
            'story.mimes' => 'فرمت های مجاز استوری : mp4 !',
            'story.max' => 'سایز استوری حداکثر : ! 50MB',
        ]);
        $validator->validate();

        if ($this->story)
        {
            $this->storyFileName = pathinfo($this->story->hashName(), PATHINFO_FILENAME) . '.' . $this->story->extension();
        }
        $this->repository->submit($formData, $this->productId, $this->photos, $this->coverImage, $this->storyFileName);
        Storage::disk('public')->put('stories/products', $this->story);
        session()->flash('success', 'عملیات با موفقیت انجام شد');
        return redirect(route('admin.product.list'));
    }

    public function setCoverImage($index)
    {
        $this->coverImage = $index;
        $this->dispatch('success', 'کاور شما تغییر کرد');
    }

    public function removePhoto($index)
    {
        if ($index == $this->coverImage) {
            $this->coverImage = null;
        }
        array_splice($this->photos, $index, 1);
    }

    public function removeOldPhoto(ProductImag $productImage, $productId)
    {
        $this->repository->removeOldPhoto($productImage, $productId);
    }

    public function setCoverOldImage($photoId)
    {
        $this->repository->setCoverOldImage($photoId, $this->productId);
        $this->dispatch('success', 'کاور شما تغییر کرد');
    }
    public function render()
    {
        return view('livewire.seller.product.create.index',[
            'categorys' => $this->categorys
        ])->layout('layouts.seller.app');
    }
}
