<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShippingCharges;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShippingController extends Controller
{
    public function shipping()
    {
        Session::put('page', 'shipping');
        $shippingCharges = ShippingCharges::get()->toArray();
        return view('admin.shipping.shipping_charges')->with(compact('shippingCharges'));
    }
    public function updateStatusShipping(Request $request){
        if($request->ajax())
        {
            $data = $request->all();
            if($data['status']=="Active"){
                $status = 0;
            }
            else  {
                $status = 1;
            }
            ShippingCharges::where('id', $data['shipping_id'])->update(['status' => $status]);
            return response()->json(['status'=> $status, 'shipping_id'=> $data['shipping_id']]);
        }
    }

    public function addEditShipping($id, Request $request){
        Session::put('page', 'shipping');

        if($request->isMethod('post')){
            $data = $request->all();
            ShippingCharges::where('id', $id)->update(['rate'=> $data['rate']]);
            $message = "Chỉnh Sửa Đơn Giá Vận Chuyển Thành Công";
            return redirect()->back()->with('success_message', $message);
        }

        $shippingDetails = ShippingCharges::Where('id', $id)->first();
        $title = 'Chỉnh Sửa Đơn Gía Vận Chuyển';
        return view('admin.shipping.edit_shipping')->with(compact('shippingDetails','title'));


    }
}
