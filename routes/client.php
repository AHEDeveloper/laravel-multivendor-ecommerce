<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Client\Home\Index as HomeIndex;
use App\Livewire\Client\Auth\Index as AuthIndex;
use App\Livewire\Client\Shop\Index as ShopIndex;
use App\Livewire\Client\Auth\Otp as OtpIndex;
use App\Livewire\Client\Profile\Favorite\Index as FavoriteIndex;
use App\Livewire\Client\Compare\Index as CompareIndex;
use App\Livewire\Client\Product\Index as ProductIndex;
use App\Livewire\Client\Cart\Index as CartIndex;
use App\Livewire\Client\Shipping\Index as ShippingIndex;
use App\Livewire\Client\Checkout\Index as CheckoutIndex;
use App\Livewire\Client\Verify\Index as VerifyIndex;
use App\Livewire\Client\Weblog\Index as WeblogIndex;
use App\Livewire\Client\Weblog\Single as SingleIndex;
use App\Livewire\Client\Profile\Order\Index as OrderIndex;
use App\Livewire\Client\Profile\Order\Factor as FactorIndex;

use App\Livewire\Client\Profile\ProfileInformation\Index as ProfileInformationIndex;

Route::name('client.')->group(function (){
    Route::get('/',HomeIndex::class)->name('home.index');
    Route::get('/shop',ShopIndex::class)->name('shop.index');
//    Route::get('/shop/mobile/{category}', Shop::class)->name('client.shop.index');


    Route::get('/auth',AuthIndex::class)->name('auth.index');
    Route::get('/gmail',[AuthIndex::class,'redirectToProvider'])->name('gmail');
    Route::get('/auth/gmail/callback',[AuthIndex::class,'handleProviderCallback'])->name('gmail.callback');
    Route::get('/logout',[AuthIndex::class,'loguot'])->name('logout');
    //otp

    Route::get('/favorite',FavoriteIndex::class)->name('favorite.index');
    Route::get('/profile/information',ProfileInformationIndex::class)->name('profile-information.index');
    Route::get('/compare',CompareIndex::class)->name('compare.index');
    Route::get('/product/{p_code}/{slug?}',ProductIndex::class)->name('product.index');

    Route::get('/cart',CartIndex::class)->name('cart.index');
    Route::get('/shipping',ShippingIndex::class)->name('shipping.index');
    Route::get('/verify',VerifyIndex::class)->name('verify.index');
    Route::get('/weblog',WeblogIndex::class)->name('weblog.index');
    Route::get('/weblog/{id}/single',SingleIndex::class)->name('weblog.single');
    Route::get('/shipping/order/{orderId}',CheckoutIndex::class)->name('checkout.index');
    Route::get('/order',OrderIndex::class)->name('order.index');
    Route::get('/factor',FactorIndex::class)->name('factor.index');


});

