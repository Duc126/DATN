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
    public function updateStatusShipping(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            ShippingCharges::where('id', $data['shipping_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'shipping_id' => $data['shipping_id']]);
        }
    }

    public function addEditShipping(Request $request, $id = null)
    {
        Session::put('page', 'shipping');
        if ($id == "") {
            $title = __('messages.shipping.add-shipping');
            $shippingDetails = new ShippingCharges;
            $message = __('messages.shipping.add-shipping-success');
        } else {
            $title =  __('messages.shipping.update-shipping');
            $shippingDetails = ShippingCharges::find($id);
            $message = __('messages.shipping.update-shipping-success');
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                '0_500g' => 'required|numeric|min:0',
                '501_1000g' => 'required|numeric|min:0',
                '1001_2000g' => 'required|numeric|min:0',
                '2001_5000g' => 'required|numeric|min:0',
                'above_5000g' => 'required|numeric|min:0',


            ];
            $customMessages = [
                '0_500g.required' => 'Giá tiền từ 0 - 500g là bắt buộc',
                '0_500g.min' => 'Giá tiền từ 0 - 500g không được nhỏ hơn 0',
                '501_1000g.required' => 'Giá tiền từ 501 - 1000g là bắt buộc',
                '501_1000g.min' => 'Giá tiền từ 501 - 1000g không được nhỏ hơn 0',
                '1001_2000g.required' => 'Giá tiền từ 1001 - 2000g là bắt buộc',
                '1001_2000g.min' => 'Giá tiền từ 1001 - 2000g không được nhỏ hơn 0',
                '2001_5000g.required' => 'Giá tiền từ 2001 - 5000g là bắt buộc',
                '2001_5000g.min' => 'Giá tiền từ 2001 - 5000g không được nhỏ hơn 0',
                'above_5000g.required' => 'Giá tiền trên 5000g là bắt buộc',
                'above_5000g.min' => 'Giá tiền trên 5000g không được nhỏ hơn 0',
            ];
            $this->validate($request, $rules, $customMessages);
            $shippingDetails->state = $data['state'];
            $shippingDetails->{"0_500g"} = $data['0_500g'];
            $shippingDetails->{"501_1000g"} = $data['501_1000g'];
            $shippingDetails->{"1001_2000g"} = $data['1001_2000g'];
            $shippingDetails->{"2001_5000g"} = $data['2001_5000g'];
            $shippingDetails->{"above_5000g"} = $data['above_5000g'];
            $shippingDetails->status = 1;
            $shippingDetails->save();
            // dd();
            // dd($section);
            return redirect('admin/shipping')->with('success_message', $message);
            // ShippingCharges::where('id', $id)->update([
            //     '0_500g' => $data['0_500g'], '501_1000g' => $data['501_1000g'], '1001_2000g' => $data['1001_2000g'],
            //     '2001_5000g' => $data['2001_5000g'], 'above_5000g' => $data['above_5000g']
            // ]);
            // $message = "Chỉnh Sửa Đơn Giá Vận Chuyển Thành Công";
            // return redirect()->back()->with('success_message', $message);
        }

        // $shippingDetails = ShippingCharges::Where('id', $id)->first();
        // $title = 'Chỉnh Sửa Đơn Gía Vận Chuyển';
        return view('admin.shipping.edit_shipping')->with(compact('shippingDetails', 'title'));
    }
    public function deleteShipping($id){
        ShippingCharges::where('id',$id)->delete();
        $message = __('messages.delete_success');
        return redirect()->back()->with('success_message', $message);
    }
}
