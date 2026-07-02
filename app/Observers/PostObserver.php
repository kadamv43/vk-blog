<?php

namespace App\Observers;

use App\Jobs\GenerateSitemapJob;
use App\Models\Post;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {
        app(\App\Services\SitemapService::class)->generate();
    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
        GenerateSitemapJob::dispatch();
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        GenerateSitemapJob::dispatch();
    }
}
