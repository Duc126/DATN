<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderAdminController extends Controller
{
    public function listOrder()
    {
        Session::put('page', 'order');
        $adminType = Auth::guard('admin')->user()->type;
        $vendor_id = Auth::guard('admin')->user()->vendor_id;
        // dd($vendor_id);

        if ($adminType == "vendor") {
            $vendorStatus = Auth::guard('admin')->user()->status;
            if ($vendorStatus == 0) {
                return redirect("admin/update-vendor-details/personal")->with('error_message', 'Tài khoản nhà cung cấp của bạn chưa được phê duyệt.
                 Vui lòng đảm bảo điền thông tin cá nhân, doanh nghiệp và ngân hàng hợp lệ của bạn');
            }
        }
        if ($adminType == "vendor") {
            $orders = Order::with(['orders_products' => function ($query) use ($vendor_id) {
                $query->where('vendor_id', $vendor_id);
            }])->orderBy('id', 'Desc')->get()->toArray();
        } else {
            $orders = Order::with('orders_products')->orderBy('id', 'Desc')->get()->toArray();
        }
        // $orders = Order::with('orders_products')->orderBy('id', 'Desc')->get()->toArray();
        // dd($orders);
        return view('admin.orders.list_order')->with(compact('orders'));
    }
    public function orderDetails($id){
        $orderDetails = Order::with('orders_products')->where('id',$id)->first()->toArray();
        $userDetails = User::where('id', $orderDetails['user_id'])->first()->toArray();
        return view('admin.orders.orders_details_admin')->with(compact('orderDetails', 'userDetails'));
    }
}
