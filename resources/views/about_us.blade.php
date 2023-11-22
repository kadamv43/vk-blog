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
                <p>Hello readers,
                    we are vkblog team, starting this blog to ensure readers will get updated and correct information through this blog.
                    hope you will give your love to this blog and appreciate our hardwork
                    please feel free to share feedback or suggestions to our team we are happy to hear from you.
                    please like, share and subscribe to our blog to get latest updates
                    
                    Thank You.</p>
            </div>
        </div>
    </div>
</div>
@endsection