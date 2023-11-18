@extends('layout.app')

@section('content')
    <div class="section-latest">
        <div class="container">
            <div class="row gutter-v1 align-items-stretch mb-5">
                <div class="col-12">
                    <h2 class="section-title">{{$category->name}}</h2>
                </div>
                <div class="col-md-9 pr-md-5">
                    <div class="row">
                        @foreach($data as $datum)
                        <div class="col-12">
                            <div class="post-entry horizontal d-md-flex">
                                <div class="media">
                                    <a href="{{ url('details/' . $datum->id . '/' . $datum->slug) }}"><img src="{{ asset('storage/' . $datum->image) }}"
                                            alt="Image" class="img-fluid"></a>
                                </div>
                                <div class="text">
                                    <div class="meta">
                                        <span>{{ date_format($datum->created_at, 'F d, Y') }}</span>
                                        {{-- <span>&bullet;</span> --}}
                                        {{-- <span>5 mins read</span> --}}
                                    </div>
                                    <h2><a href="{{ url('details/' . $datum->id . '/' . $datum->slug) }}">{{$datum->title}}</a></h2>
                                    <p>{!! substr($datum->description, 0, 100) !!}...</p>

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
        </div>
    </div>
@endsection
