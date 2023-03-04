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
        return view('front/index')->with(compact('sliderBanners', 'fixBanners', 'newProducts'));
    }
}
