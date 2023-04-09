<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function index()
    {
        Session::put('page', 'categories');
        $categories = Category::with(['section', 'parentcategory'])->get()->toArray();
        return view('admin.categories.categories')->with(compact('categories'));
    }
    public function updateCategoryStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            Category::where('id', $data['category_id'])->update(['status' => $status]);

            return response()->json(['status' => $status, 'category_id' => $data['category_id']]);
        }
    }

    public function addEditCategory(Request $request, $id = null)
    {
        Session::put('page', 'categories');
        if ($id == "") {
            $title = "Thêm Sản Phẩm";
            $category = new Category;
            $getCategories = array();
            $message = "Thêm sản phẩm thành công!";
        } else {
            $title = "Cập Nhật Sản Phẩm";
            $category = Category::find($id);
            $getCategories = Category::with('subcategories')->where(['parent_id' => 0, 'section_id' => $category['section_id']])->get()->toArray();
            $message = "Cập Nhật sản phẩm thành công!";
        }
        // dd($getCategories);

        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            $rules = [
                'category_name' => 'required',
                'section_id' => 'required',
                'url' => 'required',

            ];
            $customMessages = [
                'category_name.required' => 'Tên  là bắt buộc',
                'section_id.required' => 'section là bắt buộc',
                'url.required' => 'url là bắt buộc',
            ];
            $this->validate($request, $rules, $customMessages);
            // if($data['description'] == ""){
            //     $data['description'] = "";
            // }
            if ($data['category_discount'] == "") {
                $data['category_discount'] = 0;
            }
            if ($request->hasFile('category_image')) {
                $image_category = $request->file('category_image');
                if ($image_category->isValid()) {
                    //Lấy ảnh từ extension
                    $extension = $image_category->getClientOriginalExtension();
                    //Xuat ra anh moi
                    $imageName = rand(111, 99999) . '.' . $extension;
                    $imagePath = 'front/images/category_images/' . $imageName;
                    Image::make($image_category)->save($imagePath);
                    $category->category_image = $imageName;
                };
            } else {
                $category->category_image = "";
            }
            $category->section_id = $data['section_id'];
            $category->parent_id = $data['parent_id'];
            $category->category_name = $data['category_name'];
            $category->category_discount = $data['category_discount'];
            $category->description = $data['description'];
            $category->url = $data['url'];
            $category->meta_title = $data['meta_title'];
            $category->meta_description = $data['meta_description'];
            $category->meta_keywords = $data['meta_keywords'];
            $category->status = 1;
            $category->save();

            // dd($category);
            return redirect('admin/categories')->with('success_message', $message);
        }
        //get all value section
        $fullSection = Section::get()->toArray();
        return view('admin/categories/add-edit-category')->with(compact('title', 'category', 'fullSection', 'getCategories'));
    }

    public function appendCategories(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            $getCategories = Category::with('subcategories')->where([
                'parent_id' => 0,
                'section_id' => $data['section_id']
            ])->get()->toArray();
            // dd($getCategories);
            return view('admin/categories/append-category')->with(compact('getCategories'));
        }
    }

    public function deleteCategory($id){
        Category::where('id',$id)->delete();
        $message = "Đã Xóa Thành Công!";
        return redirect()->back()->with('success_message', $message);
    }

    public function deleteCategoryImage($id){
        // Category::where('id',$id)->delete();
        $categoryImage = Category::select('category_image')->where('id', $id)->first();

        $category_image_path ='front/images/category_images/';
        if(file_exists($category_image_path.$categoryImage->category_image)){
            unlink($category_image_path.$categoryImage->category_image);
        }

        // Delete Categort image

        Category::where('id',$id)->update(['category_image' => '']);
        $message = "Đã Xóa Thành Công!";
        return redirect()->back()->with('success_message', $message);
    }
}
