<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Countries;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function loginRegister()
    {
        return view('front.user.login-register');
    }
    public function userRegister(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required|string|max:100',
                    'phone' => 'required|numeric|digits:10',
                    'email' => 'required|string|email|unique:users',
                    'password' => 'required|min:6',
                    'accept' => 'required',
                ],
                [
                    "name.required" => "Tên Là bắt buộc",
                    "email.required" => "Email Là bắt buộc",
                    "email.unique" => "Email đã tồn tại",
                    "phone.unique" => "Số điện thoai đã tồn tại",
                    "phone.digits" => "Số điện thoai ít nhất là 10 số",
                    "phone.numeric" => "Điện thoại phải là một số",
                    "phone.required" => "Số điện thoai Là bắt buộc",
                    'password.required' =>  "Mật Khẩu Là bắt buộc",
                    'password.min' =>  "Mật Khẩu Là ít nhất là 6 kí tự",
                    "accept.required" => "Vui lòng chấp nhận trước điều khoản trước khi đăng ký "
                ]
            );
            if ($validator->passes()) {
                //register
                $user = new User();
                $user->name = $data['name'];
                $user->phone = $data['phone'];
                $user->email = $data['email'];
                $user->password = bcrypt($data['password']);
                $user->status = 0;
                $user->save();

                //Activate the user only when user confirms his email account
                $email = $data['email'];
                $messageData = ['name' => $data['name'], 'email' => $data['email'], 'code' => base64_encode($data['email'])];

                Mail::send('emails.confirmation', $messageData, function ($message) use ($email) {
                    $message->to($email)->subject('Xác nhận tài khoản Trang web của bạn');
                });
                //REdirect back user with success message
                $redirectTo = url('user/login-register');
                return response()->json(['type' => 'success', 'url' => $redirectTo, 'message' => 'Vui lòng xác nhận email của bạn để kích hoạt tài khoản']);

                //Activate the user straight way without sending any confirmation email



                //send register email

                // $email = $data['email'];
                // $messageData = ['name' => $data['name'], 'phone' => $data['phone'], 'email' => $data['email']];
                // Mail::send('emails.register', $messageData, function ($message) use ($email) {
                //     $message->to($email)->subject('Chào Mừng Bạn Tới WebSite');
                // });
                // if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
                //     $redirectTo = url('cart');
                //     //Update User Cart with user
                //     if (!empty(Session::get('session_id'))) {
                //         $user_id = Auth::user()->id;
                //         $session_id = Session::get('session_id');
                //         Cart::where('session_id', $session_id)->update(['user_id' => $user_id]);
                //     }

                //     return response()->json(['type' => 'success', 'url' => $redirectTo]);
                // }
            } else {
                return response()->json(['type' => 'error', 'errors' => $validator->messages()]);
            }
        }
    }
    public function userAccount(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            // dd($data);
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required|string|max:100',
                    'city' => 'required|string|max:100',
                    'state' => 'required|string|max:100',
                    'address' => 'required|string|max:100',
                    'country' => 'required|string|max:100',
                    'phone' => 'required|numeric|digits:10',
                    'pincode' => 'required|digits:6',
                ],
                [
                    "name.required" => "Tên Là bắt buộc",
                    "city.required" => "Trường Thành Phô Là bắt buộc",
                    "state.required" => "Trường trạng thái Là bắt buộc",
                    "address.required" => "Trường địa chỉ Là bắt buộc",
                    "country.required" => "Trường quốc gia Là bắt buộc",
                    "phone.digits" => "Số điện thoai phải là 10 số",
                    "phone.numeric" => "Điện thoại phải là một số",
                    "phone.required" => "Số điện thoai Là bắt buộc",
                    "pincode.digits" => "Mã pin phải là 6 số",
                    "pincode.required" => "Mã pin Là bắt buộc",

                ]
            );
            if ($validator->passes()) {
                //Update User Details
                User::where('id', Auth::user()->id)->update([
                    'name' => $data['name'], 'phone' => $data['phone'], 'city' => $data['city'],
                    'state' => $data['state'], 'country' => $data['country'], 'pincode' => $data['pincode'], 'address' => $data['address']
                ]);

                //Redirect back user with success message
                $redirectTo = url('user/account');
                return response()->json(['type' => 'success', 'message' => 'Chi tiết liên hệ/thanh toán của bạn được cập nhật thành công']);
            } else {
                return response()->json(['type' => 'error', 'errors' => $validator->messages()]);
            }
        } else {
            $countries = Countries::where('status', 1)->get()->toArray();

            return view('front.user.user-account')->with(compact('countries'));
        }
    }
    public function updatePasswordUser(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            // dd($data);
            $validator = Validator::make(
                $request->all(),
                [
                    'current_password' => 'required',
                    'new_password' => 'required|min:6',
                    'confirm_password' => 'required|min:6|same:new_password',
                ],
                [
                    "current_password.required" => "Mật khẩu hiện tại Là bắt buộc",
                    "new_password.required" => "Trường Thành Phô Là bắt buộc",
                    "new_password.min" =>  "Mật Khẩu mới ít nhất phải 6 kí tự",
                    "confirm_password.required" => "Trường trạng thái Là bắt buộc",
                    "confirm_password.min" =>  "Mật Khẩu xác ít nhất phải 6 kí tự",
                    "confirm_password.same" =>  "Mật khẩu xác nhận và mật khẩu mới phải khớp nhau.",
                ]
            );
            if ($validator->passes()) {
                $current_password = $data['current_password'];
                $checkPassword = User::where('id', Auth::user()->id)->first();
                if (Hash::check($current_password, $checkPassword->password)) {
                    //update user current password
                    $user = User::find(Auth::user()->id);
                    $user->password = bcrypt($data['new_password']);
                    $user->save();
                    //Redirect back user with success message
                    return response()->json(['type' => 'success', 'message' => 'Cập nhật mật khẩu thành công!']);
                } else {
                    //Redirect back user with error message
                    return response()->json(['type' => 'incorrect', 'message' => 'Mật khẩu hiện tại của bạn không chính xác!']);
                }
            } else {
                return response()->json(['type' => 'error', 'errors' => $validator->messages()]);
            }

            //Redirect back user with success message
            return response()->json(['type' => 'success', 'message' => 'Chi tiết liên hệ/thanh toán của bạn được cập nhật thành công']);
        } else {
            $countries = Countries::where('status', 1)->get()->toArray();

            return view('front.user.user-account')->with(compact('countries'));
        }
    }
    public function forgotPassword(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            // echo "<pre>"; print_r($data);
            $validator = Validator::make(
                $request->all(),
                [
                    'email' => 'required|string|email|exists:users',
                ],
                [
                    "email.exists" => "Email không tồn tại!",
                ]
            );
            if ($validator->passes()) {
                // $userDetails = User::where('email', $data['email'])->first();
                //generate new password
                $new_password = Str::random(16);
                //update new password
                User::where('email', $data['email'])->update(['password' => bcrypt($new_password)]);
                //get user details
                $userDetails = User::where('email', $data['email'])->first()->toArray();

                //send email to user
                $email = $data['email'];
                $messageData = ['name' => $userDetails['name'], 'email' => $email, 'password' => $new_password];
                Mail::send('emails.user_forgot_password', $messageData, function ($message) use ($email) {
                    $message->to($email)->subject('Mật Khẩu Mới - Thương Mại Điện Tử');
                });
                //show success message
                return response()->json(['type' => 'success', 'message' => 'Mật khẩu mới được gửi đến email đăng ký của bạn.']);
            } else {
                return response()->json(['type' => 'error', 'errors' => $validator->messages()]);
            }
        } else {
            return view('front.user.forgot-password');
        }
    }

    public function userLogin(Request $request)
    {
        if ($request->Ajax()) {
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            $validator = Validator::make(
                $request->all(),
                [
                    'email' => 'required|string|email|exists:users',
                    'password' => 'required|min:6',
                ]
            );
            if ($validator->passes()) {
                if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {

                    if (Auth::user()->status == 0) {
                        Auth::logout();
                        return response()->json(['type' => 'inactive', 'message' => 'Tài khoản của bạn chưa được kích hoạt! Vui lòng xác nhận tài khoản của bạn để kích hoạt tài khoản của bạn!']);
                    }
                    //Update User Cart with user
                    if (!empty(Session::get('session_id'))) {
                        $user_id = Auth::user()->id;
                        $session_id = Session::get('session_id');
                        Cart::where('session_id', $session_id)->update(['user_id' => $user_id]);
                    }

                    $redirectTo = url('cart');
                    return response()->json(['type' => 'success', 'url' => $redirectTo]);
                } else {
                    return response()->json(['type' => 'incorrect', 'message' => 'Email hoặc mật khẩu không chính xác!']);
                }
            } else {
                return response()->json(['type' => 'error', 'errors' => $validator->messages()]);
            }
        }
    }

    public function userLogout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
    public function confirmAccountUser($code)
    {
        $email = base64_decode($code);
        $userCount = User::where('email', $email)->count();
        if ($userCount > 0) {
            $userDetails = User::where('email', $email)->first();
            if ($userDetails->status == 1) {
                //Redirect the user to login register page with error message
                return redirect('user/login-register')->with('error_message', 'Your account is already activated. You can login now.');
            } else {
                // echo $userDetails->status;die;

                User::where('email', $email)->update(['status' => 1]);
                //send welcome email

                $messageData = ['name' => $userDetails->name, 'phone' => $userDetails->phone, 'email' => $email];
                Mail::send('emails.register', $messageData, function ($message) use ($email) {
                    $message->to($email)->subject('Chào Mừng Bạn Tới WebSite');
                });
                //Redirect the user to login register page with success message
                return redirect('user/login-register')->with('success_message', 'Tài khoản của bạn đã được kích hoạt. Bạn có thể đăng nhập ngay bây giờ.');
            }
        } else {
            abort(404);
        }
    }
}
