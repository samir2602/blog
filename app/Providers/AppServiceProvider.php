<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Events\PostSaved;
use App\Listeners\ClearPostsCache;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Event;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        Event::listen(
            PostSaved::class,
            ClearPostsCache::class
        );
    }
}
