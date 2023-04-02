<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItemStatus;
use App\Models\OrderProduct;
use App\Models\OrderStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class OrderAdminController extends Controller
{
    public function listOrder()
    {
        Session::put('page', 'order');

        $adminType = Auth::guard('admin')->user()->type;
        $vendor_id = Auth::guard('admin')->user()->vendor_id;
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
    public function orderDetails($id)
    {
        Session::put('page', 'order');

        $adminType = Auth::guard('admin')->user()->type;
        $vendor_id = Auth::guard('admin')->user()->vendor_id;
        if ($adminType == "vendor") {
            $vendorStatus = Auth::guard('admin')->user()->status;
            if ($vendorStatus == 0) {
                return redirect("admin/update-vendor-details/personal")->with('error_message', 'Tài khoản nhà cung cấp của bạn chưa được phê duyệt.
                 Vui lòng đảm bảo điền thông tin cá nhân, doanh nghiệp và ngân hàng hợp lệ của bạn');
            }
        }
        if ($adminType == "vendor") {
            $orderDetails = Order::with(['orders_products' => function ($query) use ($vendor_id) {
                $query->where('vendor_id', $vendor_id);
            }])->where('id', $id)->first()->toArray();
        } else {
            $orderDetails = Order::with('orders_products')->where('id', $id)->first()->toArray();
        }

        $userDetails = User::where('id', $orderDetails['user_id'])->first()->toArray();
        $orderStatus = OrderStatus::where('status', 1)->get()->toArray();
        $orderItemStatus = OrderItemStatus::where('status', 1)->get()->toArray();
        return view('admin.orders.orders_details_admin')->with(compact('orderDetails', 'userDetails', 'orderStatus', 'orderItemStatus'));
    }

    public function updateOrderStatus(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            //Update order status
            Order::where('id', $data['order_id'])->update(['order_status' => $data['order_status']]);

            //get delivery details
            $deliveryDetails = Order::select('phone', 'email', 'name')->where('id', $data['order_id'])->first()->toArray();
            $orderDetails = Order::with('orders_products')->where('id', $data['order_id'])->first()->toArray();

            //send order status update email
            $email = $deliveryDetails['email'];
            $messageData = [
                'email' => $email,
                'name' => $deliveryDetails['name'],
                'order_id' => $data['order_id'],
                'orderDetails' => $orderDetails,
                'order_status' => $data['order_status'],
            ];
            Mail::send('emails.notification_order_status', $messageData, function ($message) use ($email) {
                $message->to($email)->subject('Trạng Thái Đơn Hàng Đã Được Cập Nhật');
            });

            $message = "Trạng thái đơn hàng đã được cập nhật thành công!";
            return redirect()->back()->with('success_message', $message);
        }
    }
    public function updateOrderItemStatus(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            //Update order status
            OrderProduct::where('id', $data['order_item_id'])->update(['item_status' => $data['order_item_status']]);

            $getOrderId = OrderProduct::select('order_id')->where('id', $data['order_item_id'])->first()->toArray();
            //get delivery details
            $deliveryDetails = Order::select('phone', 'email', 'name')->where('id', $getOrderId['order_id'])->first()->toArray();
            $orderDetails = Order::with('orders_products')->where('id', $getOrderId['order_id'])->first()->toArray();

            //send order status update email
            $email = $deliveryDetails['email'];
            $messageData = [
                'email' => $email,
                'name' => $deliveryDetails['name'],
                'order_id' => $getOrderId['order_id'],
                'orderDetails' => $orderDetails,
                'order_status' => $data['order_item_status'],
            ];
            Mail::send('emails.notification_order_status', $messageData, function ($message) use ($email) {
                $message->to($email)->subject('Trạng Thái Mặt Hàng Đã Được Cập Nhật');
            });
            $message = "Trạng thái mặt hàng đã được cập nhật thành công!";
            return redirect()->back()->with('success_message', $message);
        }
    }
}
