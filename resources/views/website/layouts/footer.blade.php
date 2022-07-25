<!-- Begin Footer Area -->
<div class="footer">
    <!-- Begin Footer Static Top Area -->
    <div class="footer-static-top">
        <div class="container">
            <!-- Begin Footer Features Area -->
            <div class="footer-shipping pt-60 pb-55 pb-xs-25">
                <div class="row">
                    @foreach ($features as $feature)
                        @if ($feature->status == 'show')
                            <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                                <div class="li-shipping-inner-box">
                                    <div class="shipping-icon">
                                        <img src="{{ asset('images/features/' . $feature->image) }}" alt="Shipping Icon">
                                    </div>
                                    <div class="shipping-text">
                                        <h2>{{ $feature->title }}</h2>
                                        <p>{{ $feature->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <!-- Footer Features Area End Here -->
        </div>
    </div>
    <!-- Footer Static Top Area End Here -->
    <!-- Begin Footer Static Middle Area -->
    <div class="footer-static-middle">
        <div class="container">
            <div class="footer-logo-wrap pt-50 pb-35">
                <div class="row">
                    <!-- Begin Footer Logo Area -->
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-logo">
                            <img src="{{ asset('images/settings/' . $settings->logo) }}" alt="Footer Logo">
                            <p class="info">{{ $settings->title }}</p>
                        </div>
                        <ul class="des">
                            <li>
                                <span>Address: </span>
                                {{ $settings->address }}
                            </li>
                            <li>
                                <span>Phone: </span>
                                <a href="#">{{ $settings->phone }}</a>
                            </li>
                            <li>
                                <span>Email: </span>
                                <a href="mailto://{{ $settings->email }}">{{ $settings->email }}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Footer Logo Area End Here -->
                    <!-- Begin Footer Block Area -->
                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <div class="footer-block">
                            <h3 class="footer-block-title">Product</h3>
                            <ul>
                                <li><a href="#">Prices drop</a></li>
                                <li><a href="#">New products</a></li>
                                <li><a href="#">Best sales</a></li>
                                <li><a href="#">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Footer Block Area End Here -->
                    <!-- Begin Footer Block Area -->
                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <div class="footer-block">
                            <h3 class="footer-block-title">Our company</h3>
                            <ul>
                                <li><a href="#">Delivery</a></li>
                                <li><a href="#">Legal Notice</a></li>
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Footer Block Area End Here -->
                    <!-- Begin Footer Block Area -->
                    <div class="col-lg-4">
                        <div class="footer-block">
                            <h3 class="footer-block-title">Follow Us</h3>
                            <ul class="social-link">
                                @foreach ($social_links as $social_link)
                                    @if ($social_link->status == 'show')
                                        <li class="{{ $social_link->website_name }}">
                                            <a href="{{ $social_link->website_url }}" data-toggle="tooltip"
                                                target="_blank" title="Twitter">
                                                <i class="fa fa-{{ $social_link->website_name }}"></i>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <!-- Begin Footer Newsletter Area -->
                        <div class="footer-newsletter">
                            <h4>Sign up to newsletter</h4>
                            <form action="#" method="post" id="mc-embedded-subscribe-form"
                                name="mc-embedded-subscribe-form" class="footer-subscribe-form validate" target="_blank"
                                novalidate>
                                <div id="mc_embed_signup_scroll">
                                    <div id="mc-form" class="mc-form subscribe-form form-group">
                                        <input id="mc-email" type="email" autocomplete="off"
                                            placeholder="Enter your email" />
                                        <button class="btn" id="mc-submit">Subscribe</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Footer Newsletter Area End Here -->
                    </div>
                    <!-- Footer Block Area End Here -->
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Static Middle Area End Here -->
    <!-- Begin Footer Static Bottom Area -->
    <div class="footer-static-bottom pt-2 pb-2 ">
        <div class="row">
            <div class="col-lg-12">
                <!-- Begin Copyright Area -->
                <div class="copyright text-center">
                    <span>© Copyright <a target="_blank" href=""> LIMUPA </a>All Rights
                        Reserved.</span>
                </div>
                <!-- Copyright Area End Here -->
            </div>
        </div>
    </div>
    <!-- Footer Static Bottom Area End Here -->
</div>
<!-- Footer Area End Here -->
</div>
<!-- Body Wrapper End Here -->
<!-- jQuery-V1.12.4 -->
<script src="{{ asset('website/js/vendor/jquery-1.12.4.min.js') }}"></script>
<!-- Popper js -->
<script src="{{ asset('website/js/vendor/popper.min.js') }}"></script>
<!-- Bootstrap V4.1.3 Fremwork js -->
<script src="{{ asset('website/js/bootstrap.min.js') }}"></script>
<!-- Ajax Mail js -->
<script src="{{ asset('website/js/ajax-mail.js') }}"></script>
<!-- Meanmenu js -->
<script src="{{ asset('website/js/jquery.meanmenu.min.js') }}"></script>
<!-- Wow.min js -->
<script src="{{ asset('website/js/wow.min.js') }}"></script>
<!-- Slick Carousel js -->
<script src="{{ asset('website/js/slick.min.js') }}"></script>
<!-- Owl Carousel-2 js -->
<script src="{{ asset('website/js/owl.carousel.min.js') }}"></script>
<!-- Magnific popup js -->
<script src="{{ asset('website/js/jquery.magnific-popup.min.js') }}"></script>
<!-- Isotope js -->
<script src="{{ asset('website/js/isotope.pkgd.min.js') }}"></script>
<!-- Imagesloaded js -->
<script src="{{ asset('website/js/imagesloaded.pkgd.min.js') }}"></script>
<!-- Mixitup js -->
<script src="{{ asset('website/js/jquery.mixitup.min.js') }}"></script>
<!-- Countdown -->
<script src="{{ asset('website/js/jquery.countdown.min.js') }}"></script>
<!-- Counterup -->
<script src="{{ asset('website/js/jquery.counterup.min.js') }}"></script>
<!-- Waypoints -->
<script src="{{ asset('website/js/waypoints.min.js') }}"></script>
<!-- Barrating -->
<script src="{{ asset('website/js/jquery.barrating.min.js') }}"></script>
<!-- Jquery-ui -->
<script src="{{ asset('website/js/jquery-ui.min.js') }}"></script>
<!-- Venobox -->
<script src="{{ asset('website/js/venobox.min.js') }}"></script>
<!-- Nice Select js -->
<script src="{{ asset('website/js/jquery.nice-select.min.js') }}"></script>
<!-- ScrollUp js -->
<script src="{{ asset('website/js/scrollUp.min.js') }}"></script>
<!-- Main/Activator js -->
<script src="{{ asset('website/js/main.js') }}"></script>
</body>

<!-- index30:23-->

</html>
