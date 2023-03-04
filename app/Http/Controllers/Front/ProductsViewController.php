<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class ProductsViewController extends Controller
{
    public function listingIndex(){
         $url = Route::getFacadeRoot()->current()->uri();
         $categoryCount = Category::where(['url'=>$url,'status'=>1])->count();
         if($categoryCount > 0){
            $categoryDetails = Category::categoryDetails($url);
        $categoryProducts = Product::with('brand')->whereIn('category_id',$categoryDetails['catIds'])->where('status', 1)
        ->get()->toArray();
        // dd($categoryDetails);
            return view('front.products.listing')->with(compact('categoryDetails','categoryProducts'));
            // echo "Category exits"; die;
         }
         else {
            abort(404);
         }
    }
}
