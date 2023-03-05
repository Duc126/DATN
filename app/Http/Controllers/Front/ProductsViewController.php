<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class ProductsViewController extends Controller
{
    public function listingIndex(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            // echo "<pre>";
            // print_r($data);
            // die;
            $_GET['sort'] = $data['sort'];
            $url = $data['url'];
            $categoryCount = Category::where(['url' => $url, 'status' => 1])->count();
            if ($categoryCount > 0) {
                $categoryDetails = Category::categoryDetails($url);
                $categoryProducts = Product::with('brand')->whereIn('category_id', $categoryDetails['catIds'])->where('status', 1);
                //check for sort
                if (isset($_GET['sort']) && !empty($_GET['sort'])) {
                    if ($_GET['sort'] == "product_latest") {
                        $categoryProducts->orderBy('products.id', 'Desc');
                    } else if ($_GET['sort'] == "price_lowest") {
                        $categoryProducts->orderBy('products.product_price', 'Asc');
                    } else if ($_GET['sort'] == "price_highest") {
                        $categoryProducts->orderBy('products.product_price', 'Desc');
                    } else if ($_GET['sort'] == "name_z_a") {
                        $categoryProducts->orderBy('products.product_name', 'Desc');
                    } else if ($_GET['sort'] == "name_a_z") {
                        $categoryProducts->orderBy('products.product_name', 'Asc');
                    }
                }

                $categoryProducts = $categoryProducts->paginate(10);
                // dd($categoryDetails);
                return view('front.products.products_listing')->with(compact('categoryDetails', 'categoryProducts', 'url'));
                // echo "Category exits"; die;
            } else {
                abort(404);
            }
        } else {
            $url = Route::getFacadeRoot()->current()->uri();
            $categoryCount = Category::where(['url' => $url, 'status' => 1])->count();
            if ($categoryCount > 0) {
                $categoryDetails = Category::categoryDetails($url);
                $categoryProducts = Product::with('brand')->whereIn('category_id', $categoryDetails['catIds'])->where('status', 1);
                //check for sort
                if (isset($_GET['sort']) && !empty($_GET['sort'])) {
                    if ($_GET['sort'] == "product_latest") {
                        $categoryProducts->orderBy('products.id', 'Desc');
                    } else if ($_GET['sort'] == "price_lowest") {
                        $categoryProducts->orderBy('products.product_price', 'Asc');
                    } else if ($_GET['sort'] == "price_highest") {
                        $categoryProducts->orderBy('products.product_price', 'Desc');
                    } else if ($_GET['sort'] == "name_z_a") {
                        $categoryProducts->orderBy('products.product_name', 'Desc');
                    } else if ($_GET['sort'] == "name_a_z") {
                        $categoryProducts->orderBy('products.product_name', 'Asc');
                    }
                }

                $categoryProducts = $categoryProducts->paginate(10);
                // dd($categoryDetails);
                return view('front.products.listing')->with(compact('categoryDetails', 'categoryProducts', 'url'));
                // echo "Category exits"; die;
            } else {
                abort(404);
            }
        }
    }
}
