<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminManagerController extends Controller
{
    public function admins($type=null){
        $admin =Admin::query();
        if(!empty($type)){
            $admin = $admin->where('type', $type);
            $title = "Danh Sách"." ".ucfirst($type);
        }else {
            $title="All Admins/Subadmins/Vendors";
        }
        $admin = $admin->get()->toArray();
        // dd($admin);
        return view('admin/manager/list-manager')->with(compact('admin', 'title'));
    }

    public function viewVendor($id){
        $vendor = Admin::with('vendorPersonal','vendorBusiness','vendorBank')->where('id', $id)->first();
        $vendor = json_decode(json_encode($vendor), true);
        // dd($vendor);
        return view('admin/manager/view-vendor')->with(compact('vendor'));

    }
    public function updateStatus(Request $request){
        if($request->ajax())
        {
            $data = $request->all();
            if($data['status']=="Active"){
                $status = 0;
            }
            else  {
                $status = 1;
            }
            Admin::where('id', $data['admin_id'])->update(['status' => $status]);
            return response()->json(['status'=> $status, 'admin_id'=> $data['admin_id']]);
        }
    }
}
