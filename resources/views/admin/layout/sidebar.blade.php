<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a @if (Session::get('page') == 'dashboard') style="background: #4B49AC !important; color: #fff !important;" @endif
                class="nav-link menu-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('admin/dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">{{ __('Trang Chủ') }}</span>
            </a>
        </li>
        @if (Auth::guard('admin')->user()->type == 'vendor')
            <li class="nav-item">
                <a @if (Session::get('page') == 'update-personal-details' ||
                        Session::get('page') == 'update-business-details' ||
                        Session::get('page') == 'update-bank-details') style="background:#4B49AC !important; color: #fff !important;" @endif
                    class="nav-link" data-toggle="collapse" href="#ui-vendor" aria-expanded="false"
                    aria-controls="ui-vendor">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">{{ __('Chi Tiết Nhà Cung Cấp') }}</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-vendor">
                    <ul class="nav flex-column sub-menu"
                        style="background: #fff !important; color: #4B49AC !important;">
                        <li class="nav-item"> <a
                                @if (Session::get('page') == 'update-personal-details') style="background:#4B49AC !important; color: #fff !important;"
                            @else style="background: #fff !important; color:#4B49AC !important;" @endif
                                class="nav-link"
                                href="{{ url('admin/update-vendor-details/personal') }}">{{ __('Chi Tiết Cá Nhân') }}</a>
                        </li>
                        <li class="nav-item"> <a
                                @if (Session::get('page') == 'update-business-details') style="background:#4B49AC !important; color: #fff !important;"
                            @else style="background: #fff !important; color:#4B49AC !important;" @endif
                                class="nav-link"
                                href="{{ url('admin/update-vendor-details/business') }}">{{ __('Chi Tiết Kinh Doanh') }}</a>
                        </li>
                        <li class="nav-item"> <a
                                @if (Session::get('page') == 'update-bank-details') style="background:#4B49AC !important; color: #fff !important;"
                            @else style="background: #fff !important; color:#4B49AC !important;" @endif
                                class="nav-link"
                                href="{{ url('admin/update-vendor-details/bank') }}">{{ __('Chi Tiết Ngân Hàng') }}</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a @if (Session::get('page') == 'products' || Session::get('page') == 'coupons') style="background: #4B49AC !important; color: #fff !important;" @endif
                    class="nav-link" data-toggle="collapse" href="#ui-catalogue" aria-expanded="false"
                    aria-controls="ui-catalogue">
                    <i class="icon-grid-2 menu-icon"></i>
                    <span class="menu-title">{{ __('Quản lý danh mục') }}</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-catalogue">
                    <ul class="nav flex-column sub-menu"
                        style="background: #fff !important; color: #4B49AC !important;">

                        <li class="nav-item"><a
                                @if (Session::get('page') == 'products') style="background:#4B49AC !important; color: #fff !important;"
                            @else style="background: #fff !important; color:#4B49AC !important;" @endif
                                class="nav-link" href="{{ url('admin/products') }}">
                                {{ __('Sản phẩm') }}</a>
                        </li>
                        <li class="nav-item"><a
                                @if (Session::get('page') == 'coupons') style="background:#4B49AC !important; color: #fff !important;"
                        @else style="background: #fff !important; color:#4B49AC !important;" @endif
                                class="nav-link" href="{{ url('admin/coupons') }}">
                                {{ __('Phiếu Giảm Giá') }}</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a @if (Session::get('page') == 'order') style="background:#4B49AC !important; color: #fff !important;" @endif
                    class="nav-link" data-toggle="collapse" href="#ui-order" aria-expanded="false" aria-controls="ui-order">
                    <i class="icon-grid-2 menu-icon"></i>
                    <span class="menu-title">{{ __('Quản lý đơn đặt hàng') }}</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-order">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color:#4B49AC !important;">
                        <li class="nav-item"><a
                                @if (Session::get('page') == 'order') style="background:#4B49AC !important; color: #fff !important;"
                            @else style="background: #fff !important; color:#4B49AC !important;" @endif
                                class="nav-link" href="{{ url('admin/order') }}">{{ __('Đơn đặt hàng') }}</a>
                        </li>

                    </ul>
                </div>
            </li>
    </ul>
@else
    {{-- <li class="nav-item">
        <a @if (Session::get('page') == 'update-password' || Session::get('page') == 'update-details') style="background:#4B49AC !important; color: #fff !important;" @endif
            class="nav-link" data-toggle="collapse" href="#ui-setting" aria-expanded="false" aria-controls="ui-setting">
            <i class="icon-grid-2 menu-icon"></i>
            <span class="menu-title">{{ __('Cài Đặt') }}</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-setting">
            <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #4B49AC !important;">
                <li class="nav-item"><a
                        @if (Session::get('page') == 'update-password') style="background:#4B49AC !important; color: #fff !important;"
                @else style="background: #fff !important; color:#4B49AC !important;" @endif
                        class="nav-link" href="{{ url('admin/update-password') }}">{{ __('Cập nhật mật khẩu') }}</a>
                </li>
                <li class="nav-item"><a
                        @if (Session::get('page') == 'update-details') style="background:#4B49AC !important; color: #fff !important;"
                @else style="background: #fff !important; color:#4B49AC !important;" @endif
                        class="nav-link" href="{{ url('admin/update-details') }}">{{ __('Cập nhật chi tiết') }}</a>
                </li>
            </ul>
        </div>
    </li> --}}


    <li class="nav-item">
        <a @if (Session::get('page') == 'sections' ||
                Session::get('page') == 'categories' ||
                Session::get('page') == 'products' ||
                Session::get('page') == 'coupons' ||
                Session::get('page') == 'filters' ||
                Session::get('page') == 'brands') style="background:#4B49AC !important; color: #fff !important;" @endif
            class="nav-link" data-toggle="collapse" href="#ui-catalogue" aria-expanded="false"
            aria-controls="ui-catalogue">
            <i class="icon-grid-2 menu-icon"></i>
            <span class="menu-title">{{ __('Quản lý danh mục') }}</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-catalogue">
            <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #4B49AC !important;">
                <li class="nav-item"><a
                        @if (Session::get('page') == 'sections') style="background:#4B49AC !important; color: #fff !important;"
                    @else style="background: #fff !important; color:#4B49AC !important;" @endif
                        class="nav-link" href="{{ url('admin/sections') }}">{{ __('Thể Loại') }}</a>
                </li>
                <li class="nav-item"><a
                        @if (Session::get('page') == 'categories') style="background:#4B49AC !important; color: #fff !important;"
                    @else style="background: #fff !important; color:#4B49AC !important;" @endif
                        class="nav-link" href="{{ url('admin/categories') }}">{{ __('Danh Mục') }}</a>

                </li>
                <li class="nav-item"><a
                        @if (Session::get('page') == 'brands') style="background:#4B49AC !important; color: #fff !important;"
                    @else style="background: #fff !important; color:#4B49AC !important;" @endif
                        class="nav-link" href="{{ url('admin/brands') }}"> {{ __('Thương Hiệu') }}</a>
                </li>
                <li class="nav-item"><a
                        @if (Session::get('page') == 'products') style="background:#4B49AC !important; color: #fff !important;"
                    @else style="background: #fff !important; color:#4B49AC !important;" @endif
                        class="nav-link" href="{{ url('admin/products') }}"> {{ __('Sản phẩm') }}</a>
                </li>
                <li class="nav-item"><a
                        @if (Session::get('page') == 'filters') style="background:#4B49AC !important; color: #fff !important;"
                    @else style="background: #fff !important; color:#4B49AC !important;" @endif
                        class="nav-link" href="{{ url('admin/filters') }}">{{ __('Bộ Lọc') }}</a>
                </li>
                <li class="nav-item"><a
                        @if (Session::get('page') == 'coupons') style="background:#4B49AC !important; color: #fff !important;"
                    @else style="background: #fff !important; color:#4B49AC !important;" @endif
                        class="nav-link" href="{{ url('admin/coupons') }}"> {{ __('Phiếu Giảm Giá') }}</a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a @if (Session::get('page') == 'users' || Session::get('page') == 'staff') style="background:#4B49AC !important; color: #fff !important;" @endif
            class="nav-link" data-toggle="collapse" href="#ui-user" aria-expanded="false" aria-controls="ui-user">
            <i class="mdi mdi-account-circle menu-icon"></i>
            <span class="menu-title">{{ __('Quản lý Người Dùng') }}</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-user">
            <ul class="nav flex-column sub-menu" style="background: #fff !important; color:#4B49AC !important;">
                <li class="nav-item"><a
                        @if (Session::get('page') == 'users') style="background:#4B49AC !important; color: #fff !important;"
                    @else style="background: #fff !important; color:#4B49AC !important;" @endif
                        class="nav-link" href="{{ url('admin/users') }}">{{ __('Người Dùng') }}</a>
                </li>
                {{-- <li class="nav-item"><a
                        @if (Session::get('page') == 'staff') style="background:#4B49AC !important; color: #fff !important;"
                    @else style="background: #fff !important; color:#4B49AC !important;" @endif
                        class="nav-link" href="{{ url('admin/staff') }}">{{ __('Nhân Viên') }}</a>
                </li> --}}
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a @if (Session::get('page') == 'order') style="background:#4B49AC !important; color: #fff !important;" @endif
            class="nav-link" data-toggle="collapse" href="#ui-order" aria-expanded="false" aria-controls="ui-order">
            <i class="mdi mdi-cart-plus menu-icon"></i>
            <span class="menu-title">{{ __('Quản lý đơn đặt hàng') }}</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-order">
            <ul class="nav flex-column sub-menu" style="background: #fff !important; color:#4B49AC !important;">
                <li class="nav-item"><a
                        @if (Session::get('page') == 'order') style="background:#4B49AC !important; color: #fff !important;"
                    @else style="background: #fff !important; color:#4B49AC !important;" @endif
                        class="nav-link" href="{{ url('admin/order') }}">{{ __('Đơn đặt hàng') }}</a>
                </li>

            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a @if (Session::get('page') == 'banner') style="background:#4B49AC !important; color: #fff !important;" @endif
            class="nav-link" data-toggle="collapse" href="#ui-banner" aria-expanded="false"
            aria-controls="ui-banner">
            <i class="icon-grid-2 menu-icon"></i>
            <span class="menu-title">{{ __('Quản lý Slider Banners') }}</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-banner">
            <ul class="nav flex-column sub-menu" style="background: #fff !important; color:#4B49AC !important;">
                <li class="nav-item"><a
                        @if (Session::get('page') == 'banner') style="background:#4B49AC !important; color: #fff !important;"
                    @else style="background: #fff !important; color:#4B49AC !important;" @endif
                        class="nav-link" href="{{ url('admin/banner') }}">{{ __('Quản Lý Slider Banner') }}</a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a @if (Session::get('page') == 'shipping') style="background:#4B49AC !important; color: #fff !important;" @endif
            class="nav-link" data-toggle="collapse" href="#ui-shipping" aria-expanded="false"
            aria-controls="ui-shipping">
            <i class="mdi mdi-truck-delivery menu-icon"></i>
            <span class="menu-title">{{ __('Quản lý Chi Phí Vận Chuyển') }}</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-shipping">
            <ul class="nav flex-column sub-menu" style="background: #fff !important; color:#4B49AC !important;">
                <li class="nav-item"><a
                        @if (Session::get('page') == 'shipping') style="background:#4B49AC !important; color: #fff !important;"
                    @else style="background: #fff !important; color:#4B49AC !important;" @endif
                        class="nav-link" href="{{ url('admin/shipping') }}">{{ __('Quản Lý Chi Phí Vận Chuyển') }}</a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a @if (Session::get('page') == 'order-product'|| Session::get('page') == 'order-product-total'|| Session::get('page') == 'order-date') style="background:#4B49AC !important; color: #fff !important;" @endif
            class="nav-link" data-toggle="collapse" href="#ui-order-product" aria-expanded="false"
            aria-controls="ui-order-product">
            <i class="icon-bar-graph menu-icon"></i>
            <span class="menu-title">{{ __('Quản lý và thống kê sản phẩm') }}</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-order-product">
            <ul class="nav flex-column sub-menu" style="background: #fff !important; color:#4B49AC !important;">
                <li class="nav-item"><a
                        @if (Session::get('page') == 'order-product') style="background:#4B49AC !important; color: #fff !important;"
                    @else style="background: #fff !important; color:#4B49AC !important;" @endif
                        class="nav-link" href="{{ url('admin/order-product/search') }}">{{ __('Thống Kê Sản Phẩm') }}</a>
                </li>
                <li class="nav-item"><a
                    @if (Session::get('page') == 'order-product-total') style="background:#4B49AC !important; color: #fff !important;"
                @else style="background: #fff !important; color:#4B49AC !important;" @endif
                    class="nav-link" href="{{ url('admin/order-product') }}">{{ __('Quản Lý Số Lượng') }}</a>
            </li>
            <li class="nav-item"><a
                @if (Session::get('page') == 'order-date') style="background:#4B49AC !important; color: #fff !important;"
            @else style="background: #fff !important; color:#4B49AC !important;" @endif
                class="nav-link" href="{{ url('admin/order-date') }}">{{ __('Doanh Thu Theo Ngày') }}</a>
        </li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a @if (Session::get('page') == 'view_admin' ||
                // Session::get('page') == 'view_vendor' ||
                // Session::get('page') == 'view_subadmin' ||sub
                Session::get('page') == 'view_all') style="background:#4B49AC !important; color: #fff !important;" @endif
            class="nav-link" data-toggle="collapse" href="#ui-admin" aria-expanded="false" aria-controls="ui-admin">
            {{-- <a class="nav-link" data-toggle="collapse" href="#ui-admin" aria-expanded="false" aria-controls="ui-admin"> --}}
            <i class="icon-bar-graph menu-icon"></i>
            <span class="menu-title">{{ __('Quản Lý Tài Khoản Admin') }}</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-admin">
            <ul class="nav flex-column sub-menu" style="background: #fff !important; color:#4B49AC !important;">
                {{-- <li class="nav-item"><a
                        @if (Session::get('page') == 'view_admin') style="background:#4B49AC !important; color: #fff !important;"
                    @else style="background: #fff !important; color:#4B49AC !important;" @endif
                        class="nav-link" href="{{ url('admin/list-admin/admin') }}">{{ __('Quản Trị Viên') }}</a>
                </li> --}}
                {{-- <li class="nav-item"><a
                        @if (Session::get('page') == 'view_subadmin') style="background:#4B49AC !important; color: #fff !important;"
                    @else style="background: #fff !important; color:#4B49AC !important;" @endif
                        class="nav-link"
                        href="{{ url('admin/list-admin/subadmin') }}">{{ __('Quản trị viên phụ') }}</a>
                </li> --}}
                {{-- <li class="nav-item"><a
                        @if (Session::get('page') == 'view_vendor') style="background:#4B49AC !important; color: #fff !important;"
                    @else style="background: #fff !important; color:#4B49AC !important;" @endif
                        class="nav-link" href="{{ url('admin/list-admin/vendor') }}">{{ __('Nhân Viên') }}</a> --}}
                <li class="nav-item"><a
                        @if (Session::get('page') == 'view_admin') style="background:#4B49AC !important; color: #fff !important;"
                    @else style="background: #fff !important; color:#4B49AC !important;" @endif
                        class="nav-link" href="{{ url('admin/list-admin/admin') }}">{{ __('Tất Cả') }}</a>
                </li>

            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a @if (Session::get('page') == 'update-password' || Session::get('page') == 'update-details') style="background:#4B49AC !important; color: #fff !important;" @endif
            class="nav-link" data-toggle="collapse" href="#ui-setting" aria-expanded="false" aria-controls="ui-setting">
            <i class="icon-grid-2 menu-icon"></i>
            <span class="menu-title">{{ __('Cài Đặt') }}</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-setting">
            <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #4B49AC !important;">
                <li class="nav-item"><a
                        @if (Session::get('page') == 'update-password') style="background:#4B49AC !important; color: #fff !important;"
                @else style="background: #fff !important; color:#4B49AC !important;" @endif
                        class="nav-link" href="{{ url('admin/update-password') }}">{{ __('Cập nhật mật khẩu') }}</a>
                </li>
                <li class="nav-item"><a
                        @if (Session::get('page') == 'update-details') style="background:#4B49AC !important; color: #fff !important;"
                @else style="background: #fff !important; color:#4B49AC !important;" @endif
                        class="nav-link" href="{{ url('admin/update-details') }}">{{ __('Cập nhật chi tiết') }}</a>
                </li>
            </ul>
        </div>
    </li>

    @endif

    </ul>
</nav>
