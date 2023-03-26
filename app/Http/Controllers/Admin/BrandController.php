<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{
    public function index(){
        Session::put('page', 'brands');

        $brands = Brand::get()->toArray();
        // dd($brands);
        return view('admin.brands.brands')->with(compact('brands'));
    }
    public function updateStatusBrand(Request $request){
        if($request->ajax())
        {
            $data = $request->all();
            if($data['status']=="Active"){
                $status = 0;
            }
            else  {
                $status = 1;
            }
            Brand::where('id', $data['brand_id'])->update(['status' => $status]);
            return response()->json(['status'=> $status, 'brand_id'=> $data['brand_id']]);
        }
    }
    public function deleteBrand($id){
        Brand::where('id',$id)->delete();
        $message = "Đã Xóa Thành Công!";
        return redirect()->back()->with('success_message', $message);
    }

    public function addEditBrand(Request $request, $id=null){
        // Session::put('page', 'sections);
        if($id==""){
            $title = "Thêm Sản Phẩm";
            $brand = new Brand;
            $message = "Thêm sản phẩm thành công!";
        }
        else{
            $title = "Cập Nhật Sản Phẩm";
            $brand = Brand::find($id);
            $message = "Cập Nhật sản phẩm thành công!";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'brand_name' => 'required|min:2',
            ];
            $customMessages = [
                'brand_name.required' => 'Tên thuơng hiệu là bắt buộc',
                'brand_name.min' => 'Tên sản phẩm phải có ít nhất 2 ký tự',
            ];
            $this->validate($request, $rules, $customMessages);

            $brand->name = $data['brand_name'];
            $brand->status = 1;
            $brand->save();
            // dd($section);
            return redirect('admin/brands')->with('success_message' ,$message);
        }
        return view('admin/brands/add-edit-brand')->with(compact('title', 'brand'));
    }
}
