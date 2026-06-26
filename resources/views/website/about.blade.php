@extends('website.layout.app')

@section('content')

<div class="container py-5">

    <!-- Hero Section -->
    <div class="row justify-content-center text-center mb-5">
        <div class="col-lg-8">
            <h1 class="fw-bold mb-3">About VkBlog</h1>

            <p class="lead text-muted">
                Welcome to <strong>VkBlog</strong>, a place where ideas, knowledge,
                and inspiration come together. Our goal is to provide useful,
                engaging, and easy-to-read content for everyone.
            </p>
        </div>
    </div>

    <!-- Our Story -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-10">

            <h2 class="fw-bold mb-3">Our Story</h2>

            <p class="text-muted">
                VkBlog was created with a simple vision—to share valuable content
                that informs, inspires, and helps readers discover something new
                every day. Whether it's technology, lifestyle, productivity,
                trending topics, or practical guides, we aim to bring together
                content that is both informative and enjoyable to read.
            </p>

            <p class="text-muted">
                We believe that quality content should be simple, trustworthy,
                and accessible to everyone. Every article published on VkBlog is
                written with the intention of delivering real value to our readers.
            </p>

        </div>
    </div>

    <!-- What We Share -->
    <div class="row text-center mb-5">

        <div class="col-md-4 mb-4">
            <i class="bi bi-lightbulb display-5 text-primary mb-3"></i>
            <h5 class="fw-semibold">Inspiring Ideas</h5>
            <p class="text-muted">
                Discover fresh perspectives, useful tips, and inspiring stories
                that encourage learning and personal growth.
            </p>
        </div>

        <div class="col-md-4 mb-4">
            <i class="bi bi-journal-text display-5 text-primary mb-3"></i>
            <h5 class="fw-semibold">Helpful Articles</h5>
            <p class="text-muted">
                Read practical guides, informative articles, and easy-to-follow
                content across a variety of topics.
            </p>
        </div>

        <div class="col-md-4 mb-4">
            <i class="bi bi-globe2 display-5 text-primary mb-3"></i>
            <h5 class="fw-semibold">Diverse Topics</h5>
            <p class="text-muted">
                From everyday knowledge to trending subjects, we cover a wide
                range of topics designed for curious readers.
            </p>
        </div>

    </div>

    <!-- Mission -->
    <div class="row justify-content-center mb-5">
        <div class="col-lg-10">

            <h2 class="fw-bold mb-3">Our Mission</h2>

            <p class="text-muted">
                Our mission is to build a trusted platform where readers can
                discover reliable information, explore new ideas, and enjoy
                meaningful content. We strive to publish articles that are
                informative, engaging, and beneficial to our growing community.
            </p>

        </div>
    </div>

    <!-- Contact CTA -->
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="bg-light rounded p-5 text-center border">

                <h3 class="fw-bold mb-3">
                    We'd Love to Hear From You
                </h3>

                <p class="text-muted mb-4">
                    Have a question, suggestion, or feedback? Feel free to get
                    in touch with us. We'd be happy to hear from you.
                </p>

                <a href="{{ route('contact.index') }}" class="btn btn-primary px-4">
                    Contact Us
                </a>

            </div>

        </div>
    </div>

</div>

@endsection
