<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Rules\Filter;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Register the custom filter validation rule
        Validator::extend('filter', function ($attribute, $value, $parameters, $validator) {
            return (new Filter($parameters[0]))->validate($attribute, $value, function ($message) use ($validator, $attribute) {
                $validator->errors()->add($attribute, $message);
            });
        });
    }

    public function register()
    {
        //
    }
}
