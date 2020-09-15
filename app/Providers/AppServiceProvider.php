<?php

namespace App\Providers;

use App\Models\Admin\City;
use App\Models\Admin\News;
use Illuminate\Support\Facades\View;
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
        View::share('dataCity', City::all());
        View::share('dataNewsRandom', News::select('id', 'name', 'created_at')->orderByDESC('id')->limit(4)->get());
    }
}
