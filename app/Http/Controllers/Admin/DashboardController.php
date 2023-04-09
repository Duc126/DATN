<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{

    public function dashboard()
    {
        Session::put('page', 'dashboard');
        $totalUser = User::where('status', 1)->count('*');
        $totalProduct = Product::where('status',1)->count('*');
        $totalBrands = Brand::where('status',1)->count('*');
        $totalOrder = Order::count('*');
        $totalVendors = Vendor::count('*');
        $totalOrderCount = DB::table('orders')
        ->select( 'user_id', DB::raw('COUNT(*) AS count_id'))
        ->groupBy( 'user_id')
        ->orderByDesc('count_id')
        ->get();
        $orders = DB::table('orders')
                    ->orderBy('id', 'desc')
                    ->limit(10)
                    ->get();
                // dd($orders);
        return view('admin.dashboard')->with(compact('totalUser','totalProduct','totalOrder','totalBrands','totalVendors','totalOrderCount','orders'));
    }
}
