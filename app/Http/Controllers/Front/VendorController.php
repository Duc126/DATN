<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{
    public function loginRegister()
    {
        return view('front.vendors.login-register');
    }
    public function vendorRegister(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            $rules = [
                "first_name" => "required",
                "last_name" => "required",
                "email" => "required|email|unique:admins|unique:vendors",
                "phone" => "required|min:10|numeric|unique:admins|unique:vendors",
                "accept" => "required"

            ];
            $customMessages = [
                "first_name.required" => "Tên Là bắt buộc",
                "last_name.required" => "Họ Là bắt buộc",
                "email.required" => "Email Là bắt buộc",
                "email.unique" => "Email đã tồn tại",
                "phone.unique" => "Số điện thoai đã tồn tại",
                "phone.min" => "Số điện thoai ít nhất là 10 số",
                "phone.numeric" => "Điện thoại phải là một số",
                "phone.required" => "Số điện thoai Là bắt buộc",
                "accept.required" => "Vui lòng chấp nhận trước điều khoản trước khi đăng ký "
            ];
            $validator = Validator::make($data, $rules, $customMessages);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }

            DB::beginTransaction();
            //Create vendor account

            //Insert the vendor details in vendor table
            $vendor = new Vendor;
            $vendor->first_name = $data['first_name'];
            $vendor->last_name = $data['last_name'];
            $vendor->phone = $data['phone'];
            $vendor->email = $data['email'];
            $vendor->status = 0;
            $vendor->save();

            //Set default timezone
            date_default_timezone_set("Asia/Kolkata");
            $vendor->created_at = date("Y-m-d H:i:s");
            $vendor->updated_at = date("Y-m-d H:i:s");
            $vendor->save();



            $vendor_id = DB::getPdo()->lastInsertId();

            //Insert the vendor details in admin table
            $admin = new Admin;
            $admin->type = 'vendor';
            $admin->vendor_id = $vendor_id;
            $admin->first_name = $data['first_name'];
            $admin->last_name = $data['last_name'];
            $admin->phone = $data['phone'];
            $admin->email = $data['email'];
            $admin->password = bcrypt($data['password']);
            $admin->status = 0;
            $admin->save();
            //Set default timezone
            date_default_timezone_set("Asia/Kolkata");
            $admin->created_at = date("Y-m-d H:i:s");
            $admin->updated_at = date("Y-m-d H:i:s");
            $admin->save();


            //Send Confirm Email
            $email = $data['email'];
            $messageData = [
                'email' => $data['email'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'code' => base64_encode($data['email']),

            ];

            Mail::send('emails.vendor_confirmation', $messageData, function ($message) use ($email) {
                $message->to($email)->subject('Confirm your vendor Account');
            });
            DB::commit();

            //Redirect back
            $message = "Cảm ơn bạn đã đăng ký làm nhà cung cấp. Chúng tôi sẽ xác nhận qua email sau khi tài khoản của bạn được phê duyệt.";
            return redirect()->back()->with('success_message', $message);
        }
    }
    public function confirmVendor($email)
    {
        $email = base64_decode($email);

        //Check vendor email exits
        $vendorCount = Vendor::where('email', $email)->count();
        if ($vendorCount > 0) {
            $vendorDetails = Vendor::where('email', $email)->first();
            if ($vendorDetails->confirm == "Yes") {
                $message = "Your vendor account is already confirmed.You can login!!!!!!";
                return redirect('vendor/login-register')->with('error_message', $message);
            } else {
                Admin::where('email', $email)->update(['confirm' => 'Yes']);
                Vendor::where('email', $email)->update(['confirm' => 'Yes']);

                //send register email
                $messageData = [
                    'email' => $email,
                    'first_name' => $vendorDetails->first_name,
                    'last_name' => $vendorDetails->last_name,
                    'phone' => $vendorDetails->phone,

                ];

                Mail::send('emails.vendor_confirmation', $messageData, function ($message) use ($email) {
                    $message->to($email)->subject('Your vendor Account Confirm');
                });
                // redirect to vendor đăng nhập in đăng xuất page success message
                $message = "Email nhà cung cấp Acccout của bạn đã được xác nhận. Bạn có thể đăng nhập và thêm cá nhân của bạn";
                return redirect('vendor/login-register')->with('success_message', $message);
            }
        } else {
            abort(404);
        }
    }
}
