<?php

namespace App\Providers;

use App\Observers\PostObserver;
use Illuminate\Support\ServiceProvider;
use App\Models\Post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach (glob(app_path('Helpers/*.php')) as $filename) {
            require_once $filename;
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
            // dd('AppServiceProvider boot');

        Post::observe(PostObserver::class);

    }
}
