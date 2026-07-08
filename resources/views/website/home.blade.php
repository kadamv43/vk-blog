@section('title', 'Home | VKBlog')

@extends('website.layout.app')

@push('styles')

@endpush

@section('content')

<section class="featured">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if($featured)
                <article class="featured-post">
                    <div class="featured-post-content">
                        {{-- <div class="featured-post-author">
                            <img src="{{ asset('assets/web/images/author.png') }}" alt="author" />
                        <p>By <span>Mary Astor</span></p>
                    </div> --}}
                    <a href="{{ route('details', $featured->slug) }}" class="featured-post-title">
                        {{$featured->title}}
                    </a>
                    <ul class="featured-post-meta">
                        <li>
                            <i class="fa fa-clock-o"></i>
                            {{ $featured->created_at->format('F j, Y - g:i A') }}
                        </li>
                    </ul>
            </div>
            <div class="featured-post-thumb">
                <img src="{{ asset($featured->thumbnail) }}" alt="feature-post-thumb" />
            </div>
            </article>
            @endif

        </div>
    </div>
    </div>
</section>

<section class="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-section-title">
                    <h2>Articles</h2>
                    <p>View the latest news on Blogger</p>
                </div>

                @foreach($latest as $blog)
                <article class="blog-post">
                    <div class="blog-post-thumb">
                        <img src="{{ asset($blog->thumbnail) }}" alt="blog-thum" />
                    </div>
                    <div class="blog-post-content">
                        <div class="blog-post-tag">
                            @if($blog->category && $blog->category->name)
                            <a href="category.html">{{ $blog->category->name }}</a>
                            @endif
                        </div>
                        <div class="blog-post-title">
                            <a href="{{ route('details', $blog->slug) }}">{{ $blog->title }}</a>
                        </div>
                        <div class="blog-post-meta">
                            <ul>
                                {{-- <li>By <a href="about.html">Mary Astor</a></li> --}}
                                <li>
                                    <i class="fa fa-clock-o"></i>
                                    {{ $blog->created_at->format('F j, Y - g:i A') }}
                                </li>
                            </ul>
                        </div>
                        <p>
                            {{ Str::limit(strip_tags($blog->short_description ?? $blog->description), 120) }}
                        </p>
                        <a href="{{ route('details', $blog->slug) }}" class="blog-post-action">read more <i class="fa fa-angle-right"></i></a>
                    </div>
                </article>

                @endforeach

                @if ($latest->hasPages())
                <div class="blog-post-pagination">
                    <nav aria-label="Page navigation example" class="nav-bg">
                        <ul class="pagination">

                            {{-- Previous --}}
                            <li class="page-item {{ $latest->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $latest->previousPageUrl() ?? '#' }}">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                            </li>

                            {{-- Page Numbers --}}
                            @foreach ($latest->links()->elements[0] ?? [] as $page => $url)
                            @endforeach

                            @foreach ($latest->getUrlRange(max(1, $latest->currentPage()-2), min($latest->lastPage(), $latest->currentPage()+2)) as $page => $url)
                            <li class="page-item">
                                <a href="{{ $url }}" class="page-link {{ $page == $latest->currentPage() ? 'active' : '' }}">
                                    {{ $page }}
                                </a>
                            </li>
                            @endforeach

                            {{-- Next --}}
                            <li class="page-item {{ !$latest->hasMorePages() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $latest->nextPageUrl() ?? '#' }}">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>

                        </ul>
                    </nav>
                </div>
                @endif
            </div>
            <div class="col-lg-4">
                <div class="blog-post-widget">
                    <div class="latest-widget-title">
                        <h2>Trending post</h2>
                    </div>
                    @foreach ($trending as $blog)
                    <div class="latest-widget">
                        <div class="latest-widget-thum">
                            <a href="{{ route('details', $blog->slug) }}">
                                <img src="{{asset($blog->thumbnail)}}" alt="blog-thum" /></a>
                            <div class="icon">
                                <a href="{{ route('details', $blog->slug) }}">
                                    <img src="{{ asset('assets/web/images/blog/icon.svg') }}" alt="icon" /></a>
                            </div>
                        </div>
                        <div class="latest-widget-content">
                            <div class="content-title">
                                <a href="{{ route('details', $blog->slug) }}">{{ $blog->title }}</a>
                            </div>
                            <div class="content-meta">
                                <ul>
                                    <li>
                                        <i class="fa fa-clock-o"></i>
                                        {{ $blog->created_at->format('F j, Y - g:i A') }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</section>

@endsection
