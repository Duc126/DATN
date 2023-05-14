    <?php
    use App\Models\Section;
    $sections = Section::sections();
    $totalCartItems = totalCartItems();
    ?>
    <!-- Header -->
    <header>
        <!-- Top-Header -->
        <div class="full-layer-outer-header">
            <div class="container clearfix">
                <nav>
                    <ul class="primary-nav g-nav">
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
                </nav>
                <nav>
                    <ul class="secondary-nav g-nav">
                        <li>
                            <a>
                                @if (Auth::check())
                                    {{ __('messages.front.my_account') }}
                                @else
                                    {{ __('messages.front.login_register') }}
                                @endif
                                <i class="fas fa-chevron-down u-s-m-l-9"></i>
                            </a>
                            <ul class="g-dropdown" style="width:230px">
                                {{-- <li>
                                    <a href="cart.html">
                                        <i class="fas fa-cog u-s-m-r-9"></i>
                                        My Cart</a>
                                </li>
                                <li>
                                    <a href="wishlist.html">
                                        <i class="far fa-heart u-s-m-r-9"></i>
                                        My Wishlist</a>
                                </li> --}}
                                {{-- <li>
                                    <a href="checkout.html">
                                        <i class="far fa-check-circle u-s-m-r-9"></i>
                                        Checkout</a>
                                </li> --}}
                                @if (Auth::check())
                                    <li>
                                        <a href="{{ url('user/order') }}">
                                            <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                            {{ __('messages.front.my_order') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('user/account') }}">
                                            <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                            {{ __('messages.front.my_account') }}</a>
                                    </li>

                                    <li>
                                        <a href="{{ url('user/logout') }}">
                                            <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                            {{ __('messages.front.logout') }}</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ url('user/login-register') }}">
                                            <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                            {{ __('messages.front.user_login') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('vendor/login-register') }}">
                                            <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                            {{ __('messages.front.admin_login') }}</a>

                                    </li>
                                @endif
                            </ul>
                        </li>

                    </ul>
                </nav>
                <nav>
                    <ul class="secondary-nav g-nav">
                        <li>
                            <a>
                                <i class="fa fa-globe" aria-hidden="true"></i>


                                {{-- <i class="fas fa-chevron-down u-s-m-l-9"></i> --}}
                            </a>
                            <ul class="g-dropdown" style="width:230px">
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ route('lang.switch', 'en') }}">{{ __('messages.en') }}</a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ route('lang.switch', 'vi') }}">{{ __('messages.vi') }}</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
        <!-- Top-Header /- -->
        <!-- Mid-Header -->
        <div class="full-layer-mid-header" style="padding: 20px 0 !important">
            <div class="container">
                <div class="row clearfix align-items-center">
                    <div class="col-lg-3 col-md-9 col-sm-6">
                        <div class="brand-logo text-lg-center">
                            <a href="{{ url('/') }}">
                                {{-- <img src="{{ asset('front/images/main-logo/stack-developers-logo.png') }}"
                                    alt="Stack Developers" class="app-brand-logo"> --}}
                                <img height="60" src="{{ asset('front/images/main-logo/TechHub.png') }}"
                                    alt="TechHub" class="app-brand-logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 u-d-none-lg">
                        <form class="form-searchbox" action="{{ url('/search-products') }}" method="get">
                            <label class="sr-only" for="search-landscape">{{ __('messages.front.search') }}</label>
                            <input name="search" id="search-landscape" type="text" class="text-field"
                                placeholder="{{ __('messages.front.search') }}"
                                @if (isset($_REQUEST['search']) && !empty($_REQUEST['search'])) value="{{ $_REQUEST['search'] }}" @endif>
                            <div class="select-box-position">
                                <div class="select-box-wrapper select-hide">
                                    <label class="sr-only"
                                        for="select-category">{{ __('Chọn danh mục để tìm kiếm') }}</label>
                                    <select class="select-box" id="select-category" name="section_id">
                                        <option selected="selected" value="">
                                            {{ __('messages.front.all') }}
                                        </option>
                                        @foreach ($sections as $section)
                                            <option @if (isset($_REQUEST['section_id']) && !empty($_REQUEST['section_id']) && $_REQUEST['section_id'] == $section['id']) selected ="" @endif
                                                value="{{ $section['id'] }}">{{ $section['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button id="btn-search" type="submit" class="button button-primary fas fa-search"></button>
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <nav>
                            <ul class="mid-nav g-nav">
                                <li class="u-d-none-lg">
                                    <a href="{{ url('/') }}">
                                        <i class="ion ion-md-home u-c-brand"></i>
                                    </a>
                                </li>
                                {{-- <li class="u-d-none-lg">
                                    <a href="wishlist.html">
                                        <i class="far fa-heart"></i>
                                    </a>
                                </li> --}}
                                <li>
                                    <a id="mini-cart-trigger">
                                        <i class="ion ion-md-basket"></i>
                                        <span class="item-counter totalCartItems">{{ $totalCartItems }}</span>
                                        {{-- <span class="item-price">0 VNĐ</span> --}}
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mid-Header /- -->
        <!-- Responsive-Buttons -->
        <div class="fixed-responsive-container">
            <div class="fixed-responsive-wrapper">
                <button type="button" class="button fas fa-search" id="responsive-search"></button>
            </div>
            <div class="fixed-responsive-wrapper">
                <a href="wishlist.html">
                    <i class="far fa-heart"></i>
                    <span class="fixed-item-counter">4</span>
                </a>
            </div>
        </div>
        <!-- Responsive-Buttons /- -->
        <!-- Mini Cart -->
        <div id="appendHeaderCartItems">
            @include('front.layout.header_cart')

        </div>
        <!-- Mini Cart /- -->
        <!-- Bottom-Header -->
        <div class="full-layer-bottom-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="v-menu v-close">
                            <span class="v-title">
                                <i class="ion ion-md-menu"></i>
                                {{ __('messages.front.all_file') }}
                                <i class="fas fa-angle-down"></i>
                            </span>
                            <nav>
                                <div class="v-wrapper">
                                    <ul class="v-list animated fadeIn">
                                        @foreach ($sections as $section)
                                            @if (count($section['categories']) > 0)
                                                <li class="js-backdrop">
                                                    <a href="#">
                                                        <i class="ion-ios-add-circle"></i>
                                                        {{ $section['name'] }}
                                                        <i class="ion ion-ios-arrow-forward"></i>
                                                    </a>
                                                    <button class="v-button ion ion-md-add"></button>
                                                    <div class="v-drop-right" style="width: 700px;">
                                                        <div class="row">
                                                            @foreach ($section['categories'] as $category)
                                                                <div class="col-lg-4">
                                                                    <ul class="v-level-2">
                                                                        <li>
                                                                            <a
                                                                                href="{{ url($category['url']) }}">{{ $category['category_name'] }}</a>
                                                                            <ul>
                                                                                @foreach ($category['subcategories'] as $subcategory)
                                                                                    <li>
                                                                                        <a
                                                                                            href="{{ url($subcategory['url']) }}">{{ $subcategory['category_name'] }}</a>
                                                                                    </li>
                                                                                @endforeach


                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                        {{-- <li>
                                            <a class="v-more">
                                                <i class="ion ion-md-add"></i>
                                                <span>View More</span>
                                            </a>
                                        </li> --}}
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                    {{-- <div class="col-lg-9">
                        <ul class="bottom-nav g-nav u-d-none-lg">
                            <li>
                                <a href="#men-latest-products">{{ __('Sản Phẩm Mới') }}
                                    <span class="superscript-label-new">NEW</span>
                                </a>
                            </li>
                            <li>
                                <a href="#men-best-selling-products">{{ __('Sản Phẩm Bán Chạy Nhất') }}
                                    <span class="superscript-label-hot">HOT</span>
                                </a>
                            </li>
                            <li>
                                <a href="#men-featured-products">{{ __('Sản Phẩm Nổi Bật') }}
                                </a>
                            </li>
                            <li>
                                <a href="#discounted-products">{{ __('Sản Phẩm Giảm Giá') }}
                                    <span class="superscript-label-discount">-30%</span>
                                </a>
                            </li>

                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- Bottom-Header /- -->
    </header>
    <!-- Header /- -->
