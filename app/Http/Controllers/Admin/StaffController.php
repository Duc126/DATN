<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StaffController extends Controller
{
    public function listStaff(){
        Session::put('page', 'staff');
        $staff = Staff::get()->toArray();
        // dd($staff);
        return view('admin.staff.list-staff')->with(compact('staff'));
    }
    public function updateStatusStaff(Request $request){
        if($request->ajax())
        {
            $data = $request->all();
            if($data['status']=="Active"){
                $status = 0;
            }
            else  {
                $status = 1;
            }
            Staff::where('id', $data['staff_id'])->update(['status' => $status]);
            return response()->json(['status'=> $status, 'staff_id'=> $data['staff_id']]);
        }
    }
    public function deleteStaff($id){
        Staff::where('id',$id)->delete();
        $message = "Đã Xóa Thành Công!";
        return redirect()->back()->with('success_message', $message);
    }

    public function addEditStaff(Request $request, $id=null){
        Session::put('page', 'staff');
        if($id==""){
            $title = "Thêm Sản Phẩm";
            $staff = new Staff;
            $message = "Thêm sản phẩm thành công!";
        }
        else{
            $title = "Cập Nhật Sản Phẩm";
            $staff = Staff::find($id);
            $message = "Cập Nhật sản phẩm thành công!";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'name' => 'min:2|required',
            ];
            $customMessages = [
                // 'n' => 'Tên sản phẩm là bắt buộc',
                'name.required' => 'Tên nhân viên không được để trống',

                'name.min' => 'Tên nhân viên phải có ít nhất 2 ký tự',
            ];
            $this->validate($request, $rules, $customMessages);

            $staff->name = $data['name'];
            $staff->phone = $data['phone'];
            $staff->address = $data['address'];
            $staff->status = 1;
            $staff->save();
            // dd($section);
            return redirect('admin/staff')->with('success_message' ,$message);
        }
        return view('admin/staff/add-edit-staff')->with(compact('title', 'staff'));
    }
}
