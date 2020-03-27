<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Routing\UrlGenerator;
use Validator;

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
    public function boot(UrlGenerator $url)
    {

        Validator::extend('max_width', function ($attribute, $value, $parameters, $validator) {
            $validator->addReplacer('max_width', function ($message, $attribute, $rule, $parameters) {
                return str_replace([':max'], $parameters, $message);
            });
            return mb_strwidth($value) <= $parameters[0];
        });

        if (in_array(config('app.env'), ['prd', 'stg'], true)) {
            $url->forceScheme('https');
        }
        Schema::defaultStringLength(191);
    }
}
