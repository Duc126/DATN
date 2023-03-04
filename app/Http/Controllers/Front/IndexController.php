<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $sliderBanners = Banners::where('type', 'Slider')->where('status', 1)->get()->toArray();
        $fixBanners = Banners::where('type', 'Fix')->where('status', 1)->get()->toArray();
        $newProducts = Product::orderBy('id', 'Desc')->where('status',1)->limit(4)->get()->toArray();
        $bestSellers = Product::where(['is_bestseller' =>'Yes', 'status' => 1])->get()->toArray();
        $discountedProducts = Product::Where('product_discount','>',0)->where('status',1)->limit(6)->inRandomOrder()->get()->toArray();
        $featuredProduct = Product::where(['is_featured' =>'Yes', 'status' => 1])->limit(6)->get()->toArray();

        // dd($featuredProduct);
        return view('front/index')->with(compact('sliderBanners', 'fixBanners', 'newProducts','bestSellers','discountedProducts','featuredProduct'));
    }
}
