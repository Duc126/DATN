<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Countries;
use App\Models\Vendor;
use App\Models\VendorsBankDetail;
use App\Models\VendorsBusinessDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\Print_;
use Intervention\Image\Facades\Image;

class VendorController extends Controller
{
    public function updateVendorsDetail($slug, Request $request)
    {
        if ($slug == "personal") {
            Session::put('page','update-personal-details');
            if ($request->isMethod('post')) {
                $updateDetails = $request->all();
                // dd($updateDetails);
                $rules = [
                    'first_name' => 'required|min:2',
                    'last_name' => 'required|min:6',
                    'phone' => 'required|numeric|min:10',
                ];
                $customMessages = [
                    'first_name.required' => 'Họ là bắt buộc',
                    'first_name.min' => 'Họ phải có ít nhất 2 ký tự',
                    'last_name.required' => 'Tên là bắt buộc',
                    'last_name.min' => 'Tên phải có ít nhất 6 ký tự',
                    'phone.required' => 'Số điện thoại là bắt buộc',
                    'phone.numeric' => 'Số điện thoại không hợp lệ',
                    'phone.min' => 'Số điện thoại phải 10 ký tự đúng định dạng',
                    // 'mobile.regex' => 'Số điện thoại phải đúng định dạng'
                ];

                $this->validate($request, $rules, $customMessages);

                //update Image
                if ($request->hasFile('image')) {
                    $avatar = $request->file('image');
                    if ($avatar->isValid()) {
                        //Lấy ảnh từ extension
                        $extension = $avatar->getClientOriginalExtension();
                        //Xuat ra anh moi
                        $imageName = rand(111, 99999) . '.' . $extension;
                        $imagePath = 'admin/images/photos/' . $imageName;
                        Image::make($avatar)->save($imagePath);
                    };
                } else if (!empty($updateDetails['current-image'])) {
                    $imageName = $updateDetails['current-image'];
                } else {
                    $imageName = "";
                }
                Admin::where('id', Auth::guard('admin')->user()->id)->update([
                    'first_name' => $updateDetails['first_name'],
                    'last_name' => $updateDetails['last_name'],
                    'phone' => $updateDetails['phone'],
                    'image' => $imageName
                ]);
                Vendor::where('id', Auth::guard('admin')->user()->vendor_id)->update([
                    'first_name' => $updateDetails['first_name'],
                    'last_name' => $updateDetails['last_name'],
                    'city' => $updateDetails['city'],
                    'state' => $updateDetails['state'],
                    'country' => $updateDetails['country'],
                    'phone' => $updateDetails['phone'],
                    'pincode' => $updateDetails['pincode']
                    // 'image' => $updateDetails['image'],
                ]);
                return redirect()->back()->with('success_message', 'Cập Nhật Thành Công');
            }
            $vendorDetail = Vendor::where('id', Auth::guard('admin')->user()->vendor_id)->first()->toArray();

            // dd($vendorDetail);
        } else if ($slug == "business") {
            Session::put('page','update-business-details');
            if ($request->isMethod('post')) {
                $updateDetails = $request->all();
                // dd($updateDetails);
                $rules = [
                    'shop_name' => 'required|min:2',
                    'shop_name' => 'required|min:6',
                    'shop_mobile' => 'required|numeric|min:10',
                    'address_proof' => 'required',
                    // 'address_proof_image' =>  'required|image'
                ];
                $customMessages = [
                    'first_name.required' => 'Họ là bắt buộc',
                    'first_name.min' => 'Họ phải có ít nhất 2 ký tự',
                    'last_name.required' => 'Tên là bắt buộc',
                    'last_name.min' => 'Tên phải có ít nhất 6 ký tự',
                    'shop_mobile.required' => 'Số điện thoại là bắt buộc',
                    'shop_mobile.numeric' => 'Số điện thoại không hợp lệ',
                    'shop_mobile.min' => 'Số điện thoại phải 10 ký tự đúng định dạng',
                    'address_proof.required' => 'Địa Chỉ là bắt buộc',
                    // 'address_proof_image.required' => 'Ảnh là bắt buộc',
                    // 'address_proof_image.image' => 'Ảnh không hợp lê',

                    // 'mobile.regex' => 'Số điện thoại phải đúng định dạng'
                ];

                $this->validate($request, $rules, $customMessages);

                //update Image
                if ($request->hasFile('image')) {
                    $avatar = $request->file('image');
                    if ($avatar->isValid()) {
                        //Lấy ảnh từ extension
                        $extension = $avatar->getClientOriginalExtension();
                        //Xuat ra anh moi
                        $imageName = rand(111, 99999) . '.' . $extension;
                        $imagePath = 'admin/images/proofs/' . $imageName;
                        Image::make($avatar)->save($imagePath);
                    };
                } else if (!empty($updateDetails['current-address_proof'])) {
                    $imageName = $updateDetails['current-address_proof'];
                } else {
                    $imageName = "";
                }
                // echo  Auth::guard('admin')->user()->vendor_id; die;
                $vendorCount = VendorsBusinessDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->count();
                if ($vendorCount > 0) {
                    VendorsBusinessDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->update([
                        'shop_name' => $updateDetails['shop_name'], 'shop_address' => $updateDetails['shop_address'],
                        'shop_city' => $updateDetails['shop_city'], 'shop_state' => $updateDetails['shop_state'],
                        'shop_country' => $updateDetails['shop_country'], 'shop_pincode' => $updateDetails['shop_pincode'],
                        'shop_mobile' => $updateDetails['shop_mobile'], 'shop_website' => $updateDetails['shop_website'],
                        'shop_email' => $updateDetails['shop_email'], 'business_license_number' => $updateDetails['business_license_number'],
                        'pan_number' => $updateDetails['pan_number'], 'gst_number' => $updateDetails['gst_number'],
                        'address_proof' => $updateDetails['address_proof'], 'address_proof_image' => $imageName,
                    ]);
                } else {
                    VendorsBusinessDetail::insert([
                        'vendor_id'=> Auth::guard('admin')->user()->vendor_id,
                        'shop_name' => $updateDetails['shop_name'], 'shop_address' => $updateDetails['shop_address'],
                        'shop_city' => $updateDetails['shop_city'], 'shop_state' => $updateDetails['shop_state'],
                        'shop_country' => $updateDetails['shop_country'], 'shop_pincode' => $updateDetails['shop_pincode'],
                        'shop_mobile' => $updateDetails['shop_mobile'], 'shop_website' => $updateDetails['shop_website'],
                        'shop_email' => $updateDetails['shop_email'], 'business_license_number' => $updateDetails['business_license_number'],
                        'pan_number' => $updateDetails['pan_number'], 'gst_number' => $updateDetails['gst_number'],
                        'address_proof' => $updateDetails['address_proof'], 'address_proof_image' => $imageName,
                    ]);

                }


                return redirect()->back()->with('success_message', 'Cập Nhật Thành Công');
            }
            $vendorCount = VendorsBusinessDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->count();
            if ($vendorCount > 0) {
                $vendorDetail = VendorsBusinessDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->first()->toArray();
            } else {
                $vendorDetail = array();
            }
            // dd($vendorDetail);
        } else if ($slug == "bank") {
            Session::put('page','update-bank-details');
            if ($request->isMethod('post')) {
                $updateDetails = $request->all();
                // dd($updateDetails);
                $rules = [
                    'account_holder_name' => 'required|min:8',
                    'bank_name' => 'required|min:3',
                    'account_number' => 'required|numeric|min:10',
                    'bank_ifsc_code' => 'required'
                ];
                $customMessages = [
                    'account_holder_name.required' => 'Tên tài khoản là bắt buộc',
                    'account_holder_name.min' => 'Tên tài khoản phải có ít nhất 8 ký tự',
                    'bank_name.required' => 'Tên ngân hàng là bắt buộc',
                    'bank_name.min' => 'Tên ngân hàng phải có ít nhất 3 ký tự',
                    'account_number.required' => 'Số tài khoản là bắt buộc',
                    'account_number.numeric' => 'Số tài khoản không hợp lệ',
                    'account_number.min' => 'Số tài khoản phải 10 ký tự đúng định dạng',
                    'bank_ifsc_code.required' => 'Mã Code là bắt buộc',
                    // 'mobile.regex' => 'Số điện thoại phải đúng định dạng'
                ];

                $this->validate($request, $rules, $customMessages);
                $vendorCount = VendorsBankDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->count();
                if ($vendorCount > 0) {
                    VendorsBankDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->update([
                        'account_holder_name' => $updateDetails['account_holder_name'], 'bank_name' => $updateDetails['bank_name'],
                        'account_number' => $updateDetails['account_number'], 'bank_ifsc_code' => $updateDetails['bank_ifsc_code'],
                    ]);
                } else {
                    VendorsBankDetail::insert([
                        'vendor_id'=> Auth::guard('admin')->user()->vendor_id,
                        'account_holder_name' => $updateDetails['account_holder_name'], 'bank_name' => $updateDetails['bank_name'],
                        'account_number' => $updateDetails['account_number'], 'bank_ifsc_code' => $updateDetails['bank_ifsc_code'],
                    ]);
                }
                return redirect()->back()->with('success_message', 'Cập Nhật Thành Công');
            }
            // $vendorDetail = VendorsBankDetail::where('id', Auth::guard('admin')->user()->vendor_id)->first();
            // dd($vendorDetail);
            $vendorCount = VendorsBankDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->count();
            if ($vendorCount > 0) {
                $vendorDetail = VendorsBankDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->first()->toArray();
            } else {
                $vendorDetail = array();
            }
        }
        $countries = Countries::where('status', 1)->get()->toArray();
        return view('admin.setting.update_vendor_details')->with(compact('slug', 'vendorDetail', 'countries'));
    }
}
