@extends('website.layout.app')

@section('title', $detail->seo_title ?: $detail->title . ' | VKBlog')

@section('meta_description', $detail->seo_description ?: Str::limit(strip_tags($detail->short_description ?:
$detail->description), 160))

@push('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/styles/github-dark.min.css">

<style>
    .blog-featured-image {
        width: 100%;
        max-width: 100%;
        height: auto;
        border-radius: 12px;
        display: block;
        margin-bottom: 30px;
    }

</style>
@endpush


@section('content')

<section class="blog-single">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 order-2 order-lg-1">
                <div class="share-now">
                    <a href="#" class="scrol">Share</a>
                    <div class="sociel-icon">
                        <ul>
                            <li> <a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 order-1 order-lg-2">
                <article class="single-blog">
                    @if($detail->category && $detail->category->name)
                    <a href="#" class="tag">{{$detail->category->name}}</a>
                    @endif
                    <p class="title">{{ $detail->title }}</p>
                    {{-- <ul class="meta">
                        <li>By <a href="about.html">Mary Astor</a></li>
                        <li>
                            <i class="fa fa-clock-o"></i>
                            October 19, 2020 - 2 min
                        </li>
                    </ul> --}}
                    <img src="{{ asset($detail->image) }}" class="img-fluid blog-featured-image" alt="{{ $detail->title }}">

                    {!! html_entity_decode($detail->description) !!}
                </article>
                {{-- <div class="blog-single-presentation">
                    <ul>
                        <li> <a href="#" class="tag">PREVIOUS</a>
                            <a href="#" class="title">I Moved Across the Country
                                and Never Looked Back</a>
                            <i class="fa fa-clock-o"></i>
                            October 19, 2020 - 2 min
                        </li>
                        <li> <a href="#" class="tag">Next</a><a href="#" class="title">Every Next Level of Your Life
                                Will Demand a Different</a><i class="fa fa-clock-o"></i>
                            October 19, 2020 - 2 min</li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </div>
</section>

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
