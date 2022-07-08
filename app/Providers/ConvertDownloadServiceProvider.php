<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ConverDownloadService;
class ConvertDownloadServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ConverDownloadService::class, function($app){
            return new ConverDownloadService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
