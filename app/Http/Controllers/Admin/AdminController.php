<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function dashboard()
    {
        Session::put('page', 'dashboard');
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
        Session::put('page', 'update-password');

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

    public function updateDetails(Request $request)
    {
        Session::put('page', 'update-details');

        if ($request->isMethod('post')) {
            $updateDetails = $request->all();
            $rules = [
                'first_name' => 'required|min:2',
                'last_name' => 'required|min:6',
                'phone' => 'required|numeric|min:10',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
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
                    $imagePath = 'admin/images/photos/'. $imageName;
                    Image::make($avatar)->save($imagePath);
                };
            }else if (!empty($updateDetails['current-image'])) {
                $imageName = $updateDetails['current-image'];
            } else {
                $imageName = "";
            }
            // dd($updateDetails);
            Admin::where('id', Auth::guard('admin')->user()->id)->update([
                'first_name' => $updateDetails['first_name'],    'last_name' => $updateDetails['last_name'],
                'phone' => $updateDetails['phone'], 'image' => $imageName
            ]);
            return redirect()->back()->with('success_message', 'Cập Nhật Thành Công');
        }
        return view('admin.setting.update-details');
    }
}
