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
        $totalProduct = Product::where('status', 1)->count('*');
        $totalBrands = Brand::where('status', 1)->count('*');
        $totalOrder = Order::count('*');
        $totalVendors = Vendor::count('*');

        $totalOrderCount = DB::table('users')
            ->select(DB::raw('users.*, COUNT(orders.id) AS count_id'))
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->groupBy(
                'users.id',
                'users.name',
                'users.email',
                'users.address',
                'users.city',
                'users.state',
                'users.country',
                'users.pincode',
                'users.phone',
                'users.email_verified_at',
                'users.password',
                'users.status',
                'users.remember_token',
                'users.created_at',
                'users.updated_at'
            ) // Thêm tên tất cả các cột trong bảng users vào đây
            ->orderByDesc('count_id')
            ->get();

        $orders = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->select('orders.*', 'users.name')
            ->orderBy('orders.id', 'desc')
            ->limit(10)
            ->get();
        // dd($orders);

        $result = DB::table('orders')
            ->selectRaw("DATE_FORMAT(created_at, '%m-%Y') as month, SUM(grand_total) as revenue")
            ->groupBy('month')
            ->get();
            // $week = DB::table('orders')
            // ->selectRaw("CONCAT(YEAR(created_at), '-', WEEK(created_at)) as week, SUM(grand_total) as revenue")
            // ->groupBy('week')
            // ->get();
            // $date = DB::table('orders')
            // ->selectRaw("DATE_FORMAT(created_at, '%Y-%m-%d') as date, SUM(grand_total) as revenue")
            // ->groupBy('date')
            // ->get();
        // dd($date);

        return view('admin.dashboard')->with(compact('totalUser', 'totalProduct', 'totalOrder', 'totalBrands', 'totalVendors', 'totalOrderCount', 'orders', 'result'));
    }
}
