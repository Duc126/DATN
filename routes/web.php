<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminManagerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
        //update Status Sections
        Route::post('update-status-product', [ProductController::class, 'updateStatusProduct']);
        //add edit sections
        Route::match(['get', 'post'], 'add-edit-product/{id?}', [ProductController::class, 'addEditProduct']);
    });
});
