<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\ProductsAttributes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class AddProductController extends Controller
{
    public function cartAdd(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            //check product stock is available or not
            $getProductStock = ProductsAttributes::getProductStock($data['product_id'], $data['size']);
            if ($getProductStock < $data['quantity']) {
                return redirect()->back()->with('error_message', 'Số lượng yêu cầu không có sẵn!');
            }
            $session_id = Session::get('session_id');
            if (empty($session_id)) {
                $session_id = Session::getId();
                Session::put('session_id', $session_id);
            }

            //Check Product if already exists
            if (Auth::check()) {
                //User is logged in
                $user_id = Auth::user()->id;
                $countProducts = Cart::where(['product_id' => $data['product_id'], 'size' => $data['size'], 'user_id' => $user_id])->count();
            } else {
                //user is not logged in
                $user_id = 0;
                $countProducts = Cart::where(['product_id' => $data['product_id'], 'size' => $data['size'], 'session_id' => $session_id])->count();
            }
            if ($countProducts > 0) {
                return redirect()->back()->with('error_message', 'Sản phẩm đã tồn tại trong Giỏ hàng');
            }
            //Save product in carts table
            $item = new Cart;
            $item->session_id = $session_id;
            $item->user_id = $user_id;
            $item->product_id = $data['product_id'];
            $item->size = $data['size'];
            $item->quantity = $data['quantity'];
            $item->save();
            return redirect()->back()->with('success_message', 'Sản phẩm đã được thêm vào giỏ hàng! <a style="text-decoration: underline !important" href="/cart">Xem giỏ hàng</a>');
        }
    }
    public function cart()
    {
        $getCartItems = Cart::getCartItems();
        // dd($getCartItems);
        return view('front.products.cart')->with(compact('getCartItems'));
    }
    public function cartUpdate(Request $request)
    {

        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            //get Cart details
            $cartDetails = Cart::find($data['cartid']);
            //get Available Product Stock
            $availableStock = ProductsAttributes::select('stock')->where(['product_id' => $cartDetails['product_id'], 'size' => $cartDetails['size']])
                ->first()->toArray();

            // echo "<pre>"; print_r($availableStock);die;
            //check if desired stock from user is available
            if ($data['qty'] > $availableStock['stock']) {
                $getCartItems = Cart::getCartItems();
                return response()->json([
                    'status' => false,
                    'message' => 'Kho sản phẩm không có sẵn',
                    'view' => (string)View::make('front.products.cart_items')->with(compact('getCartItems'))
                ]);
            }

            //check if size is available
            $availableSize = ProductsAttributes::where(['product_id' => $cartDetails['product_id'], 'size' => $cartDetails['size'], 'status' => 1])->count();
            if ($availableSize == 0) {
                $getCartItems = Cart::getCartItems();
                return response()->json([
                    'status' => false,
                    'message' => 'Kích Thước sản phẩm không có sẵn. Vui lòng xóa Sản phẩm này và chọn một Sản phẩm khác',
                    'view' => (string)View::make('front.products.cart_items')->with(compact('getCartItems'))
                ]);
            }


            //update the quantity
            Cart::where('id', $data['cartid'])->update(['quantity' => $data['qty']]);
            $getCartItems = Cart::getCartItems();
            $totalCartItems = totalCartItems();

            return response()->json([
                'status' => true,
                'totalCartItems' => $totalCartItems,
                'view' => (string)View::make('front.products.cart_items')->with(compact('getCartItems')),
                'headerView' => (string)View::make('front.layout.header_cart')->with(compact('getCartItems'))

            ]);
        }
    }
    public function cartDelete(Request $request)
    {

        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd( $data );
            Cart::where('id', $data['cartid'])->delete();
            $getCartItems = Cart::getCartItems();
            $totalCartItems = totalCartItems();

            return response()->json([
                'status' => true,
                'totalCartItems' => $totalCartItems,
                'view' => (string)View::make('front.products.cart_items')->with(compact('getCartItems')),
                'headerView' => (string)View::make('front.layout.header_cart')->with(compact('getCartItems'))
            ]);
        }
    }
}
