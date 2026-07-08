<!DOCTYPE html>
<html lang="zxx">

<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GJZ4P86C21"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-GJZ4P86C21');

    </script>
    <meta charset="UTF-8" />
    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="@yield('meta_description', 'VKBlog')">
    <meta name="robots" content="noindex, Nofollow, Noimageindex">

    <title>@yield('title', 'VKBlog')</title>

    <link rel="canonical" href="{{ url()->current() }}">

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/website/images/favicon.ico') }}">
    <!-- Theme Stylesheet -->
    <link href="{{ asset('assets/web/css/style.css') }}" rel="stylesheet" />

    <!--Favicon-->
    <link rel="shortcut icon" href="{{ asset('assets/web/images/favicon.svg') }}" type="image/x-icon" />
    <link rel="icon" href="{{ asset('assets/web/images/favicon.svg') }}" type="image/x-icon" />

    @stack('styles')
    <style>
        .main-nav .navbar-brand img {
            width: 60px;
        }

        /* Mobile */
        @media (max-width: 768px) {
            .main-nav .navbar-brand img {
                width: 50px;
            }
        }

    </style>
</head>

<body>


    @include('website.layout.header')

    @yield('content')

    @include('website.layout.footer')


    <!-- Vendor JS -->
    <script src="{{ asset('assets/web/vendor/jQuery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/web/vendor/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/web/vendor/slick/slick.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/web/js/script.js') }}"></script>
</body>

</html>
