<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Category;

class AppServiceProvider extends ServiceProvider
{

public function boot()
{
    Schema::defaultStringLength(191);
    View::composer('partial.nav',function($view){
        if(Schema::hasTable('categories')){
            $view->with('categories', Category::all());
        }
    });
}


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
