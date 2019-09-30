<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        
// this is sengletone for language translation

app()->singleton('lang',function(){

    if(Auth::user()){

if(empty(Auth::user()->lang)){
return 'en';
}else{return (Auth::user()->lang);}



    }else{

if(Session::has('lang')){
return Session::get('lang'); 
}else{
return 'en';
}


    }

   });












// for database length 

Schema::defaultStringLength(191);


    }
}
