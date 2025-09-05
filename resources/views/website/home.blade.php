@extends('website.layout.app')


@section('content')
<!-- Main Content with Sidebar -->
<main class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <h1 class="mb-4">Welcome to My Blog</h1>
            <p>
                This is a lightweight, responsive blog template built with Bootstrap
                5.
            </p>

            <!-- Search Input -->
            <!-- <section class="my-4">
            <div class="row">
              <div class="col-md-12">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Search blogs..."
                />
              </div>
            </div>
          </section> -->

            <!-- Latest Blogs Carousel -->

            <!-- Featured Blog Section -->
            <section class="my-5">
                <h2 class="mb-3">Editor's Pick</h2>
                <div class="card border-0 shadow-lg">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <img src="https://picsum.photos/600/400?random=99"
                                class="img-fluid rounded-start h-100 object-fit-cover" alt="Editor's Pick" />
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h4 class="card-title fw-bold">
                                    Why Your Daily Routine Matters
                                </h4>
                                <p class="card-text">
                                    Discover how creating a consistent daily routine can boost
                                    your productivity and improve your overall well-being...
                                </p>
                                <a href="blog.html" class="btn btn-outline-primary">Read Full Article</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="my-5">
                <h2 class="mb-3">Latest Blogs</h2>
                <div id="latestBlogs" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($latest->chunk(3) as $chunkIndex => $blogChunk)
                        <div class="carousel-item @if($chunkIndex === 0) active @endif">
                            <div class="row">
                                @foreach($blogChunk as $blog)
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="{{ asset($blog->image) }}" class="card-img-top" alt="Blog Image">
                                        <div class="card-body">
                                            <h5 class="card-title">{!! $blog->title !!}</h5>
                                            <p class="card-text">{!! Str::limit($blog->description, 100) !!}</p>
                                            <a href="{{route('details',$blog->slug)}}"
                                                class="btn btn-outline-primary btn-sm">Read More</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Moved controls below -->
                    <div class="text-center mt-3">
                        <button class="btn btn-outline-secondary me-2" type="button" data-bs-target="#latestBlogs"
                            data-bs-slide="prev">
                            &larr; Previous
                        </button>
                        <button class="btn btn-outline-secondary" type="button" data-bs-target="#latestBlogs"
                            data-bs-slide="next">
                            Next &rarr;
                        </button>
                    </div>

                </div>

            </section>

            <!-- Trending Blogs Carousel -->
            <section class="my-5">
                <h2 class="mb-3">Trending Blogs</h2>
                <div id="trendingBlogs" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="https://picsum.photos/350/200?random=7" class="card-img-top"
                                            alt="..." />
                                        <div class="card-body">
                                            <h5 class="card-title">Trending Blog 1</h5>
                                            <p class="card-text">Short description...</p>
                                            <a href="blog.html" class="btn btn-outline-primary btn-sm">Read More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="https://picsum.photos/350/200?random=8" class="card-img-top"
                                            alt="..." />
                                        <div class="card-body">
                                            <h5 class="card-title">Trending Blog 2</h5>
                                            <p class="card-text">Short description...</p>
                                            <a href="blog.html" class="btn btn-outline-primary btn-sm">Read More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="https://picsum.photos/350/200?random=9" class="card-img-top"
                                            alt="..." />
                                        <div class="card-body">
                                            <h5 class="card-title">Trending Blog 3</h5>
                                            <p class="card-text">Short description...</p>
                                            <a href="blog.html" class="btn btn-outline-primary btn-sm">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#trendingBlogs"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#trendingBlogs"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </section>
        </div>

        <!-- Sidebar -->
        <aside class="col-md-3 mb-4">
            <div class="p-3 bg-light rounded shadow-sm sticky-top" style="top: 1rem">
                <!-- Tags Card -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold">Topics</h5>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach ($categories as $category )
                            <a href="{{route('blogs-by-category',$category->slug)}}"
                                class="badge bg-primary text-decoration-none">{{$category->name}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Popular Posts Card -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold">Popular Posts</h5>
                        <ul class="list-unstyled">
                            <li class="d-flex mb-3">
                                <img src="https://picsum.photos/60/60?random=10" alt="Post 1" class="me-3 rounded"
                                    style="width: 60px; height: 60px; object-fit: cover" />
                                <a href="#" class="text-decoration-none align-self-center">
                                    5 Tips for Healthy Living
                                </a>
                            </li>
                            <li class="d-flex mb-3">
                                <img src="https://picsum.photos/60/60?random=11" alt="Post 2" class="me-3 rounded"
                                    style="width: 60px; height: 60px; object-fit: cover" />
                                <a href="#" class="text-decoration-none align-self-center">
                                    Top Medicines for Cold & Flu
                                </a>
                            </li>
                            <li class="d-flex mb-3">
                                <img src="https://picsum.photos/60/60?random=12" alt="Post 3" class="me-3 rounded"
                                    style="width: 60px; height: 60px; object-fit: cover" />
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
                                <input type="email" class="form-control form-control-sm" placeholder="Enter your email"
                                    required />
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