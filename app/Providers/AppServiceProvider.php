<?php

namespace App\Providers;

use App\Events\PostSaved;
use App\Listeners\ClearPostsCache;
use App\Models\Post;
use App\Policies\PostPolicy;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;


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

        Gate::policy(Post::class, PostPolicy::class);
    }
}
