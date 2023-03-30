<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ProductsAttributes;
use App\Models\User;
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
            Session::forget('couponAmount');
            Session::forget('couponCode');
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
            Session::forget('couponAmount');
            Session::forget('couponCode');
            $data = $request->all();
            // dd( $data );
            Cart::where('id', $data['cartid'])->delete();
            $getCartItems = Cart::getCartItems();
            $totalCartItems = totalCartItems();

            return response()->json([
                'totalCartItems' => $totalCartItems,
                'view' => (string)View::make('front.products.cart_items')->with(compact('getCartItems')),
                'headerView' => (string)View::make('front.layout.header_cart')->with(compact('getCartItems'))
            ]);
        }
    }
    public function applyCoupon(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            Session::forget('couponAmount');
            Session::forget('couponCode');
            // dd($data);
            $totalCartItems = totalCartItems();
            $getCartItems = Cart::getCartItems();

            $couponCount = Coupon::where('coupon_code', $data['code'])->count();
            if ($couponCount == 0) {
                return response()->json([
                    'status' => false,
                    'totalCartItems' => $totalCartItems,
                    'message' => 'Phiếu giảm giá không hợp lệ!',
                    'view' => (string)View::make('front.products.cart_items')->with(compact('getCartItems')),
                    'headerView' => (string)View::make('front.layout.header_cart')->with(compact('getCartItems'))
                ]);
            } else {
                //check for other coupon conditions

                //get Coupon Details
                $couponDetails = Coupon::where('coupon_code', $data['code'])->first();
                //check if coupon is active
                if ($couponDetails->status == 0) {
                    $message = "Phiếu giảm giá chưa được kích hoạt";
                }
                //check if coupon is expired
                $expiry_date = $couponDetails->expiry_date;
                $current_date = date('Y-m-d');
                if ($expiry_date < $current_date) {
                    $message = "Phiếu giảm giá đã hết hạn";
                }
                //check if coupon is from selected categories
                $cartArr = explode(",", $couponDetails->categories);
                //check if any cart item not belong to coupon category
                $total_amount = 0;
                foreach ($getCartItems as $key => $item) {
                    if (!in_array($item['product']['category_id'], $cartArr)) {
                        $message = "Mã phiếu giảm giá này không dành cho một trong những sản phẩm đã chọn.";
                    }
                    $attrPrice = Product::getDiscountAttributePrice($item['product_id'], $item['size']);
                    // var_dump($attrPrice);
                    $total_amount = $total_amount + ($attrPrice['final_price'] * $item['quantity']);
                }

                //check if coupon is from selected user
                //Get all selected users from coupon and convert to array
                if (isset($couponDetails->users) && !empty($couponDetails->users)) {
                    $userArr = explode(",", $couponDetails->users);
                    if (count($userArr) > 0) {
                        //get user id of all selected user
                        foreach ($userArr as $key => $user) {
                            $getUserId = User::select('id')->where('email', $user)->first()->toArray();
                            $usersId[] = $getUserId['id'];
                        }
                        //check if any cart item not belong to coupon user
                        foreach ($getCartItems as $item) {
                            // if (count($userArr) > 0) {
                            if (!in_array($item['user_id'], $usersId)) {
                                $message = "Mã phiếu giảm giá này không dành cho bạn. Hãy thử với mã phiếu giảm giá hợp lệ!";
                            }
                            // }
                        }
                    }
                }

                if ($couponDetails->vendor_id > 0) {
                    $productIds = Product::select('id')->where('vendor_id', $couponDetails->vendor_id)->pluck('id')->toArray();
                    // dd($productIds);
                    //check if coupon belongs to vendor products
                    foreach ($getCartItems as $item) {
                        if (!in_array($item['product']['id'], $productIds)) {
                            $message = "Mã phiếu giảm giá này không dành cho bạn. Hãy thử với mã phiếu giảm giá hợp lệ!";
                        }
                    }
                }

                //if error message is there
                if (isset($message)) {
                    return response()->json([
                        'status' => false,
                        'totalCartItems' => $totalCartItems,
                        'message' => $message,
                        'view' => (string)View::make('front.products.cart_items')->with(compact('getCartItems')),
                        'headerView' => (string)View::make('front.layout.header_cart')->with(compact('getCartItems'))
                    ]);
                } else {
                    //Coupon code is correct
                    //check if coupon amount type is fixed or percentage
                    if ($couponDetails->amount_type == "Fixed") {
                        $couponAmount = $couponDetails->amount;
                    } else {
                        $couponAmount = $total_amount *  ($couponDetails->amount / 100);
                    }
                    $grand_total = $total_amount - $couponAmount;
                    //Add coupon code & amout in session variables
                    Session::put('couponAmount', $couponAmount);
                    Session::put('couponCode', $data['code']);
                    $message = "Mã phiếu giảm giá được áp dụng thành công. Bạn đang được giảm giá!";
                    return response()->json([
                        'status' => true,
                        'totalCartItems' => $totalCartItems,
                        'couponAmount' => $couponAmount,
                        'grand_total' => $grand_total,
                        'message' => $message,
                        'view' => (string)View::make('front.products.cart_items')->with(compact('getCartItems')),
                        'headerView' => (string)View::make('front.layout.header_cart')->with(compact('getCartItems'))
                    ]);
                }
            }
        }
    }
}
