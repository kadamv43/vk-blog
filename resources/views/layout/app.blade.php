<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />


  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/frontend/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/frontend/css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/frontend/fonts/icomoon/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/frontend/fonts/flaticon/font/flaticon.css')}}">
  <link rel="stylesheet" href="{{asset('assets/frontend/css/jquery.fancybox.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/frontend/css/aos.css')}}">
  <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">

  <title>VkBlog - 2023</title>
</head>
<body>


<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close">
        <span class="icofont-close js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>

  
  <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icofont-close js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <div class="container">


      <nav class="site-nav">
        <div class="row justify-content-between align-items-center">
          <div class="d-none d-lg-block col-lg-3 top-menu">
            <a href="#" class="d-inline-flex align-items-center"><span class="icon-facebook mr-2"></span></a>
            <a href="#" class="d-inline-flex align-items-center"><span class="icon-twitter mr-2"></span></a>
            <a href="#" class="d-inline-flex align-items-center"><span class="icon-instagram mr-2"></span></a>
          </div>
          <div class="col-3 col-md-6 col-lg-6 text-lg-center logo">
            <a href="{{url('/')}}">VKblog<span class="text-primary">.</span> </a>
          </div>
          <div class="col-9 col-md-6 col-lg-3 text-right top-menu">

            <div class="d-inline-flex align-items-center">
              <div class="search-wrap">
              <a href="#" class="d-inline-flex align-items-center js-search-toggle"><span class="icon-search2 mr-2"></span><span>Search</span></a>

              <form action="#" class="d-flex">
                <input type="search" id="s" class="form-control" placeholder="Enter keyword and hit enter...">                  
              </form>

              </div>

              <span class="mx-2 d-inline-block d-lg-none"></span>
              
              <a href="#" class="d-inline-flex align-items-center d-inline-block d-lg-none"><span class="icon-facebook mr-2"></span></a>
              <a href="#" class="d-inline-flex align-items-center d-inline-block d-lg-none"><span class="icon-twitter mr-2"></span></a>
              <a href="#" class="d-inline-flex align-items-center d-inline-block d-lg-none"><span class="icon-instagram mr-2"></span></a>


              <a href="#" class="burger ml-3 site-menu-toggle js-menu-toggle d-inline-block d-lg-none" data-toggle="collapse" data-target="#main-navbar">
                <span></span>
              </a>

              
            </div>
            
            

          </div>
        </div>
        <div class="d-none d-lg-block row align-items-center py-3">
          
          
          <div class="col-12 col-sm-12 col-lg-12 site-navigation text-center">
            <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu">
              <li class="active"><a href="{{url('/')}}">Home</a></li>
              {{-- <li><a href="index.html">Sports</a></li> --}}
              <li class="has-children">
                <a href="#">Categories</a>
                <ul class="dropdown">
                  <li><a href="portfolio.html">Technology</a></li>
                  <li><a href="single.html">Environment</a></li>
                  
                  <li><a href="contact.html">Health & Fitness</a></li>
                  <li><a href="#">Money & Wealth</a></li>
                  <li class="has-children">
                    <a href="#">Business</a>
                    <ul class="dropdown">
                      <li><a href="#">Sub Menu One</a></li>
                      <li><a href="#">Sub Menu Two</a></li>
                      <li><a href="#">Sub Menu Three</a></li>
                    </ul>
                  </li>
                  <li><a href="#">Ayurvedic Herbs</a></li>
                </ul>
              </li>
              <li><a href="{{url('about-us')}}">About Us</a></li>
              <li><a href="{{url('contact-us')}}">Contact us</a></li>
            </ul>

          </div>

        </div>  
      </nav> <!-- END nav -->

    </div> <!-- END container -->

    
    @yield('content')


    <div class="site-footer">
      <div class="container">
        <div class="row justify-content-center copyright">

          <div class="col-lg-7 text-center">
            
            <div class="widget">
              <ul class="social list-unstyled">
                <li><a href="#"><span class="icon-facebook"></span></a></li>
                <li><a href="#"><span class="icon-twitter"></span></a></li>
                <li><a href="#"><span class="icon-linkedin"></span></a></li>
                <li><a href="#"><span class="icon-youtube-play"></span></a></li>
              </ul>
            </div>

            <div class="widget">
                <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="#">VKblog</a>
                </p>
            </div>

          </div>

          
      </div>

    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>


    <script src="{{asset('assets/frontend/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/aos.js')}}"></script>
    <script src="{{asset('assets/frontend/js/imagesloaded.pkgd.js')}}"></script>
    <script src="{{asset('assets/frontend/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/custom.js')}}"></script>

    
  </body>
  </html>
     