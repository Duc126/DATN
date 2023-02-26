<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductsImage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    public function addImageProduct(Request $request, $id)
    {
        $imageProduct = Product::select('id', 'product_name', 'product_code', 'product_color', 'product_price', 'product_image')
            ->with('images')->find($id);
        // dd($product);
        if ($request->isMethod('post')) {
            $data = $request->all();
            if ($request->hasFile('images')) {
                $images = $request->file('images');
                // dd($images);
                foreach ($images as $key => $image) {
                    //generate temp image
                    $image_tmp = Image::make($image);
                    //get image name
                    $image_name = $image->getClientOriginalName();
                    //get image extension
                    $extension = $image->getClientOriginalExtension();
                    //generate new image name
                    $imageName = $image_name . rand(111, 99999) . '.' . $extension;
                    $largeImagePath = 'front/images/product_images/large/' . $imageName;
                    $mediumImagePath = 'front/images/product_images/medium/' . $imageName;
                    $smallImagePath = 'front/images/product_images/small/' . $imageName;

                    Image::make($image_tmp)->resize(1000, 1000)->save($largeImagePath);
                    Image::make($image_tmp)->resize(500, 500)->save($mediumImagePath);
                    Image::make($image_tmp)->resize(250, 250)->save($smallImagePath);
                    $image = new ProductsImage;
                    $image->image = $imageName;
                    $image->product_id = $id;
                    $image->status = 1;
                    $image->save();
                }
            };
            return redirect()->back()->with('success_message', 'Đã thêm hình ảnh thành công');
        }
        return view('admin/images/add-images-product')->with(compact('imageProduct'));
    }

    public function updateStatusImagesProduct(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            ProductsImage::where('id', $data['image_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'image_id' => $data['image_id']]);
        }
    }
    public function deleteImagesProduct($id)
    {
        // Category::where('id',$id)->delete();
        $productImage = ProductsImage::select('image')->where('id', $id)->first();
        //get Product Image
        $small_image_path = 'front/images/product_images/small/';
        $medium_image_path = 'front/images/product_images/medium/';
        $large_image_path = 'front/images/product_images/large/';

        //Delete Product small Image
        if (file_exists($small_image_path . $productImage->image)) {
            unlink($small_image_path . $productImage->image);
        }
        //Delete Product medium Image
        if (file_exists($medium_image_path . $productImage->image)) {
            unlink($medium_image_path . $productImage->image);
        }
        //Delete Product large Image
        if (file_exists($large_image_path . $productImage->image)) {
            unlink($large_image_path . $productImage->image);
        }

        // Delete Product image

        ProductsImage::where('id', $id)->delete();
        $message = "Đã Xóa Ảnh Thành Công!";
        return redirect()->back()->with('success_message', $message);
    }
}
