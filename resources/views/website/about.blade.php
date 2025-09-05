@extends('website.layout.app')

@section('content')

<main class="container py-5">
    <div class="row justify-content-center mb-5">
      <div class="col-lg-10">
        <h2 class="section-title">Our Story</h2>
        <p class="text-muted fs-6">
          My Blog was born out of a passion for sharing knowledge, inspiring others, and building a community of curious minds. Whether it's tech trends, wellness tips, lifestyle inspiration, or creative insights — we bring it all together in one place for readers around the world.
        </p>
        <p class="text-muted fs-6">
          Since our launch, we've grown steadily, thanks to your support. We're committed to keeping our content high-quality, easy to read, and always useful.
        </p>
      </div>
    </div>

    <!-- Mission & Values -->
    <div class="row text-center mb-5">
      <div class="col-md-4">
        <div class="mb-3">
          <i class="bi bi-lightbulb value-icon"></i>
        </div>
        <h5 class="fw-semibold">Inspire</h5>
        <p class="text-muted">We aim to spark ideas and motivation through meaningful content.</p>
      </div>
      <div class="col-md-4">
        <div class="mb-3">
          <i class="bi bi-journal-text value-icon"></i>
        </div>
        <h5 class="fw-semibold">Educate</h5>
        <p class="text-muted">Each article is designed to be insightful, practical, and helpful.</p>
      </div>
      <div class="col-md-4">
        <div class="mb-3">
          <i class="bi bi-people value-icon"></i>
        </div>
        <h5 class="fw-semibold">Connect</h5>
        <p class="text-muted">We're building a space where people learn, share, and grow together.</p>
      </div>
    </div>

    <!-- Meet the Team (optional) -->
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <h2 class="section-title">Meet the Team</h2>
        <div class="row g-4">
          <div class="col-md-4 text-center">
            <img src="https://i.pravatar.cc/150?img=1" class="rounded-circle mb-2" alt="Team Member" width="100" height="100" />
            <h6 class="fw-semibold">Aman Sharma</h6>
            <p class="text-muted small">Founder & Editor</p>
          </div>
          <div class="col-md-4 text-center">
            <img src="https://i.pravatar.cc/150?img=2" class="rounded-circle mb-2" alt="Team Member" width="100" height="100" />
            <h6 class="fw-semibold">Priya Mehta</h6>
            <p class="text-muted small">Content Strategist</p>
          </div>
          <div class="col-md-4 text-center">
            <img src="https://i.pravatar.cc/150?img=3" class="rounded-circle mb-2" alt="Team Member" width="100" height="100" />
            <h6 class="fw-semibold">Rahul Verma</h6>
            <p class="text-muted small">Developer & Designer</p>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
