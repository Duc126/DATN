<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SectionController extends Controller
{
    public function index(){
        Session::put('page', 'sections');

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
        Session::put('page', 'sections');
        if($id==""){
            $title = __('messages.add-section.add-section');
            $section = new Section;
            $message =  __('messages.add-section.add-section-success');
        }
        else{
            $title = __('messages.add-section.update-section');
            $section = Section::find($id);
            $message =  __('messages.add-section.update-section-success');
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'section_name' => 'required|min:2',
            ];
            $customMessages = [
                // 'n' => 'Tên sản phẩm là bắt buộc',
                'section_name.required' => __('messages.add-section.required'),
                'section_name.min' => __('messages.add-section.min'),
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
