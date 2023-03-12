<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a
            {{-- @if (Session::get('page') == 'dashboard') style="background: #4B49AC !important; color: #fff !important;" @endif --}}
            class="nav-link menu-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('admin/dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">{{ __('Trang Chủ') }}</span>
            </a>
        </li>
        @if (Auth::guard('admin')->user()->type == 'vendor')
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-vendor" aria-expanded="false"
                    aria-controls="ui-vendor">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">{{ __('Chi Tiết Nhà Cung Cấp') }}</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-vendor">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link"
                                href="{{ url('admin/update-vendor-details/personal') }}">{{ __('Chi Tiết Cá Nhân') }}</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link"
                                href="{{ url('admin/update-vendor-details/business') }}">{{ __('Chi Tiết Kinh Doanh') }}</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link"
                                href="{{ url('admin/update-vendor-details/bank') }}">{{ __('Chi Tiết Ngân Hàng') }}</a>
                        </li>
                    </ul>
                </div>
            </li>
    </ul>
@else
    <li class="nav-item">
        <a
        {{-- @if (Session::get('page') == 'admin/update-password' || Session::get('page') == 'admin/update-details')
        style="background: #4B49AC !important; color: #fff !important;" @endif --}}
            class="nav-link" data-toggle="collapse" href="#ui-setting" aria-expanded="false" aria-controls="ui-setting">
            <i class="icon-columns menu-icon"></i>
            <span class="menu-title">{{ __('Cài Đặt') }}</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-setting">
            <ul class="nav flex-column sub-menu"
            {{-- style="background: #fff !important;" --}}
            >
                <li
                {{-- @if (Session::get('page') == 'update-password') style="background: #4B49AC !important; color: #4B49AC !important;"
                @else style="background: #fff !important; color: #4B49AC !important;" @endif --}}
                    class="nav-item"> <a class="nav-link"
                        href="{{ route('update-password') }}">{{ __('Cập Nhật Mật Khẩu') }}</a></li>
                <li
                {{-- @if (Session::get('page') == 'update-details') style="background: #4B49AC !important; color: 4B4AC#fff !important;"
                @else style="background: #fff !important; color: #4B49AC !important;" @endif --}}
                 class="nav-item"> <a class="nav-link"
                        href="{{ route('update-details') }}">{{ __('Chi Tiết Cập Nhật') }}</a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-admin" aria-expanded="false" aria-controls="ui-admin">
            <i class="icon-bar-graph menu-icon"></i>
            <span class="menu-title">{{ __('Quản Lý Tài Khoản Admin') }}</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-admin">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link"
                        href="{{ url('admin/list-admin/admin') }}">{{ __('Quản Trị Viên') }}</a>
                </li>
                <li class="nav-item"><a class="nav-link"
                        href="{{ url('admin/list-admin/subadmin') }}">{{ __('Quản trị viên phụ') }}</a>
                </li>
                <li class="nav-item"><a class="nav-link"
                        href="{{ url('admin/list-admin/vendor') }}">{{ __('Nhân Viên') }}</a>
                <li class="nav-item"><a class="nav-link"
                        href="{{ url('admin/list-admin') }}">{{ __('Tất Cả') }}</a>

            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-catalogue" aria-expanded="false" aria-controls="ui-catalogue">
            <i class="icon-grid-2 menu-icon"></i>
            <span class="menu-title">{{ __('Quản lý danh mục') }}</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-catalogue">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link"
                        href="{{ url('admin/sections') }}">{{ __('Thể Loại') }}</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/categories') }}">{{ __('Danh Mục') }}</a>

                </li>
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/brands') }}"> {{ __('Thương Hiệu') }}</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/products') }}"> {{ __('Sản phẩm') }}</a>
                    <li class="nav-item"><a class="nav-link"
                        href="{{ url('admin/filters') }}">{{ __('Bộ Lọc') }}</a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-user" aria-expanded="false" aria-controls="ui-user">
            <i class="icon-grid-2 menu-icon"></i>
            <span class="menu-title">{{ __('Quản lý Người Dùng') }}</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-user">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link"
                        href="{{ url('admin/users') }}">{{ __('Người Dùng') }}</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/subscribers') }}">{{ __('subscribers') }}</a>

                </li>
                 {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/brands') }}"> {{ __('Thương Hiệu') }}</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/products') }}"> {{ __('Sản phẩm') }}</a> --}}
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-banner" aria-expanded="false" aria-controls="ui-banner">
            <i class="icon-grid-2 menu-icon"></i>
            <span class="menu-title">{{ __('Quản lý Banners') }}</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-banner">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link"
                        href="{{ url('admin/banner') }}">{{ __('Slider Banner') }}</a>
                </li>
                {{-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/categories') }}">{{ __('Danh Mục') }}</a>

                </li>
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/brands') }}"> {{ __('Thương Hiệu') }}</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ url('admin/products') }}"> {{ __('Sản phẩm') }}</a> --}}
            </ul>
        </div>
    </li>
    @endif
    {{-- <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
          <i class="icon-contract menu-icon"></i>
          <span class="menu-title">Icons</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="icons">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
          <i class="icon-ban menu-icon"></i>
          <span class="menu-title">Error pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="error">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/documentation/documentation.html">
          <i class="icon-paper menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li> --}}
    </ul>
</nav>
