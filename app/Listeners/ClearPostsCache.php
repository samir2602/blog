<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\PostSaved;
use Illuminate\Support\Facades\Cache;

class ClearPostsCache
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostSaved $event): void
    {
        Cache::flush();
    }
}
