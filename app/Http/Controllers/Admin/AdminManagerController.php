<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminManagerController extends Controller
{
    public function admins($type = null)
    {
        $admins = Admin::query();
        // dd($admins);
        if (!empty($type)) {
            $admin = $admins->where('type', $type);
            $title = "Danh Sách" . " " . ucfirst($type);
        } else {
            $title = "Tất Cả";
        }
        $admin = $admins->get()->toArray();
        // dd($admin);
        return view('admin/manager/list-manager')->with(compact('admin', 'title'));
    }

    public function viewVendor($id)
    {
        $vendor = Admin::with('vendorPersonal', 'vendorBusiness', 'vendorBank')->where('id', $id)->first();
        $vendor = json_decode(json_encode($vendor), true);

        // dd($vendor);
        return view('admin/manager/view-vendor')->with(compact('vendor'));
    }
    public function updateStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            Admin::where('id', $data['admin_id'])->update(['status' => $status]);
            $adminDetails = Admin::where('id', $data['admin_id'])->first()->toArray();
            if ($adminDetails['type'] == "vendor" && $status == 1) {
                Vendor::where('id', $adminDetails['vendor_id'])->update(['status' => $status]);

                //send approval email
                $email = $adminDetails['email'];
                $messageData = [
                    'email' => $adminDetails['email'],
                    'first_name' => $adminDetails['first_name'],
                    'last_name' => $adminDetails['last_name'],
                    'phone' => $adminDetails['phone'],

                ];
                Mail::send('emails.vendor_approved', $messageData, function ($message) use ($email) {
                    $message->to($email)->subject('Tài khoản nhà cung cấp được phê duyệt');
                });
            }


            return response()->json(['status' => $status, 'admin_id' => $data['admin_id']]);
        }
    }
}
