@extends('layout.app')

@section('content')
    <div class="container mb-5">
        <div class="main-slider owl-single owl-carousel">
            <div class="huge-article d-md-flex">
                <div class="img-wrap">
                    <a href="#">
                        <img src="{{ asset('assets/frontend/images/img_h_4.jpg') }}" alt="Image" class="img-fluid"></a>
                </div>
                <div class="text-wrap">
                    <div class="meta`">
                        <span class="d-inline-block">2 Mins Read</span>
                        <span class="mx-2">&bullet;</span>
                        <span><a href="#">2 Comments</a></span>
                    </div>
                    <h3><a href="#">How to become a Good Web Designer &mdash; from Zero to Hero</a></h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                        the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large
                        language ocean.</p>
                    <div class="author d-flex align-items-center">
                        <div class="img mr-3">
                            <img src="{{ asset('assets/frontend/images/person_1.jpg') }}" alt="Image" class="img-fluid">
                        </div>
                        <div class="text">
                            <h3><a href="#">James Doe</a></h3>
                            <strong>Chief Editor / Blogger</strong>
                        </div>
                    </div>
                </div>
            </div>
            <!-- item -->
            <div class="huge-article d-md-flex">
                <div class="img-wrap">
                    <a href="#"><img src="{{ asset('assets/frontend/images/img_h_2.jpg') }}" alt="Image"
                            class="img-fluid"></a>
                </div>
                <div class="text-wrap">
                    <div class="meta`">
                        <span class="d-inline-block">2 Mins Read</span>
                        <span class="mx-2">&bullet;</span>
                        <span><a href="#">2 Comments</a></span>
                    </div>
                    <h3><a href="#">How to become a Good Web Designer &mdash; from Zero to Hero</a></h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                        the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large
                        language ocean.</p>
                    <div class="author d-flex align-items-center">
                        <div class="img mr-3">
                            <img src="{{ asset('assets/frontend/images/person_1.jpg') }}" alt="Image" class="img-fluid">
                        </div>
                        <div class="text">
                            <h3><a href="#">James Doe</a></h3>
                            <strong>Chief Editor / Blogger</strong>
                        </div>
                    </div>
                </div>
            </div>
            <!-- item -->

            <div class="huge-article d-md-flex">
                <div class="img-wrap">
                    <a href="#"><img src="{{ asset('assets/frontend/images/img_h_3.jpg') }}" alt="Image"
                            class="img-fluid"></a>
                </div>
                <div class="text-wrap">
                    <div class="meta`">
                        <span class="d-inline-block">2 Mins Read</span>
                        <span class="mx-2">&bullet;</span>
                        <span><a href="#">2 Comments</a></span>
                    </div>
                    <h3><a href="#">How to become a Good Web Designer &mdash; from Zero to Hero</a></h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                        the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large
                        language ocean.</p>
                    <div class="author d-flex align-items-center">
                        <div class="img mr-3">
                            <img src="{{ asset('assets/frontend/images/person_1.jpg') }}" alt="Image" class="img-fluid">
                        </div>
                        <div class="text">
                            <h3><a href="#">James Doe</a></h3>
                            <strong>Chief Editor / Blogger</strong>
                        </div>
                    </div>
                </div>
            </div>
            <!-- item -->

        </div>
    </div>

    <div class="section-latest">
        <div class="container">
            <div class="row gutter-v1 align-items-stretch mb-5">
                <div class="col-12">
                    <h2 class="section-title">Trending</h2>
                </div>
                <div class="col-md-9 pr-md-5">
                    <div class="row">
                        @foreach($posts as $post)
                        <div class="col-12">
                            <div class="post-entry horizontal d-md-flex">
                                <div class="media">
                                    <a href="{{ url('details/' . $post->id . '/' . $post->slug) }}"><img src="{{ asset('storage/' . $post->image) }}"
                                            alt="Image" class="img-fluid"></a>
                                </div>
                                <div class="text">
                                    <div class="meta">
                                        <span>{{ date_format($post->created_at, 'F d, Y') }}</span>
                                        {{-- <span>&bullet;</span> --}}
                                        {{-- <span>5 mins read</span> --}}
                                    </div>
                                    <h2><a href="{{ url('details/' . $post->id . '/' . $post->slug) }}">{{$post->title}}</a></h2>
                                    <p>{!! substr($post->description, 0, 100) !!}...</p>

                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-4">
                        <a href="https://vimeo.com/342333493" data-fancybox class="video-wrap">
                            <span class="play-wrap"><span class="icon-play"></span></span>
                            <img src="{{ asset('assets/frontend/images/img_h_5.jpg') }}" alt="Image"
                                class="img-fluid rounded">
                        </a>
                    </div>
                    <div class="floating-block sticky-top text-center">
                        <h2 class="mb-3 text-black">Subscribe to Newsletter</h2>
                        <p>Far far away behind the word mountains far from.</p>
                        <form action="#">
                            <input type="email" class="form-control mb-2" placeholder="Enter email">
                            <input type="submit" value="Subscribe" class="btn btn-primary btn-block">
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="section-title">Technology</h2>
                        </div>
                        @foreach ($technology as $tech)
                            <div class="col-md-6 col-lg-6">
                                <div class="post-entry">
                                    <div class="media">
                                        <a href="{{ url('details/' . $tech->id . '/' . $tech->slug) }}"><img
                                                src="{{ asset('storage/' . $tech->image) }}" alt="Image"
                                                class="img-fluid"></a>
                                    </div>
                                    <div class="text">
                                        <div class="meta-cat"><a href="#">{{$tech->category->name}}</a></div>
                                        <h2><a
                                                href="{{ url('details/' . $tech->id . '/' . $tech->slug) }}">{{ $tech->title }}</a>
                                        </h2>
                                        <div class="meta">
                                            <span>{{ date_format($tech->created_at, 'F d, Y') }}</span>
                                            {{-- <span>&bullet;</span> --}}
                                            {{-- <span>5 mins read</span> --}}
                                        </div>
                                        <p>{!! substr($tech->description, 0, 100) !!}...</p>

                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="section-title">Health & Fitness</h2>
                        </div>

                        @foreach ($health as $h)
                            <div class="col-md-6 col-lg-6">
                                <div class="post-entry">
                                    <div class="media">
                                        <a href="{{ url('details/' . $h->id . '/' . $h->slug) }}"><img
                                                src="{{ asset('storage/' . $h->image) }}" alt="Image"
                                                class="img-fluid"></a>
                                    </div>
                                    <div class="text">
                                        <div class="meta-cat"><a href="#">{{$h->category->name}}</a></div>
                                        <h2><a
                                                href="{{ url('details/' . $h->id . '/' . $h->slug) }}">{{ $h->title }}</a>
                                        </h2>
                                        <div class="meta">
                                            <span>{{ date_format($h->created_at, 'F d, Y') }}</span>
                                            {{-- <span>&bullet;</span> --}}
                                            {{-- <span>5 mins read</span> --}}
                                        </div>
                                        <p>{!! substr($h->description, 0, 100) !!}...</p>

                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="section-title">Ayurvedic Herbs</h2>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="post-entry">
                                <div class="media">
                                    <a href="#"><img src="{{ asset('assets/frontend/images/img_h_1.jpg') }}"
                                            alt="Image" class="img-fluid"></a>
                                </div>
                                <div class="text">
                                    <div class="meta-cat"><a href="#">Business</a></div>
                                    <h2><a href="#">Far far away behind the Word Mountains far from Away</a></h2>
                                    <div class="meta">
                                        <span>May 10, 2020</span>
                                        <span>&bullet;</span>
                                        {{-- <span>5 mins read</span> --}}
                                    </div>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                        Consonantia.</p>

                                </div>
                                <div class="author d-flex align-items-center">
                                    <div class="img mr-3">
                                        <a href="#"><img src="{{ asset('assets/frontend/images/person_1.jpg') }}"
                                                alt="Image" class="img-fluid"></a>
                                    </div>
                                    <div class="text">
                                        <h3><a href="#">James Doe</a></h3>
                                        <strong>Chief Editor / Blogger</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="post-entry">
                                <div class="media">
                                    <a href="#"><img src="{{ asset('assets/frontend/images/img_h_2.jpg') }}"
                                            alt="Image" class="img-fluid"></a>
                                </div>
                                <div class="text">
                                    <div class="meta-cat"><a href="#">Business</a></div>
                                    <h2><a href="#">Far far away behind the Word Mountains far from Away</a></h2>
                                    <div class="meta">
                                        <span>May 10, 2020</span>
                                        <span>&bullet;</span>
                                        {{-- <span>5 mins read</span> --}}
                                    </div>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                        Consonantia.</p>

                                    <div class="author d-flex align-items-center">
                                        <div class="img mr-3">
                                            <a href="#"><img
                                                    src="{{ asset('assets/frontend/images/person_2.jpg') }}"
                                                    alt="Image" class="img-fluid"></a>
                                        </div>
                                        <div class="text">
                                            <h3><a href="#">James Doe</a></h3>
                                            <strong>Chief Editor / Blogger</strong>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="post-entry">
                                <div class="media">
                                    <a href="#"><img src="{{ asset('assets/frontend/images/img_h_2.jpg') }}"
                                            alt="Image" class="img-fluid"></a>
                                </div>
                                <div class="text">
                                    <div class="meta-cat"><a href="#">Business</a></div>
                                    <h2><a href="#">Far far away behind the Word Mountains far from Away</a></h2>
                                    <div class="meta">
                                        <span>May 10, 2020</span>
                                        <span>&bullet;</span>
                                        <span>5 mins read</span>
                                    </div>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                        Consonantia.</p>

                                    <div class="author d-flex align-items-center">
                                        <div class="img mr-3">
                                            <a href="#"><img
                                                    src="{{ asset('assets/frontend/images/person_2.jpg') }}"
                                                    alt="Image" class="img-fluid"></a>
                                        </div>
                                        <div class="text">
                                            <h3><a href="#">James Doe</a></h3>
                                            <strong>Chief Editor / Blogger</strong>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-lg-3">
                            <div class="post-entry">
                                <div class="media">
                                    <a href="#"><img src="{{ asset('assets/frontend/images/img_h_2.jpg') }}"
                                            alt="Image" class="img-fluid"></a>
                                </div>
                                <div class="text">
                                    <div class="meta-cat"><a href="#">Business</a></div>
                                    <h2><a href="#">Far far away behind the Word Mountains far from Away</a></h2>
                                    <div class="meta">
                                        <span>May 10, 2020</span>
                                        <span>&bullet;</span>
                                        <span>5 mins read</span>
                                    </div>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                        Consonantia.</p>

                                    <div class="author d-flex align-items-center">
                                        <div class="img mr-3">
                                            <a href="#"><img
                                                    src="{{ asset('assets/frontend/images/person_2.jpg') }}"
                                                    alt="Image" class="img-fluid"></a>
                                        </div>
                                        <div class="text">
                                            <h3><a href="#">James Doe</a></h3>
                                            <strong>Chief Editor / Blogger</strong>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
