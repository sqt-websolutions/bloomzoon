<?php

namespace App\Providers;

use App\Http\ViewComposers\ShopViewComposer;
use App\Http\ViewComposers\UserDashboardViewComposer;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('dashboard/*', UserDashboardViewComposer::class);
        view()->composer('*/shop*', ShopViewComposer::class);
    }
}
