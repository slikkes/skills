<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Worker;
use App\WorkerSkills\WorkerObserver;

class WorkerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Worker::observe(WorkerObserver::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
