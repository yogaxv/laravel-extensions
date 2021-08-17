<?php

namespace Yogaxv\LaravelExtensions;

use Illuminate\Support\ServiceProvider;
use Yogaxv\LaravelExtensions\Commands\MakeRepositoryCommand;

class LaravelExtensionsProvider extends ServiceProvider
{
    /*
     * Register Service
     */
    public function register()
    {

    }

    /*
     * Boot Service
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeRepositoryCommand::class,
            ]);
        }
    }
}
