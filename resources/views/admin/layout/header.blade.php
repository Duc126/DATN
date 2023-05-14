<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{ url('admin/dashboard') }}">
            {{-- <img
                src="{{ url('admin/images/logo.svg') }}" class="mr-2" alt="logo" /> --}}
            <img style="height: 60px;" src="{{ asset('front/images/main-logo/TechHub.png') }}">

        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ url('admin/images/logo-mini.svg') }}"
                alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
        </button>
        {{-- <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
                <div class="input-group">
                    <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                        <span class="input-group-text" id="search">
                            <i class="icon-search"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now"
                        aria-label="search" aria-describedby="search">
                </div>
            </li>
        </ul> --}}
        <ul class="navbar-nav navbar-nav-right">

            <!-- đối với ngôn ngữ tiếng Anh -->
            {{-- <div class="mt-4 mr-4">
                <a href="{{ route('lang.switch', 'en') }}">English</a>

                <!-- đối với ngôn ngữ tiếng Pháp -->
                <a href="{{ route('lang.switch', 'vi') }}">Tiếng Việt</a>
            </div> --}}
            <div class="btn-group">
                <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{-- {{ __('messages.language') }} --}}
                    <i class="mdi mdi-translate "></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('lang.switch', 'en') }}">{{ __('messages.en') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('lang.switch', 'vi') }}">{{ __('messages.vi') }}</a>
                    <!-- Add more language options here -->
                </div>
            </div>





    <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="{{ url('admin/update-details') }}" data-toggle="dropdown"
            id="profileDropdown">
            @if (!empty(Auth::guard('admin')->user()->image))
                <img src="{{ url('admin/images/photos/' . Auth::guard('admin')->user()->image) }}" alt="profile" />
            @else
                <img src="{{ url('admin/images/photos/no-image.png') }}" alt="profile" />
            @endif
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <a href="{{ url('admin/update-details') }}" class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                {{ __('messages.setting') }}
            </a>
            <a href="{{ url('admin/logout') }}" class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                {{ __('messages.logout') }}
            </a>
        </div>
    </li>
    {{-- <li class="nav-item nav-settings d-none d-lg-flex">
                <a class="nav-link" href="#">
                    <i class="icon-ellipsis"></i>
                </a>
            </li> --}}
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
        data-toggle="offcanvas">
        <span class="icon-menu"></span>
    </button>
    </div>
</nav>
