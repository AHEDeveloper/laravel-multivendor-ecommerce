<?php

namespace App\Providers;

use App\Repositories\admin\blog\BlogAdminRepository;
use App\Repositories\admin\blog\BlogAdminRepositoryInterface;
use App\Repositories\admin\CategoryAdminRepository;
use App\Repositories\admin\CategoryAdminRepositoryInterface;
use App\Repositories\admin\Country_State_CityRepository;
use App\Repositories\admin\Country_State_CityRepositoryInterface;
use App\Repositories\admin\DeliveryAdminRepository;
use App\Repositories\admin\DeliveryAdminRepositoryInterface;
use App\Repositories\admin\PaymentAdminRepository;
use App\Repositories\admin\PaymentAdminRepositoryInterface;
use App\Repositories\admin\ProductAdminRepository;
use App\Repositories\admin\ProductAdminRepositoryInterface;
use App\Repositories\client\AuthClientRepository;
use App\Repositories\client\AuthAdminRepositoryInterface;
use App\Repositories\client\Product\ProductClientRepository;
use App\Repositories\client\Product\ProductClientRepositoryInterface;
use App\Services\Notification\KavenegarSmsService;
use App\Services\Notification\SmsServiceInterface;
use Carbon\Carbon;
use Illuminate\Notifications\Notification;
use Illuminate\Support\ServiceProvider;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->usePublicPath(__DIR__.'/../../public_html');
        $this->app->singleton(ProductAdminRepositoryInterface::class,ProductAdminRepository::class);
        $this->app->singleton(CategoryAdminRepositoryInterface::class,CategoryAdminRepository::class);
        $this->app->singleton(Country_State_CityRepositoryInterface::class,Country_State_CityRepository::class);
        $this->app->singleton(DeliveryAdminRepositoryInterface::class,DeliveryAdminRepository::class);
        $this->app->singleton(PaymentAdminRepositoryInterface::class,PaymentAdminRepository::class);
        $this->app->singleton(AuthAdminRepositoryInterface::class,AuthClientRepository::class);
        $this->app->singleton(ProductClientRepositoryInterface::class,ProductClientRepository::class);
        $this->app->singleton(BlogAdminRepositoryInterface::class,BlogAdminRepository::class);
        $this->app->singleton(SmsServiceInterface::class,KavenegarSmsService::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Carbon::setLocale('fa');
    }
}
