<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Note;
use App\WorkerSkills\NoteObserver;

class NoteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Note::observe(NoteObserver::class);

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
