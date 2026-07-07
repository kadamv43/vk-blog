@extends('website.layout.app')

@section('title', $detail->seo_title ?: $detail->title . ' | VKBlog')

@section('meta_description', $detail->seo_description ?: Str::limit(strip_tags($detail->short_description ?:
$detail->description), 160))

@push('styles')

<link href="{{ asset('assets/website/css/details.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/styles/github-dark.min.css">

<style>
    .related-card {
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .related-img {
        width: 100%;
        height: 220px;
        object-fit: cover;
    }

    .related-card-body {
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .related-card-title {
        min-height: 56px;
        overflow: hidden;
    }

    .related-card-desc {
        min-height: 72px;
        overflow: hidden;
    }

    .related-read-more {
        margin-top: auto;
    }

    .blog-image {
        display: block;
        width: auto;
        max-width: 100%;
        max-height: 450px;
        margin: 0 auto;
        object-fit: contain;
    }

    pre {
        position: relative;
        border-radius: 8px;
        overflow: auto;
        padding-top: 45px !important;
    }

    .copy-code-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #0d6efd;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 5px 10px;
        font-size: 12px;
        cursor: pointer;
        z-index: 10;
    }

    .copy-code-btn:hover {
        background: #0b5ed7;
    }

    pre code {
        font-size: 15px;
        line-height: 1.7;
    }

</style>
@endpush


@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Left Sidebar for Related Tags -->

        <!-- Blog Content + Carousel -->
        <section class="col-md-9">
            <article class="w-100">
                <h1 class="mb-3">{{ $detail->title }}</h1>
                <p class="text-muted">Posted on May 29, 2025 by John Doe</p>
                <div class="mb-4 text-center">
                    <img src="{{ asset($detail->image) }}" class="blog-image rounded shadow" alt="{{ $detail->title }}" loading="lazy">
                </div>

                {!! html_entity_decode($detail->description) !!}

            </article>

            <!-- Carousel for Related Blogs -->
            <!-- Carousel for Related Blogs -->
            <div class="mt-5">
                <h2 class="mb-4">Related Blogs</h2>

                @php
                $relatedPosts = $detail->relatedByTags();
                @endphp

                @if ($relatedPosts->count())
                <div class="row g-4">

                    @php
                    $colClass = match (true) {
                    $relatedPosts->count() == 1 => 'col-md-12',
                    $relatedPosts->count() == 2 => 'col-md-6',
                    default => 'col-lg-4 col-md-6',
                    };
                    @endphp

                    @foreach ($relatedPosts as $post)
                    <div class="{{ $colClass }}">
                        <div class="card shadow-sm related-card">

                            <img src="{{ asset($post->image) }}" class="card-img-top related-img" alt="{{ $post->title }}" loading="lazy">

                            <div class="card-body related-card-body">

                                <h5 class="card-title related-card-title">
                                    {{ $post->title }}
                                </h5>

                                <p class="card-text related-card-desc">
                                    {{ Str::limit(strip_tags($post->short_description), 100) }}
                                </p>

                                <a href="{{ route('details', $post->slug) }}" class="btn btn-primary btn-sm related-read-more">
                                    Read More
                                </a>

                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                @else
                <p>No related blogs found.</p>
                @endif
            </div>

        </section>

        <aside class="col-md-3 mb-4">
            <div class="p-3 bg-light rounded shadow-sm sticky-top" style="top: 1rem">
                <!-- Tags Card -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold">Related Tags</h5>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach ($detail->tags ?? [] as $tag)
                            <span class="badge bg-primary">
                                {{ $tag }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Popular Posts Card -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold">Popular Posts</h5>
                        {{-- <ul class="list-unstyled">
                            <li class="d-flex mb-3">
                                <img src="https://picsum.photos/60/60?random=10" alt="Post 1" class="me-3 rounded" style="width: 60px; height: 60px; object-fit: cover" />
                                <a href="#" class="text-decoration-none align-self-center">
                                    5 Tips for Healthy Living
                                </a>
                            </li>
                            <li class="d-flex mb-3">
                                <img src="https://picsum.photos/60/60?random=11" alt="Post 2" class="me-3 rounded" style="width: 60px; height: 60px; object-fit: cover" />
                                <a href="#" class="text-decoration-none align-self-center">
                                    Top Medicines for Cold & Flu
                                </a>
                            </li>
                            <li class="d-flex mb-3">
                                <img src="https://picsum.photos/60/60?random=12" alt="Post 3" class="me-3 rounded" style="width: 60px; height: 60px; object-fit: cover" />
                                <a href="#" class="text-decoration-none align-self-center">
                                    Best Diet Plans for Weight Loss
                                </a>
                            </li>
                        </ul> --}}
                    </div>
                </div>

                <!-- Newsletter Signup Card -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold">Newsletter</h5>
                        <form>
                            <div class="mb-3">
                                <input type="email" class="form-control form-control-sm" placeholder="Enter your email" required />
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm w-100">
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>


@endsection


@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/highlight.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/languages/sql.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        document.querySelectorAll('pre code').forEach((block) => {

            hljs.highlightElement(block);

            const pre = block.parentElement;

            const button = document.createElement('button');
            button.innerText = 'Copy';
            button.className = 'copy-code-btn';

            button.addEventListener('click', async function() {

                try {
                    await navigator.clipboard.writeText(block.innerText);

                    button.innerText = 'Copied ✓';

                    setTimeout(() => {
                        button.innerText = 'Copy';
                    }, 2000);

                } catch (err) {
                    console.error(err);
                }

            });

            pre.appendChild(button);

        });

    });

</script>

@endpush
