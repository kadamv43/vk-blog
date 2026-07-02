<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\Post;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapService
{
    public function generate(): void
    {
        $sitemap = Sitemap::create();

        // Static Pages
        $sitemap->add(
            Url::create(route('home'))
                ->setPriority(1.0)
        );

        $sitemap->add(
            Url::create(route('about'))
        );

        // Blogs
        $sitemap->add(
            Post::published()->get()
        );

        $sitemap->writeToFile(
            public_path('sitemap.xml')
        );
    }
}
