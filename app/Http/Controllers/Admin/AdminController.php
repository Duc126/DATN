<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\Print_;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //   dd($data);
            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required'
            ];
            $customMessages = [
                'email.required' => 'Địa chỉ Email là bắt buộc',
                'email.email' => 'Địa chỉ Email không hợp lệ',
                'password.required' => 'Mật Khẩu là bắt buộc',
            ];
            $this->validate($request, $rules, $customMessages);
            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 1])) {
                return redirect('admin/dashboard');
            } else {
                return redirect()->back()->with('error_message', 'Email Hoặc Mật Khẩu Không Hợp Lệ');
            }
        }
        return view('admin.login');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
    public function updatePassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $updatePass = $request->all();
            // dd($data);
            if (Hash::check($updatePass['current_password'], Auth::guard('admin')->user()->password)) {
                if ($updatePass['confirm_password'] == $updatePass['new_password']) {
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['password' => bcrypt($updatePass['new_password'])]);
                    return redirect()->back()->with('success_message', 'Cập Nhật Mật Khẩu Thành Công');
                } else {
                    return redirect()->back()->with('error_message', 'Cập Nhật Mật Khẩu Thất Bại');
                }
            } else {
                return redirect()->back()->with('error_message', 'Cập Nhật Mật Khẩu Thất Bại');
            }
        };
        $adminPass = Admin::where('email', Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin/setting/update-password')->with(compact('adminPass'));
    }
    public function checkPassword(Request $request)
    {
        $check = $request->all();
        // dd($check);
        if (Hash::check($check['current_password'], Auth::guard('admin')->user()->password)) {
            return "true";
        } else {
            return "false";
        };
    }

    public function updateDetails(Request $request){
        if ($request->isMethod('post')) {
            $updateDetails = $request->all();
            $rules = [
                'name' => 'required|min:6',
                'mobile' => 'required|numeric|min:10',
            ];
            $customMessages = [
                'name.required' => 'Tên là bắt buộc',
                'name.min' => 'Tên phải có ít nhất 6 ký tự',
                'mobile.required' => 'Số điện thoại là bắt buộc',
                'mobile.numeric' => 'Số điện thoại không hợp lệ',
                'mobile.min' => 'Số điện thoại phải 10 ký tự đúng định dạng',
                // 'mobile.regex' => 'Số điện thoại phải đúng định dạng'
            ];

            $this->validate($request, $rules, $customMessages);
            // dd($updateDetails);
            Admin::where('id', Auth::guard('admin')->user()->id)->update(['name' => $updateDetails['name'], 'mobile' => $updateDetails['mobile']]);
                    return redirect()->back()->with('success_message', 'Cập Nhật Thành Công');
        }
        return view('admin.setting.update-details');
    }
}
