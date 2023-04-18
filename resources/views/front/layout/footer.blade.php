<footer class="footer">
    <div class="container">
        <!-- Outer-Footer -->
        {{-- <div class="outer-footer-wrapper u-s-p-y-80">
            <h6>
                For special offers and other discount information
            </h6>
            <h1>
                Subscribe to our Newsletter
            </h1>
            <p>
                Subscribe to the mailing list to receive updates on promotions, new arrivals, discount and coupons.
            </p>
            <form class="newsletter-form">
                <label class="sr-only" for="newsletter-field">Enter your Email</label>
                <input type="text" id="newsletter-field" placeholder="Your Email Address">
                <button type="submit" class="button">SUBMIT</button>
            </form>
        </div> --}}
        <!-- Outer-Footer /- -->
        <!-- Mid-Footer -->
        <div class="mid-footer-wrapper u-s-p-b-80">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="footer-list">
                        <h6>{{ __('CÔNG TY') }}</h6>
                        <ul>
                            <li>
                                <a href="#">{{ __('Về chúng tôi') }}</a>
                            </li>
                            <li>
                                <a href="#">{{ __('Liên hệ chúng tôi') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="footer-list">
                        <h6>{{ __('TÀI KHOẢN') }}</h6>
                        <ul>
                            <li>
                                <a href="{{ url('user/account') }}">{{ __('Tài khoản của tôi') }}</a>
                            </li>

                            <li>
                                <a href="{{ url('user/order') }}">{{ __('Đơn đặt hàng của tôi') }}    </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="footer-list">
                        <h6>{{ __('Liên Hệ') }}</h6>
                        <ul>
                            <li>
                                <i class="fas fa-location-arrow u-s-m-r-9"></i>
                                <span>{{ __('TechHub') }}</span>
                            </li>
                            <li>
                                <a href="tel:+84 355913199">
                                    <i class="fas fa-phone u-c-brand u-s-m-r-9"></i>
                                    {{ __('Điện Thoại: +84 355913199') }}</a>
                            </li>
                            <li>
                                <a href="mailto:ducbui1211@gmail.com">
                                    <i class="fas fa-envelope u-c-brand u-s-m-r-9"></i>
                                    {{ __('E-mail: ducbui1211@gmail.com') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mid-Footer /- -->
        <!-- Bottom-Footer -->
        <div class="bottom-footer-wrapper">
            <div class="social-media-wrapper">
                <ul class="social-media-list">
                    <li>
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-google-plus-g"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-rss"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <p class="copyright-text">
                <a target="_blank" rel="nofollow" href="">{{ __('Thương Mại Điện Tử') }}</a> </p>
        </div>
    </div>
    <!-- Bottom-Footer /- -->
</footer>
