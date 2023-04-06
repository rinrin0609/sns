<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

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
        view()->composer('*', function ($view)
        {
            //...with this variable
            $view->with('follow_count',  DB::table('follows')->where('follower_id', Auth::id())->count());
            $view->with('follower_count',  DB::table('follows')->where('follow_id', Auth::id())->count());
        });
    }
}
