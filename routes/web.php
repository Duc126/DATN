<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminManagerController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FilterController;
use App\Http\Controllers\Admin\InvoicePdfController;
use App\Http\Controllers\Admin\OrderAdminController;
use App\Http\Controllers\Admin\OrderProductController;
use App\Http\Controllers\Admin\ProductAttributesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\UserPageAdminController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\ShippingController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Front\AddProductController;
use App\Http\Controllers\Front\AddressController as FrontAddressController;
use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Front\OrderController;
use App\Http\Controllers\Front\PaypalController;
use App\Http\Controllers\Front\ProductsViewController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\Front\VendorController as FrontVendorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchProductController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Route::post('/language', function (Request $request) {
//     $locale = $request->input('locale');
//     app()->setLocale($locale);
//     // dd($locale);
//     return back();
// })->name('language');
Route::get('lang/{locale}', [HomeController::class, 'lang'])->name('lang.switch');



require __DIR__ . '/auth.php';
Route::prefix('admin')->group(function () {
    //admin Login
    Route::match(['get', 'post'], 'login', [AdminController::class, 'login']);
    Route::group(['middleware' => ['admin']], function () {
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('Ad-dashboard');
        //Update Password
        Route::match(['get', 'post'], 'update-password', [AdminController::class, 'updatePassword'])->name('update-password');
        Route::post('check-admin-password', [AdminController::class, 'checkPassword']);
        //Admin logout
        Route::get('logout', [AdminController::class, 'logout']);
        //Update Detail
        Route::match(['get', 'post'], 'update-details', [AdminController::class, 'updateDetails'])->name('update-details');
        //Update Vendor Detail
        Route::match(['get', 'post'], 'update-vendor-details/{slug}', [VendorController::class, 'updateVendorsDetail']);
        ////Manager Admin
        Route::get('list-admin/{type?}', [AdminManagerController::class, 'admins']);
        //View Vendor
        Route::get('view-vendor/{id}', [AdminManagerController::class, 'viewVendor']);
        //update Status Admin
        Route::post('update-status-admin', [AdminManagerController::class, 'updateStatus']);
        // Sections
        Route::resource('sections', SectionController::class);
        Route::get('delete-section/{id}', [SectionController::class, 'deleteSection']);
        //update Status Sections
        Route::post('update-status-section', [SectionController::class, 'updateStatusSection']);
        //add edit sections
        Route::match(['get', 'post'], 'add-edit-section/{id?}', [SectionController::class, 'addEditSection']);

        //categories
        Route::resource('categories', CategoryController::class);
        Route::post('update-category-status', [CategoryController::class, 'updateCategoryStatus']);
        Route::match(['get', 'post'], 'add-edit-category/{id?}', [CategoryController::class, 'addEditCategory']);
        Route::get('append-categories', [CategoryController::class, 'appendCategories']);
        Route::get('delete-category/{id}', [CategoryController::class, 'deleteCategory']);
        Route::get('delete-category-image/{id}', [CategoryController::class, 'deleteCategoryImage']);

        // Brands
        Route::resource('brands', BrandController::class);
        Route::get('delete-brand/{id}', [BrandController::class, 'deleteBrand']);
        //update Status Sections
        Route::post('update-status-brand', [BrandController::class, 'updateStatusBrand']);
        //add edit sections
        Route::match(['get', 'post'], 'add-edit-brand/{id?}', [BrandController::class, 'addEditBrand']);

        //products
        Route::resource('products', ProductController::class);
        Route::get('delete-product/{id}', [ProductController::class, 'deleteProduct']);
        //update Status Product
        Route::post('update-status-product', [ProductController::class, 'updateStatusProduct']);
        //add edit Product
        Route::match(['get', 'post'], 'add-edit-product/{id?}', [ProductController::class, 'addEditProduct']);
        Route::get('delete-product-image/{id}', [ProductController::class, 'deleteProductImage']);
        Route::get('delete-product-video/{id}', [ProductController::class, 'deleteProductVideo']);
        //Attributes Product
        Route::match(['get', 'post'], 'add-attributes-product/{id}', [ProductAttributesController::class, 'addAttributesProduct']);
        Route::post('update-status-attributes-product', [ProductAttributesController::class, 'updateStatusAttributesProduct']);
        Route::match(['get', 'post'], 'edit-attributes/{id}', [ProductAttributesController::class, 'editAttributesProduct']);

        //Image Product
        Route::match(['get', 'post'], 'add-image-product/{id}', [ProductImageController::class, 'addImageProduct']);
        Route::get('delete-image/{id}', [ProductImageController::class, 'deleteImagesProduct']);
        Route::post('update-status-images-product', [ProductImageController::class, 'updateStatusImagesProduct']);
        //Banner
        Route::resource('banner', BannerController::class);
        Route::post('update-status-banner', [BannerController::class, 'updateStatusBanner']);
        Route::get('delete-banner/{id}', [BannerController::class, 'deleteBanner']);
        Route::match(['get', 'post'], 'add-edit-banner/{id?}', [BannerController::class, 'addEditBanner']);
        //Filters

        Route::resource('filters', FilterController::class);
        Route::get('filters-value', [FilterController::class, 'filterValue']);
        Route::post('update-status-filter', [FilterController::class, 'updateStatusFilter']);
        Route::post('update-status-filterValue', [FilterController::class, 'updateStatusFilterValue']);
        Route::match(['get', 'post'], 'add-edit-filter/{id?}', [FilterController::class, 'addEditFilter']);
        Route::match(['get', 'post'], 'add-edit-filter-value/{id?}', [FilterController::class, 'addEditFilterValue']);
        Route::post('category-filter', [FilterController::class, 'categoryFilter']);

        //Coupons
        Route::get('coupons', [CouponController::class, 'coupons']);
        Route::post('update-status-coupon', [CouponController::class, 'updateStatusCoupon']);
        Route::get('delete-coupon/{id}', [CouponController::class, 'deleteCoupon']);
        Route::match(['get', 'post'], 'add-edit-coupon/{id?}', [CouponController::class, 'addEditCoupon']);

        //Users
        Route::get('users', [UserPageAdminController::class, 'index']);
        Route::post('update-status-user', [UserPageAdminController::class, 'updateStatusUser']);
        Route::get('delete-user/{id}', [UserPageAdminController::class, 'deleteUser']);
        //order
        Route::get('order', [OrderAdminController::class, 'listOrder']);
        Route::get('order/{id}', [OrderAdminController::class, 'orderDetails']);
        Route::post('update-order-status', [OrderAdminController::class, 'updateOrderStatus']);
        Route::post('update-order-item-status', [OrderAdminController::class, 'updateOrderItemStatus']);

        //order invoices
        Route::get('order/invoice/{id}', [OrderAdminController::class, 'viewInvoice']);
        Route::get('order/invoice/pdf/{id}', [InvoicePdfController::class, 'viewPDFInvoice']);


        Route::post('/update-staff', [OrderAdminController::class, 'assignStaff'])->name('assignStaff');

        //Staff
        Route::get('staff', [StaffController::class, 'listStaff']);
        Route::match(['get', 'post'], 'add-edit-staff/{id?}', [StaffController::class, 'addEditStaff']);
        Route::post('update-status-staff', [StaffController::class, 'updateStatusStaff']);
        Route::get('delete-staff/{id}', [StaffController::class, 'deleteStaff']);


        //order product
        // Route::get('order-product', [OrderProductController::class, 'OrderProduct']);
        // Route::get('order-date', [OrderProductController::class, 'orderDate']);
        Route::get('/order-product', [OrderProductController::class, 'OrderProduct'])->name('order-product');

        Route::get('/order-product-total/search', [OrderProductController::class, 'searchByProduct'])->name('admin.order-product-total.search');

        Route::get('/search-products', [OrderProductController::class, 'OrderProduct'])->name('search_products');
        Route::get('/order-date', [OrderProductController::class, 'orderDate'])->name('sales.index');

        Route::get('order-product/search', [OrderProductController::class, 'searchProducts'])->name('search_products');

        //SHIPPING
        Route::get('shipping', [ShippingController::class, 'shipping']);
        Route::post('update-status-shipping', [ShippingController::class, 'updateStatusShipping']);
        Route::get('delete-shipping/{id}', [ShippingController::class, 'deleteShipping']);

        Route::match(['get', 'post'], 'add-edit-shipping/{id?}', [ShippingController::class, 'addEditShipping']);
    });
});
Route::get('order/invoice/download/{id}', 'App\Http\Controllers\Admin\InvoicePdfController@viewPDFInvoice');

Route::namespace('App\Http\Controllers\Front')->group(function () {
    Route::get('/', [IndexController::class, 'index']);
    $catUrls = Category::select('url')->where('status', 1)->get()->pluck('url')->toArray();
    // dd($catUrls);die;
    foreach ($catUrls as $key => $url) {
        Route::match(['get', 'post'], '/' . $url, [ProductsViewController::class, 'listingIndex']);
    }
    //Vendor Products
    Route::get('/products/{vendorId}', [ProductsViewController::class, 'vendorListing']);
    //Product Detail Page
    Route::get('/product/{id}', [ProductsViewController::class, 'detail']);
    //GET PRODUCT ATTRIBUTE PRICE

    Route::post('get-product-price', [ProductsViewController::class, 'getProductPrice']);

    //Vendor Login/Register

    Route::get('/vendor/login-register', [FrontVendorController::class, 'loginRegister']);
    Route::post('/vendor/register', [FrontVendorController::class, 'vendorRegister']);
    Route::get('vendor/confirm/{code}', [FrontVendorController::class, 'confirmVendor']);

    //Add to card route
    Route::post('cart/add', [AddProductController::class, 'cartAdd']);
    Route::get('cart', [AddProductController::class, 'cart']);

    //Update cart item quantity
    Route::post('/cart/update', [AddProductController::class, 'cartUpdate']);

    //delete cart item quantity
    Route::post('/cart/delete', [AddProductController::class, 'cartDelete']);
    //use login
    Route::get('user/login-register', ['as' => 'login', 'uses' => 'UserController@loginRegister']);
    //User register
    Route::post('user/register', [UserController::class, 'userRegister']);
    //use logout
    Route::get('user/logout', [UserController::class, 'userLogout']);
    //login user
    Route::post('user/login', [UserController::class, 'userLogin']);



    //confirm user  account
    Route::get('/user/confirm/{code}', [UserController::class, 'confirmAccountUser']);
    //user forgot password
    Route::match(['get', 'post'], 'user/forgot-password', [UserController::class, 'forgotPassword']);
    //search products
    Route::get('search-products', [ProductsViewController::class, 'listingIndex']);

    Route::group(['middleware' => ['auth']], function () {
        //user account
        Route::match(['get', 'post'], 'user/account', [UserController::class, 'userAccount']);
        //Update Password account User
        Route::post('user/update-password', [UserController::class, 'updatePasswordUser']);
        //apply coupon
        Route::post('/apply-coupon', [AddProductController::class, 'applyCoupon']);
        //checkout
        Route::match(['get', 'post'], '/checkout', [ProductsViewController::class, 'checkout']);
        //get delivery address
        Route::post('get-delivery-address', [FrontAddressController::class, 'getDeliveryAddress']);
        //save delivery address
        Route::post('/save-delivery-address', [FrontAddressController::class, 'saveDeliveryAddress']);
        //Remove delivery address
        Route::post('/remove-delivery-address', [FrontAddressController::class, 'removeDeliveryAddress']);

        //Thank
        Route::get('thanks', [ProductsViewController::class, 'thanks']);
        //user orders
        Route::get('user/order/{id?}', [OrderController::class, 'order']);

        //paypal
        Route::get('paypal', [PaypalController::class, 'paypal']);
    });
});
