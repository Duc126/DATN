<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
  public function index()
  {
    return view('admin.dashboard');
  }
  public function login(Request $request)
  {
    // echo $password =  Hash::make('admin123');die;
    if ($request->isMethod('post')) {
      $data = $request->all();
      //   dd($data);
      if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 1])) {
        return redirect('admin/dashboard');
      } else {
        return redirect()->back()->with('error_message', 'Invalid Email or Password');
      }
    }
    return view('admin.login');
  }
}
