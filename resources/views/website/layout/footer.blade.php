<section class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 mx-auto text-center">
                <div class="footer-logo">
                    <img src="{{ asset('assets/web/images/logo_footer.png') }}" alt="logo" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="footer-nav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">About </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact.index') }}">Contact</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('privacy.policy') }}">Privacy Policy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('terms.conditions') }}">Terms & Conditions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('disclaimer') }}">Disclaimer</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="sociale-icon">
                    <ul>
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="copy-right">
                    <p> &copy; {{ date('Y') }} VkBlog. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</section>
