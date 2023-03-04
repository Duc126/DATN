<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banners::get()->toArray();
        // dd($banner);die;
        return view('admin/banners/banners')->with(compact('banners'));
    }
    public function updateStatusBanner(Request $request)
    { {
            if ($request->ajax()) {
                $data = $request->all();
                if ($data['status'] == "Active") {
                    $status = 0;
                } else {
                    $status = 1;
                }
                Banners::where('id', $data['banner_id'])->update(['status' => $status]);

                return response()->json(['status' => $status, 'banner_id' => $data['banner_id']]);
            }
        }
    }
    public function deleteBanner($id)
    {
        $bannerImage = Banners::where('id', $id)->first();

        $banner_image_path = 'front/images/banner_images/';
        if (file_exists($banner_image_path . $bannerImage->image)) {
            unlink($banner_image_path . $bannerImage->image);
        }
        Banners::where('id', $id)->delete();
        $message = "Đã Xóa Thành Công!";
        return redirect()->back()->with('success_message', $message);
    }
    public function addEditBanner(Request $request, $id = null)
    {
        if ($id == "") {
            $title = "Thêm Sản Phẩm";
            $banner = new Banners;
            $message = "Thêm sản phẩm thành công!";
        } else {
            $title = "Cập Nhật Sản Phẩm";
            $banner = Banners::find($id);
            $message = "Cập Nhật sản phẩm thành công!";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            // $rules = [
            //     'link' => 'required',
            //     'title' => 'required',
            //     'alt' => 'required',

            // ];
            // $customMessages = [
            //     'link.required' => 'link  là bắt buộc',
            //     'title.required' => 'title là bắt buộc',
            //     'alt.required' => 'alt là bắt buộc',
            // ];
            // $this->validate($request, $rules, $customMessages);
            if($data['type']=="Slider"){
                $width = "1920";
                $height = "720";
            } else if($data['type'] == "Fix"){
                $width = "1920";
                $height = "450";
            }
            if ($request->hasFile('image')) {
                $image_banner = $request->file('image');
                if ($image_banner->isValid()) {
                    //Lấy ảnh từ extension
                    $extension = $image_banner->getClientOriginalExtension();
                    //Xuat ra anh moi
                    $imageName = rand(111, 99999) . '.' . $extension;
                    $imagePath = 'front/images/banner_images/' . $imageName;
                    Image::make($image_banner)->resize($width, $height)->save($imagePath);
                    $banner->image = $imageName;
                };
            }
            $banner->type = $data['type'];
            $banner->link = $data['link'];
            $banner->title = $data['title'];
            $banner->alt = $data['alt'];
            $banner->status = 1;
            $banner->save();

            return redirect('admin/banner')->with('success_message', $message);
        }
        return view('admin/banners/add-edit-banner')->with(compact('title', 'banner'));
    }
}
