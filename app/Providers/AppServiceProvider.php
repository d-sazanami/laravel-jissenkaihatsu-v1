<?php

namespace App\Providers;

use App\MyClasses\PowerMyservice;
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
        app()->resolving(function ($obj, $app) {
            if (is_object($obj)) {
                echo get_class($obj) . '<br>';
            } else {
                echo $obj .'<br>';
            }
        });

        app()->resolving(PowerMyservice::class, function($obj, $app) {
            $newdata = ['ハンバーグ', 'カレーライス', '唐揚げ', '餃子'];
            $obj->setData($newdata);
            $obj->setId(rand(0, count($newdata)));
        });

        app()->singleton('App\MyClasses\MyServiceInterface', 'App\MyClasses\PowerMyService');
    }
}
