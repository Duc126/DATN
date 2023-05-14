<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Coupon;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class CouponController extends Controller
{
    public function coupons()
    {
        Session::put('page', 'coupons');
        $adminType = Auth::guard('admin')->user()->type;
        $vendor_id = Auth::guard('admin')->user()->vendor_id;
        // dd($vendor_id);

        if ($adminType == "vendor") {
            $vendorStatus = Auth::guard('admin')->user()->status;
            if ($vendorStatus == 0) {
                return redirect("admin/update-vendor-details/personal")->with('error_message', 'Tài khoản nhà cung cấp của bạn chưa được phê duyệt.
                 Vui lòng đảm bảo điền thông tin cá nhân, doanh nghiệp và ngân hàng hợp lệ của bạn');
            }
            $coupons = Coupon::where('vendor_id', $vendor_id)->get()->toArray();
        } else {
            $coupons = Coupon::get()->toArray();
        }
        // dd($coupons);
        return view('admin.coupons.coupons')->with(compact('coupons'));
    }
    public function updateStatusCoupon(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            Coupon::where('id', $data['coupon_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'coupon_id' => $data['coupon_id']]);
        }
    }
    public function deleteCoupon($id)
    {
        Coupon::where('id', $id)->delete();
        $message = __('messages.delete');
        return redirect()->back()->with('success_message', $message);
    }
    public function addEditCoupon(Request $request, $id = null)
    {
        Session::put('page', 'coupons');

        if ($id == "") {
            //add coupon
            $title = __('messages.coupons.add-coupons');
            $coupon = new Coupon();
            $selCats = array();
            $selBrands = array();
            $selUsers = array();
            $message = __('messages.coupons.add-coupons-success');
        } else {
            //edit coupon
            $title = __('messages.coupons.update-coupons');
            $coupon = Coupon::find($id);
            $selCats = explode(',', $coupon['categories']);
            $selBrands = explode(',', $coupon['brands']);
            $selUsers = explode(',', $coupon['users']);
            $message = __('messages.coupons.update-coupons-success');
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            $rules = [
                'categories' => 'required',
                'brands' => 'required',
                'coupon_option' => 'required',
                'coupon_type' => 'required',
                'amount_type' => 'required',
                'amount' => 'required|numeric',
                'expiry_date' => 'required',

            ];
            $customMessages = [
                'categories.required' => __('messages.coupons.category_r'),
                'brands.required' => __('messages.coupons.brand_r'),
                'coupon_option.required' => __('messages.coupons.coupon_option_r'),
                'coupon_type.required' => __('messages.coupons.coupon_type_r'),
                'amount.required' => __('messages.coupons.amount_r'),
                'amount.numeric' => 'Enter amount valid',
                'expiry_date.required' => __('messages.coupons.expiry_date_r'),
                'amount_type.required' => __('messages.coupons.amount_type_r'),

            ];
            $this->validate($request, $rules, $customMessages);
            if (isset($data['categories'])) {
                $categories = implode(",", $data['categories']);
            } else {
                $categories = "";
            }
            if (isset($data['brands'])) {
                $brands = implode(",", $data['brands']);
            } else {
                $brands = "";
            }
            if (isset($data['users'])) {
                $users = implode(",", $data['users']);
            } else {
                $users = "";
            }

            if ($data['coupon_option'] == "Automatic") {
                $coupon_code = str_random(8);
            } else {
                $coupon_code = $data['coupon_code'];
            }
            // echo "<pre>"; print_r($data);die;

            $adminType = Auth::guard('admin')->user()->type;
            if ($adminType == "vendor") {
                $coupon->vendor_id = Auth::guard('admin')->user()->vendor_id;
            } else {
                $coupon->vendor_id = 0;
            }


            $coupon->coupon_option = $data['coupon_option'];
            $coupon->coupon_code = $coupon_code;
            $coupon->categories = $categories;
            $coupon->brands = $brands;
            $coupon->users = $users;
            $coupon->coupon_type = $data['coupon_type'];
            $coupon->amount_type = $data['amount_type'];
            $coupon->amount = $data['amount'];
            $coupon->expiry_date = $data['expiry_date'];
            $coupon->status = 1;
            $coupon->save();
            return redirect('admin/coupons')->with('success_message', $message);
        }
        $categories = Section::with('categories')->get()->toArray();

        $brands = Brand::where('status', 1)->get()->toArray();
        $users = User::select('email')->where('status', 1)->get();
        return view('admin.coupons.add_edit_coupon')->with(compact('title', 'coupon', 'categories', 'brands', 'users', 'selCats', 'selBrands', 'selUsers'));
    }
}
