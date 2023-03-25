<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminManagerController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FilterController;
use App\Http\Controllers\Admin\ProductAttributesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Front\AddProductController;
use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Front\ProductsViewController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\Front\VendorController as FrontVendorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;

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

require __DIR__ . '/auth.php';
Route::prefix('admin')->group(function () {
    //admin Login
    Route::match(['get', 'post'], 'login', [AdminController::class, 'login']);
    Route::group(['middleware' => ['admin']], function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('Ad-dashboard');
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
    });
});

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
    Route::get('user/login-register', [UserController::class, 'loginRegister']);
    //User register
    Route::post('user/register', [UserController::class, 'userRegister']);
    //use logout
    Route::get('user/logout', [UserController::class, 'userLogout']);
    //login user
    Route::post('user/login',[UserController::class, 'userLogin']);
    //confirm user  account
    Route::get('/user/confirm/{code}',[UserController::class, 'confirmAccountUser']);
});
