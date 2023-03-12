<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductsAttributes;
use Illuminate\Http\Request;

class ProductAttributesController extends Controller
{
    public function addAttributesProduct(Request $request, $id)
    {
        $productAttributes = Product::select('id', 'product_name', 'product_code', 'product_color', 'product_price', 'product_image')
            ->with('attributes')->find($id);
        // $productAttributes = json_decode(json_encode($productAttributes), true);
        // dd($productAttributes);
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            foreach ($data['sku'] as $key => $value) {
                if (!empty($value)) {

                    $skuCount = ProductsAttributes::where('sku', $value)->count();
                    if ($skuCount > 0) {
                        return redirect()->back()->with('error_message', 'Mã Sản Phẩm đã tồn tại! Vui lòng thêm một mã sản phẩm khác');
                    }
                    $sizeCount = ProductsAttributes::where(['product_id' => $id, 'size' => $data['size'][$key]])->count();
                    // dd($sizeCount);
                    if ($sizeCount > 0) {
                        return redirect()->back()->with('error_message', 'Kích Thước đã tồn tại! Vui lòng thêm một Kích Thước khác');
                    }
                    $attribute = new ProductsAttributes;
                    $attribute->product_id = $id;
                    $attribute->sku = $value;
                    $attribute->size = $data['size'][$key];
                    $attribute->price = $data['price'][$key];
                    $attribute->stock = $data['stock'][$key];
                    $attribute->status = 1;
                    $attribute->save();
                }
            }
            return redirect()->back()->with('success_message', 'Attributes added successfully');
        };

        // dd($productAttributes);
        return view('admin.attributes.add-attributes-product')->with(compact('productAttributes'));
    }

    public function updateStatusAttributesProduct(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            ProductsAttributes::where('id', $data['attributes_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'attributes_id' => $data['attributes_id']]);
        }
    }
    public function editAttributesProduct(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            foreach ($data['attributeId'] as $key => $attributes) {
                if (!empty($attributes)) {
                    ProductsAttributes::where(['id' => $data['attributeId'][$key]])->update([
                        'price' => $data['price'][$key],
                        'stock' => $data['stock'][$key]
                    ]);
                }
            }
            return redirect()->back()->with('success_message', 'Cập Nhât Thành Công');
        }
    }
}
