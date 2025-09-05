@extends('website.layout.app')

@section('content')

<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="text-center mb-5">
                <h2 class="fw-bold">Get in Touch</h2>
                <p class="text-muted">Have questions or feedback? We'd love to hear from you.</p>
            </div>

            <div class="row g-5">
                <!-- Left Column: Contact Info -->
                <div class="col-md-5">
                    <h5 class="fw-semibold mb-3">Contact Information</h5>
                    <ul class="list-unstyled text-muted mb-4">
                        <li class="mb-2">
                            <i class="bi bi-envelope me-2 text-primary"></i>
                            support@yourblog.com
                        </li>
                    </ul>

                    <h6 class="fw-semibold mb-3">Follow Us</h6>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-primary fs-5"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-info fs-5"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-danger fs-5"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-dark fs-5"><i class="bi bi-github"></i></a>
                    </div>
                </div>

                <!-- Right Column: Form -->
                <div class="col-md-7">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="row g-3">
                        @csrf

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Your Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Your Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Your Message</label>
                            <textarea name="message" rows="5" class="form-control" required>{{ old('message') }}</textarea>
                        </div>

                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary px-4 py-2">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</main>

@endsection
