<?php

namespace App\Providers;


use App\Contracts\PaymentGateWayInterface;
use App\Models\PaymentMethod;
use Illuminate\Support\ServiceProvider;

class PaymentGateProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(PaymentGateWayInterface::class,function (){
            $activePayment = PaymentMethod::query()->where('is_active',true)->first();
            $getWayClass = 'App\\Services\\PaymentGateWay\\'.$activePayment->name;
            if (!$activePayment || !class_exists($getWayClass))
            {
                throw new \Exception('Active payment gateway not found or invalid class');
            }
            return new $getWayClass;
        });
    }

}
