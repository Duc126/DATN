<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SectionController extends Controller
{
    public function index(){
        $sections = Section::get()->toArray();
        // dd($sections);
        return view('admin.sections.sections')->with(compact('sections'));
    }
    public function updateStatusSection(Request $request){
        if($request->ajax())
        {
            $data = $request->all();
            if($data['status']=="Active"){
                $status = 0;
            }
            else  {
                $status = 1;
            }
            Section::where('id', $data['section_id'])->update(['status' => $status]);
            return response()->json(['status'=> $status, 'section_id'=> $data['section_id']]);
        }
    }
    public function deleteSection($id){
        Section::where('id',$id)->delete();
        $message = "Đã Xóa Thành Công!";
        return redirect()->back()->with('success_message', $message);
    }

    public function addEditSection(Request $request, $id=null){
        // Session::put('page', 'sections);
        if($id==""){
            $title = "Thêm Sản Phẩm";
            $section = new Section;
            $message = "Thêm sản phẩm thành công!";
        }
        else{
            $title = "Cập Nhật Sản Phẩm";
            $section = Section::find($id);
            $message = "Cập Nhật sản phẩm thành công!";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'section_name' => 'min:2',
            ];
            $customMessages = [
                // 'n' => 'Tên sản phẩm là bắt buộc',
                'section_name.min' => 'Tên sản phẩm phải có ít nhất 2 ký tự',
            ];
            $this->validate($request, $rules, $customMessages);

            $section->name = $data['section_name'];
            $section->status = 1;
            $section->save();
            // dd($section);
            return redirect('admin/sections')->with('success_message' ,$message);
        }
        return view('admin/sections/add-edit-section')->with(compact('title', 'section'));
    }
}
