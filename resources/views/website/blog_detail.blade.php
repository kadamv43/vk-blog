@extends('website.layout.app')

@push('styles')
<link href="{{asset('assets/website/css/details.css')}}" rel="stylesheet" />
@endpush


@section('content')
<main class="container py-5">
    <div class="row">
        <!-- Left Sidebar for Related Tags -->

        <!-- Blog Content + Carousel -->
        <section class="col-md-9">
            <article style="max-width: 800px">
                <h1 class="mb-3">{{$detail->title}}</h1>
                <p class="text-muted">Posted on May 29, 2025 by John Doe</p>
                <img src="{{ asset('storage/' . $detail->image) }}" class="img-fluid rounded mb-4" alt="Blog banner" />

                {!! $detail->description !!}

            </article>

            <!-- Carousel for Related Blogs -->
            <!-- Carousel for Related Blogs -->
            <div class="mt-5">
                <h2 class="mb-4">Related Blogs</h2>

                @php
                // Get related posts in chunks of 3 for carousel slides
                $relatedPosts = $detail->relatedByTags();
                $chunks = $relatedPosts->chunk(3);
                @endphp

                @if($relatedPosts->isNotEmpty())
                <div id="relatedBlogCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        @foreach($chunks as $chunkIndex => $chunk)
                        <div class="carousel-item @if($chunkIndex === 0) active @endif">
                            <div class="d-flex justify-content-between gap-3">

                                @foreach($chunk as $post)
                                <div class="card h-100 flex-fill @if($loop->index > 0) d-none d-md-block @endif">
                                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}" />
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $post->title }}</h5>
                                        <p class="card-text">{!! Str::limit($post->short_description ?? $post->description, 80) !!}</p>
                                        <a href="{{ route('details', $post->slug) }}" class="btn btn-primary btn-sm">Read More</a>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                        @endforeach

                    </div>

                    <!-- Controls -->

                    @if($relatedPosts->count() > 3)
                    <div class="text-center mt-3">
                        <button class="btn btn-outline-secondary me-2" type="button" data-bs-target="#relatedBlogCarousel" data-bs-slide="prev">
                            &larr; Previous
                        </button>
                        <button class="btn btn-outline-secondary" type="button" data-bs-target="#relatedBlogCarousel" data-bs-slide="next">
                            Next &rarr;
                        </button>
                    </div>

                    @endif
                </div>
                @else
                <p>No related posts found.</p>
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
                            <a href="#" class="badge bg-primary text-decoration-none">Health</a>
                            <a href="#" class="badge bg-secondary text-decoration-none">Medicines</a>
                            <a href="#" class="badge bg-success text-decoration-none">Health Tips</a>
                            <a href="#" class="badge bg-info text-dark text-decoration-none">Diet Plans</a>
                        </div>
                    </div>
                </div>

                <!-- Popular Posts Card -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold">Popular Posts</h5>
                        <ul class="list-unstyled">
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
                        </ul>
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
</main>


@endsection
