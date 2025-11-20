<?php

use App\Livewire\Admin\City\Index as CityIndex;
use App\Livewire\Admin\Dashboard\Index as DashboardIndex;
use App\Livewire\Admin\Country\Index as CountryIndex;
use App\Livewire\Admin\State\Index as StateIndex;
use App\Livewire\Admin\Category\Index as CategoryIndex;
use App\Livewire\Admin\Category\Feature;
use App\Livewire\Admin\Category\FeatureValue;
use App\Livewire\Admin\Delivery\Index as DeliveryIndex;
use App\Livewire\Admin\Payment\Index as PaymentIndex;
use App\Livewire\Admin\Product\CkUpload;
use App\Livewire\Admin\Product\Content as ProductContent;
use App\Livewire\Admin\Product\Create as ProductCreate;
use App\Livewire\Admin\Product\Index as ProductIndex;
use App\Livewire\Admin\Product\Features as ProductFeatures;
use App\Livewire\Admin\Story\Index as StoryIndex;
use \App\Livewire\Admin\Slider\Index as SliderIndex;
use \App\Livewire\Admin\Order\Index as OrderIndex;
use \App\Livewire\Admin\Order\Detail as DetailIndex;
use \App\Livewire\Admin\Auth\Index as AuthIndex;
use \App\Livewire\Admin\User\Index as UserIndex;
use \App\Livewire\Admin\AdminUser\Index as AdminUserIndex;
use \App\Livewire\Admin\Blog\Index as BlogIndex;
use \App\Livewire\Admin\Blog\CkUpload as CkUploadIndex;
use \App\Livewire\Admin\Blog\Table as BlogTableIndex;
use \App\Livewire\Admin\Product\Filter as FilterIndex;
use \App\Livewire\Admin\MegaMenu\MegaCategory;
use \App\Livewire\Admin\MegaMenu\MegaFeature;
use \App\Livewire\Admin\MegaMenu\MegaValue;

use Illuminate\Support\Facades\Route;

Route::name('admin.')->group(function () {
    Route::get('/auth', AuthIndex::class)->name('auth.login')->middleware('guest:admin');
    Route::get('/logout', [AuthIndex::class,'logout'])->name('auth.logout')->middleware('auth:admin');
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', DashboardIndex::class)->name('dashboard.index');
        Route::get('/country', CountryIndex::class)->name('country.index');
        Route::get('/state', StateIndex::class)->name('state.index');
        Route::get('/city', CityIndex::class)->name('city.index');
        Route::get('/category', CategoryIndex::class)->name('category.index');
        Route::get('/category/{category}/feature', Feature::class)->name('category.feature');
        Route::get('/category/feature/{featurevalue}/value', FeatureValue::class)->name('category.feature.value');
        Route::get('/product/create', ProductCreate::class)->name('product.create');
        Route::get('/product/list', ProductIndex::class)->name('product.list');
        Route::get('/product/features/{product}', ProductFeatures::class)->name('product.features');
        Route::get('/product/content/{product}', ProductContent::class)->name('product.content');
        Route::post('/ck-upload/{productId}', [CkUpload::class, 'upload'])->name('ck-upload');
        Route::get('/delivery', DeliveryIndex::class)->name('delivery.Index');
        Route::get('/payment', PaymentIndex::class)->name('payment.index');
        Route::get('/story', StoryIndex::class)->name('story.index');
        Route::get('/slider', SliderIndex::class)->name('slider.index');
        Route::get('/order', OrderIndex::class)->name('order.index');
        Route::get('/order/{order}', DetailIndex::class)->name('order.detail.index');
        Route::get('/user', UserIndex::class)->name('user.index');
        Route::get('/admin-user', AdminUserIndex::class)->name('admin-user.index');
        Route::get('/blog', BlogIndex::class)->name('blog.index');
        Route::post('/blog/ck-upload', [CkUploadIndex::class, 'upload'])->name('blog.ck-upload');
        Route::get('/blog/table', BlogTableIndex::class)->name('blog.list');
        Route::get('/mega/category', MegaCategory::class)->name('mega.index');
        Route::get('/mega/category/feature/{category}', MegaFeature::class)->name('mega.feature');
        Route::get('/mega/category/feature/value/{feature}', MegaValue::class)->name('mega.value');
        Route::get('/product/filter/{product}', FilterIndex::class)->name('product.value');


    });
});

