<?php

namespace App\Providers;

use Braintree\Gateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway([
                'environment' => 'sandbox',
                'merchantId' => 'mj3f7vybgh2dvq49',
                'publicKey' => 'yvq2x7xs2n3n7jzy',
                'privateKey' => 'd2f3b9ba7f3f4b7ebdbd4ca1a51524c1'
            ]);
        });
    }
}