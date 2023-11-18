@extends('layout.app')

@section('content')
<div class="site-hero py-5 bg-light mb-5">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-12 text-center">
                <h1 class="text-black mb-0">About Us</h1>
            </div>
        </div>
    </div>
</div>
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img src="{{ asset('assets/frontend/images/img_h_2.jpg') }}" alt="image" class="img-fluid rounded">
            </div>
            <div class="col-lg-6 pl-lg-5">
                <h3 class="mb-4 section-title">History</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                    the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large
                    language ocean.</p>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a
                    paradisematic country, in which roasted parts of sentences fly into your mouth. </p>
                <ul class="list-check list-unstyled primary">
                    <li>Far far away, behind the word mountains</li>
                    <li>Vokalia and Consonantia there</li>
                    <li>Separated they live</li>
                    <li>Semantics a large language ocean</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection