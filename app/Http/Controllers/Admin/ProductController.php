<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['section' => function ($query) {
            $query->select('id', 'name');
        }, 'category' => function ($query) {
            $query->select('id', 'category_name');
        }])->get()->toArray();
        // dd($products);
        return view('admin.products.products')->with(compact('products'));
    }

    public function updateStatusProduct(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            Product::where('id', $data['product_id'])->update(['status' => $status]);

            return response()->json(['status' => $status, 'product_id' => $data['product_id']]);
        }
    }

    public function deleteProduct($id)
    {
        Product::where('id', $id)->delete();
        $message = "Đã Xóa Thành Công!";
        return redirect()->back()->with('success_message', $message);
    }
    public function addEditProduct(Request $request, $id = null)
    {
        if ($id == "") {
            $title = "Thêm Sản Phẩm";
            $product = new Product;
            $message = "Thêm sản phẩm thành công";
        } else {
            $title = "Chỉnh sửa sản phẩm";
            $product = Product::find($id);
            // dd($product);
            $message = "Cập nhật sản phẩm thành công";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            $rules = [
                // 'product_name' => 'required|regex:/^[\pL\s-]+$/u',
                'product_name' => 'required',
                'category_id' => 'required',
                'product_code' => 'required|regex:/^\w+$/',
                'product_price' => 'required|numeric',
                'product_color' => 'required|regex:/^[\pL\s-]+$/u',

            ];
            $customMessages = [
                'product_name.required' => 'Tên là bắt buộc',
                'product_name.regex' => 'Tên đúng định dạng',
                'category_id.required' => 'category là bắt buộc',
                'product_code.required' => ' Code là bắt buộc',
                'product_code.regex' => 'Code phải đúng định dạng',
                'product_price' => 'Giá là bắt buộc',
                'product_color.required' => 'Màu là bắt buộc',
                'product_color.regex' => 'Màu phải đúng định dạng',
            ];
            $this->validate($request, $rules, $customMessages);

            //Upload Image  resize small: 250x250, medium 500x500, large: 1000x1000
            if ($request->hasFile('product_image')) {
                $imageProduct = $request->file('product_image');
                if ($imageProduct->isValid()) {
                    //Upload Image after Resize
                    $extension = $imageProduct->getClientOriginalExtension();
                    $imageName = rand(111, 99999) . '.' . $extension;
                    $largeImagePath = 'front/images/product_images/large/' . $imageName;
                    $mediumImagePath = 'front/images/product_images/medium/' . $imageName;
                    $smallImagePath = 'front/images/product_images/small/' . $imageName;

                    Image::make($imageProduct)->resize(1000, 1000)->save($largeImagePath);
                    Image::make($imageProduct)->resize(500, 500)->save($mediumImagePath);
                    Image::make($imageProduct)->resize(250, 250)->save($smallImagePath);

                    $product->product_image = $imageName;
                }
            };

            //Upload Product video
            if ($request->hasFile('product_video')) {
                $videoProduct = $request->file('product_video');
                if ($videoProduct->isValid()) {
                    //Upload video
                    $extension = $videoProduct->getClientOriginalExtension();
                    $videoName = rand(111, 99999) . '.' . $extension;
                    $videoPath = 'front/videos/product_videos/';
                    $videoProduct->move($videoPath, $videoName);
                    //Insert video name Product
                    $product->product_video = $videoName;
                }
            }
            // //save product detail

            $categoryDetails = Category::find($data['category_id']);
            // dd($categoryDetails);
            $product->section_id = $categoryDetails['section_id'];
            $product->category_id = $data['category_id'];
            $product->brand_id = $data['brand_id'];

            $adminType = Auth::guard('admin')->user()->type;
            $vendor_id = Auth::guard('admin')->user()->vendor_id;
            $admin_id = Auth::guard('admin')->user()->id;
            $product->admin_type = $adminType;
            $product->admin_id  = $admin_id;
            if ($adminType == "vendor") {
                $product->vendor_id = $vendor_id;
            } else {
                $product->vendor_id = 0;
            }

            $product->product_name = $data['product_name'];
            $product->product_code = $data['product_code'];
            $product->product_color = $data['product_color'];
            $product->product_price = $data['product_price'];
            $product->product_discount = $data['product_discount'];
            $product->product_weight = $data['product_weight'];
            $product->description = $data['description'];
            $product->meta_title = $data['meta_title'];
            $product->meta_description = $data['meta_description'];
            $product->meta_keywords = $data['meta_keywords'];

            if (!empty($data['is_featured'])) {
                $product->is_featured = $data['is_featured'];
            } else {
                $product->is_featured = "No";
            }
            $product->status = 1;
            $product->save();
            return redirect('admin/products')->with('success_message', $message);
        }

        $categories = Section::with('categories')->get()->toArray();

        $brands = Brand::where('status', 1)->get()->toArray();
        // dd($categories);
        return view('admin/products/add-edit-product')->with(compact('title', 'product', 'categories', 'brands'));
    }


    public function deleteProductImage($id)
    {
        // Category::where('id',$id)->delete();
        $productImage = Product::select('product_image')->where('id', $id)->first();
        //get Product Image
        $small_image_path = 'front/images/product_images/small/';
        $medium_image_path = 'front/images/product_images/medium/';
        $large_image_path = 'front/images/product_images/large/';

        //Delete Product small Image
        if (file_exists($small_image_path . $productImage->product_image)) {
            unlink($small_image_path . $productImage->product_image);
        }
        //Delete Product medium Image
        if (file_exists($medium_image_path . $productImage->product_image)) {
            unlink($medium_image_path . $productImage->product_image);
        }
        //Delete Product large Image
        if (file_exists($large_image_path . $productImage->product_image)) {
            unlink($large_image_path . $productImage->product_image);
        }

        // Delete Product image

        Product::where('id', $id)->update(['product_image' => '']);
        $message = "Đã Xóa Ảnh Thành Công!";
        return redirect()->back()->with('success_message', $message);
    }

    public function deleteProductVideo($id)
    {
        $productVideo = Product::select('product_video')->where('id', $id)->first();

        //get Product Video
        $product_video_path = 'front/videos/product_videos/';

        //Delete Product small Image
        if (file_exists($product_video_path . $productVideo->product_video)) {
            unlink($product_video_path . $productVideo->product_video);
        }

        // Delete Product Video
        Product::where('id', $id)->update(['product_video' => '']);
        $message = "Đã Xóa Video Thành Công!";
        return redirect()->back()->with('success_message', $message);
    }
}
