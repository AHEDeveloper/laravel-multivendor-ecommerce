<?php

use \App\Livewire\Seller\Auth\Index as AuthIndex;
use \App\Livewire\Seller\Dashboard\Index as DashboardIndex;
use \App\Livewire\Seller\Product\Create as ProductCreate;
use \App\Livewire\Seller\Product\Index as ProductIndex;
use \App\Livewire\Seller\Product\Content as ProductContent;
use \App\Livewire\Seller\Product\Feature as ProductFeature;
use \App\Livewire\Seller\Product\CkEditor as ProductCkEditor;
use \App\Livewire\Seller\Order\Index as OrderIndex;
use \App\Livewire\Seller\Order\Detaile as DetaileIndex;
use Illuminate\Support\Facades\Route;
Route::name('seller.')->group(function () {
    Route::get('/auth', AuthIndex::class)->name('auth.login')->middleware('guest:seller');
//    Route::get('/seller/logout', [AuthIndex::class,'logout'])->name('auth.logout')->middleware('auth:seller');

    Route::middleware('auth:seller')->group(function () {
        Route::get('/dashboard', DashboardIndex::class)->name('dashboard.index');
        Route::get('/product/create', ProductCreate::class)->name('product.create');
        Route::get('/product/list', ProductIndex::class)->name('product.list');
        Route::get('/product/features/{product}', ProductFeature::class)->name('product.features');
        Route::get('/product/content/{product}', ProductContent::class)->name('product.content');
        Route::post('/ck-upload/{productId}', [ProductCkEditor::class, 'upload'])->name('ck-upload');
        Route::get('/order', OrderIndex::class)->name('order.index');
        Route::get('/order/{order}', DetaileIndex::class)->name('order.detail.index');
    });

});

