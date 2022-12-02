<!-- Start Footer Area -->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>About The Store</h3>

                    <div class="about-the-store">
                        <p>One of the most popular on the web is shopping.</p>
                        <ul class="footer-contact-info">
                            <li><i class='bx bx-map'></i> <a href="#" target="_blank">{{$setting->address}}</a></li>
                            <li><i class='bx bx-phone-call'></i> <a href="tel:+01321654214">{{$setting->phone}}</a></li>
                            <li><i class='bx bx-envelope'></i> <a href="mailto:hello@xton.com">{{$setting->email}}</a>
                            </li>
                        </ul>
                    </div>

                    <ul class="social-link">

                        @if($setting->facebook !=null)
                            <li><a href="{{$setting->facebook}}" class="d-block" target="_blank"><i
                                        class='bx bxl-facebook'></i></a></li>
                        @endif
                        @if($setting->twitter !=null)
                            <li><a href="{{$setting->twitter}}" class="d-block" target="_blank"><i
                                        class='bx bxl-twitter'></i></a></li>
                        @endif
                        @if($setting->instagram !=null)
                            <li><a href="{{$setting->instagram}}" class="d-block" target="_blank"><i
                                        class='bx bxl-instagram'></i></a></li>
                        @endif
                        @if($setting->linkedin !=null)
                            <li><a href="{{$setting->linkedin}}" class="d-block" target="_blank"><i
                                        class='bx bxl-linkedin'></i></a></li>
                        @endif
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget pl-4">
                    <h3>Quick Links</h3>

                    <ul class="quick-links">
                        <li><a href="{{route('aboutus')}}">About Us</a></li>
                        <li><a href="{{route('home')}}">Shop Now!</a></li>
                        <li><a href="{{route('references')}}">References</a></li>
                        <li><a href="{{route('faq')}}">FAQ's</a></li>
                        <li><a href="{{route('contact')}}">Contact Us</a></li>
                        <li><a href="customer-service.html">Customer Services</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>Customer Support</h3>

                    <ul class="customer-support">
                        <li><a href="{{route('myprofile')}}">My Account</a></li>
                        <li><a href="{{route('user_shopcart')}}">Cart</a></li>
                        <li><a href="{{route('faq')}}">FAQ's</a></li>
                        <li><a href="track-order.html">Order Tracking</a></li>
                        <li><a href="{{route('contact')}}">Help & Support</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>Newsletter</h3>

                    <div class="footer-newsletter-box">
                        <p>To get the latest news and latest updates from us.</p>

                        <form class="newsletter-form" data-bs-toggle="validator">
                            <label>Your E-mail Address:</label>
                            <input type="email" class="input-newsletter" placeholder="Enter your email" name="EMAIL"
                                   required autocomplete="off">
                            <button type="submit">Subscribe</button>
                            <div id="validator-newsletter" class="form-result"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom-area">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <p>©2022 ALL RIGHTS REVERSED| {{$setting->title}} </p>
                    <p>V:1.0.1</p>
                </div>

                <div class="col-lg-6 col-md-6">
                    <ul class="payment-types">
                        <li><a href="#" target="_blank"><img src="{{asset('assets')}}/home/assets/img/payment/visa.png"
                                                             alt="image"></a></li>
                        <li><a href="#" target="_blank"><img
                                    src="{{asset('assets')}}/home/assets/img/payment/mastercard.png" alt="image"></a>
                        </li>
                        <li><a href="#" target="_blank"><img
                                    src="{{asset('assets')}}/home/assets/img/payment/mastercard2.png" alt="image"></a>
                        </li>
                        <li><a href="#" target="_blank"><img src="{{asset('assets')}}/home/assets/img/payment/visa2.png"
                                                             alt="image"></a></li>
                        <li><a href="#" target="_blank"><img
                                    src="{{asset('assets')}}/home/assets/img/payment/expresscard.png" alt="image"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="lines">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
</footer>
<!-- End Footer Area -->

<div class="go-top"><i class='bx bx-up-arrow-alt'></i></div>

<!-- Links of JS files-->

<script src="{{asset('assets')}}/home/assets/js/jquery.min.js"></script>

<script src="{{asset('assets')}}/home/assets/js/popper.min.js"></script>
<script src="{{asset('assets')}}/home/assets/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets')}}/home/assets/js/owl.carousel.min.js"></script>
<script src="{{asset('assets')}}/home/assets/js/magnific-popup.min.js"></script>
<script src="{{asset('assets')}}/home/assets/js/parallax.min.js"></script>
<script src="{{asset('assets')}}/home/assets/js/rangeSlider.min.js"></script>
<script src="{{asset('assets')}}/home/assets/js/nice-select.min.js"></script>
<script src="{{asset('assets')}}/home/assets/js/meanmenu.min.js"></script>
<script src="{{asset('assets')}}/home/assets/js/isotope.pkgd.min.js"></script>
<script src="{{asset('assets')}}/home/assets/js/slick.min.js"></script>
<script src="{{asset('assets')}}/home/assets/js/sticky-sidebar.min.js"></script>
<script src="{{asset('assets')}}/home/assets/js/wow.min.js"></script>
<script src="{{asset('assets')}}/home/assets/js/form-validator.min.js"></script>
<script src="{{asset('assets')}}/home/assets/js/contact-form-script.js"></script>
<script src="{{asset('assets')}}/home/assets/js/ajaxchimp.min.js"></script>
<script src="{{asset('assets')}}/home/assets/js/main.js"></script>
<!--Custom-->
<script src="{{asset('assets')}}/home/assets/js/custom.js"></script>
<script src="{{asset('assets')}}/home/assets/js/customnotajax.js"></script>
