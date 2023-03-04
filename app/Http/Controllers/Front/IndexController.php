<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $sliderBanners = Banners::where('type', 'Slider')->where('status', 1)->get()->toArray();
        $fixBanners = Banners::where('type', 'Fix')->where('status', 1)->get()->toArray();
        return view('front/index')->with(compact('sliderBanners', 'fixBanners'));
    }
}
