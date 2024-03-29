<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductsFilter;
use App\Models\Section;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        Session::put('page', 'products');

        $adminType = Auth::guard('admin')->user()->type;
        $vendor_id = Auth::guard('admin')->user()->vendor_id;
        // dd($vendor_id);

        if ($adminType == "vendor") {
            $vendorStatus = Auth::guard('admin')->user()->status;
            if ($vendorStatus == 0) {
                return redirect("admin/update-vendor-details/personal")->with('error_message', 'Tài khoản nhà cung cấp của bạn chưa được phê duyệt.
                 Vui lòng đảm bảo điền thông tin cá nhân, doanh nghiệp và ngân hàng hợp lệ của bạn');
            }
        }
        $products = Product::with(['section' => function ($query) {
            $query->select('id', 'name');
        }, 'category' => function ($query) {
            $query->select('id', 'category_name');
        }, 'attributes' =>function ($query) {
            $query->select('product_id', 'stock');
    }]);
// dd($products);

        if ($adminType == "vendor") {
            $products = $products->where('vendor_id', $vendor_id);
// dd($products->where('vendor_id', $vendor_id));
        }
        $products = $products->get()->toArray();
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
        $message = __('messages.product.delete_success');
        return redirect()->back()->with('success_message', $message);
    }
    public function addEditProduct(Request $request, $id = null)
    {
        Session::put('page', 'products');

        if ($id == "") {
            $title = __('messages.product.add-product');
            $product = new Product;
            $message = __('messages.product.add-product-success');
        } else {
            $title = __('messages.product.update-product');
            $product = Product::find($id);
            // dd($product);
            $message = __('messages.product.update-product-success');
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            $rules = [
                // 'product_name' => 'required|regex:/^[\pL\s-]+$/u',
                'product_name' => 'required',
                'category_id' => 'required',
                'product_code' => 'required',
                'product_price' => 'required|numeric',
                'product_color' => 'required',
                // 'product_color' => 'required|regex:/^[\pL\s-]+$/u',


            ];
            $customMessages = [
                'product_name.required' => __('messages.product.product_name_r'),
                'category_id.required' => __('messages.product.category_r'),
                'product_code.required' => __('messages.product.product_code_r'),
                // 'product_code.regex' => 'Code phải đúng định dạng',
                'product_price.required' => __('messages.product.product_price_r'),
                'product_color.required' => __('messages.product.product_color_r'),
                // 'product_color.regex' => 'Màu phải đúng định dạng',
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
            $product->group_code = $data['group_code'];

            $productFilters = ProductsFilter::productFilters();
            foreach ($productFilters as $filter) {
                $filterAvailable = ProductsFilter::filterAvailable($filter['id'], $data['category_id']);
                if ($filterAvailable == "Yes") {
                    if (isset($filter['filter_column']) && $data[$filter['filter_column']]) {
                        $product->{$filter['filter_column']} = $data[$filter['filter_column']];
                    }
                }
            }

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
            if (empty($data['product_discount'])) {
                $data['product_discount'] = 0;
            }
            if (empty($data['product_weight'])) {
                $data['product_weight'] = 0;
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

            if (!empty($data['is_bestseller'])) {
                $product->is_bestseller = $data['is_bestseller'];
            } else {
                $product->is_bestseller = "No";
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
        $message = __('messages.delete_image_success');
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
        $message = __('messages.delete_video_success');
        return redirect()->back()->with('success_message', $message);
    }
}
