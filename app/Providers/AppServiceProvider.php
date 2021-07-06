<?php

namespace App\Providers;

use App\Services\SoapService;
use App\Services\XmlService;
use Illuminate\Pagination\Paginator;
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
        $this->app->bind('XmlService', function(){
            return new XmlService();
        });
        $this->app->bind('SoapService', function(){
            return new SoapService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::defaultView('pagination::bootstrap-4');
    }
}
