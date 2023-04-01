<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Countries;
use App\Models\DeliveryAddress;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\ProductsAttributes;
use App\Models\ProductsFilter;
use App\Models\RecentlyViewProducts;
use App\Models\Vendor;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductsViewController extends Controller
{
    public function listingIndex(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            // echo "<pre>";
            // print_r($data);
            // die;
            $_GET['sort'] = $data['sort'];
            $url = $data['url'];
            $categoryCount = Category::where(['url' => $url, 'status' => 1])->count();
            if ($categoryCount > 0) {
                $categoryDetails = Category::categoryDetails($url);
                $categoryProducts = Product::with('brand')->whereIn('category_id', $categoryDetails['catIds'])->where('status', 1);

                //checking for fabric Dynamic
                $productFilters = ProductsFilter::productFilters();
                foreach ($productFilters as $key => $filter) {
                    if (
                        isset($filter['filter_column']) && isset($data[$filter['filter_column']])
                        && !empty($filter['filter_column']) && !empty($data[$filter['filter_column']])
                    ) {
                        $categoryProducts->whereIn($filter['filter_column'], $data[$filter['filter_column']]);
                    }
                }
                if (isset($data['fabric']) && !empty($data['fabric'])) {
                    $categoryProducts->whereIn('products.fabric', $data['fabric']);
                }


                //check for sort
                if (isset($_GET['sort']) && !empty($_GET['sort'])) {
                    if ($_GET['sort'] == "product_latest") {
                        $categoryProducts->orderBy('products.id', 'Desc');
                    } else if ($_GET['sort'] == "price_lowest") {
                        $categoryProducts->orderBy('products.product_price', 'Asc');
                    } else if ($_GET['sort'] == "price_highest") {
                        $categoryProducts->orderBy('products.product_price', 'Desc');
                    } else if ($_GET['sort'] == "name_z_a") {
                        $categoryProducts->orderBy('products.product_name', 'Desc');
                    } else if ($_GET['sort'] == "name_a_z") {
                        $categoryProducts->orderBy('products.product_name', 'Asc');
                    }
                }
                //checking for size
                if (isset($data['size']) && !empty($data['size'])) {
                    $productIds = ProductsAttributes::select('product_id')->whereIn('size', $data['size'])->pluck('product_id')->toArray();
                    $categoryProducts->whereIn('products.id', $productIds);
                }
                // checking for color filter
                if (isset($data['color']) && !empty($data['color'])) {
                    $productIds = Product::select('id')->whereIn('product_color', $data['color'])->pluck('id')->toArray();
                    $categoryProducts->whereIn('products.id', $productIds);
                }
                // checking for price filter
                // if (isset($data['price']) && !empty($data['price'])) {
                //     foreach ($data['price'] as $key => $price) {
                //         $priceArr = explode("-", $price);
                //         $productIds[] = Product::select('id')->whereBetween('product_price', [$priceArr[0], $priceArr[1]])->pluck('id')->toArray();
                //     }
                //     $productIds = call_user_func_array('array_merge', $productIds);
                //     $categoryProducts->whereIn('products.id', $productIds);
                // }
                //checking for price
                $productIds = array();
                if (isset($data['price']) && !empty($data['price'])) {
                    foreach ($data['price'] as $key => $price) {
                        $priceArr = explode("-", $price);
                        if (isset($priceArr[0]) && isset($priceArr[1])) {
                            $productIds[] = Product::select('id')->whereBetween(
                                'product_price',
                                [$priceArr[0], $priceArr[1]]
                            )->pluck('id')->toArray();
                        }
                    }
                    $productIds = array_unique(array_flatten($productIds));
                    $categoryProducts->whereIn('products.id', $productIds);
                }
                // checking for bránd filter
                if (isset($data['brand']) && !empty($data['brand'])) {
                    $productIds = Product::select('id')->whereIn('brand_id', $data['brand'])->pluck('id')->toArray();
                    $categoryProducts->whereIn('products.id', $productIds);
                }
                $categoryProducts = $categoryProducts->paginate(10);
                // dd($categoryDetails);
                return view('front.products.products_listing')->with(compact('categoryDetails', 'categoryProducts', 'url'));
                // echo "Category exits"; die;
            } else {
                abort(404);
            }
        } else {
            $url = Route::getFacadeRoot()->current()->uri();
            $categoryCount = Category::where(['url' => $url, 'status' => 1])->count();
            if ($categoryCount > 0) {
                $categoryDetails = Category::categoryDetails($url);
                $categoryProducts = Product::with('brand')->whereIn('category_id', $categoryDetails['catIds'])->where('status', 1);
                //check for sort
                if (isset($_GET['sort']) && !empty($_GET['sort'])) {
                    if ($_GET['sort'] == "product_latest") {
                        $categoryProducts->orderBy('products.id', 'Desc');
                    } else if ($_GET['sort'] == "price_lowest") {
                        $categoryProducts->orderBy('products.product_price', 'Asc');
                    } else if ($_GET['sort'] == "price_highest") {
                        $categoryProducts->orderBy('products.product_price', 'Desc');
                    } else if ($_GET['sort'] == "name_z_a") {
                        $categoryProducts->orderBy('products.product_name', 'Desc');
                    } else if ($_GET['sort'] == "name_a_z") {
                        $categoryProducts->orderBy('products.product_name', 'Asc');
                    }
                }
                $categoryProducts = $categoryProducts->paginate(10);
                // dd($categoryDetails);
                return view('front.products.listing')->with(compact('categoryDetails', 'categoryProducts', 'url'));
                // echo "Category exits"; die;
            } else {
                abort(404);
            }
        }
    }

    public function vendorListing($vendorId)
    {

        //vendor SHop
        $getVendorShop = Vendor::getVendorShop($vendorId);
        // dd($getVendorShop);
        $vendorProducts = Product::with('brand')->where('vendor_id', $vendorId)->where('status', 1);
        $vendorProducts = $vendorProducts->paginate(30);
        // dd($vendorProducts);

        // // dd($vendorProducts);
        return view('front.products.vendor_listing')->with(compact('getVendorShop', 'vendorProducts'));
    }
    public function detail($id)
    {
        $productDetails = Product::with(['section', 'category', 'brand', 'attributes' => function ($query) {
            $query->where('stock', '>', 0)->where('status', 1);
        }, 'images', 'vendor'])->find($id)->toArray();
        $categoryDetails = Category::categoryDetails($productDetails['category']['url']);
        // dd($productDetails);
        //Hiển thị sản phẩm tương tự
        $similarProducts = Product::with('brand')->where('category_id', $productDetails['category']['id'])->where('id', '!=', $id)->limit(6)->inRandomOrder()->get()->toArray();
        // dd($similarProducts);

        //set session for recenly view product

        if (empty(Session::get('session_id'))) {
            $session_id = md5(uniqid(rand(), true));
        } else {
            $session_id =  Session::get('session_id');
        }
        Session::put('session_id', $session_id);
        //Insert product in table if not already exits

        $countRecentlyViewProduct = RecentlyViewProducts::where(['product_id' => $id, 'session_id' => $session_id])->count();
        if ($countRecentlyViewProduct == 0) {
            RecentlyViewProducts::insert(['product_id' => $id, 'session_id' => $session_id]);
        }
        //get recently view products IDS
        $recentProductsIds = RecentlyViewProducts::select('product_id')->where('product_id', '!=', $id)->where('session_id', $session_id)->inRandomOrder()->get()->take(4)
            ->pluck('product_id');
        // dd($recentProductsIds);
        //Hiển thị recently view Products
        $recentlyViewProducts = Product::with('brand')->whereIn('id', $recentProductsIds)->get()->toArray();
        // dd($similarProducts);
        //get Group Product(Product Colors)
        $groupProducts = array();
        if (!empty($productDetails['group_code'])) {
            $groupProducts = Product::select('id', 'product_image')->where('id', '!=', $id)->where(['group_code' => $productDetails['group_code'], 'status' => 1])->get()->toArray();
            // dd($groupProducts);
        }
        $totalStock = ProductsAttributes::where('product_id', $id)->sum('stock');

        return view('front.products.detail')->with(compact('productDetails', 'categoryDetails', 'totalStock', 'similarProducts', 'recentlyViewProducts', 'groupProducts'));
    }

    public function getProductPrice(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            // dd($data);
            // echo "<pre>"; print_r($data);die;
            $getDiscountAttributePrice = Product::getDiscountAttributePrice($data['product_id'], $data['size']);
            return  $getDiscountAttributePrice;
        }
    }
    public function checkout(Request $request)
    {
        $deliveryAddress = DeliveryAddress::deliveryAddress();
        $countries = Countries::where('status', 1)->get()->toArray();
        $getCartItems = Cart::getCartItems();
        if (count($getCartItems) == 0) {
            $message = "Giỏ hàng đang rỗng! Vui lòng thêm sản phẩm để thanh toán";
            return redirect('cart')->with('error_message', $message);
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            // echo "<pre>"; print_r($data);die;

            //select Delivery address validation
            if (empty($data['address_id'])) {
                $message = "Vui lòng chọn Địa chỉ giao hàng";
                return redirect()->back()->with('error_message', $message);
            }

            //payment method validation
            if (empty($data['payment_gateway'])) {
                $message = "Vui lòng chọn hình thức thanh toán";
                return redirect()->back()->with('error_message', $message);
            }
            //accept validation
            if (empty($data['accept'])) {
                $message = "Vui lòng tích vào ô xác nhận";
                return redirect()->back()->with('error_message', $message);
            }

            //GET Delivery Address from address_id
            $addressDelivery = DeliveryAddress::where('id', $data['address_id'])->first()->toArray();
            // dd($addressDelivery);

            //set payment Method as COD if COD is selected from user otherwise set as prepaid

            if ($data['payment_gateway'] == "COD") {
                $payment_method = "COD";
                $order_status = "New";
            } else {
                $payment_method = "Credit Card";
                $order_status = "Pending";
            }
            DB::beginTransaction();
            //fetch order total price
            $total_price = 0;
            foreach ($getCartItems as $item) {
                $getDiscountAttributePrice = Product::getDiscountAttributePrice($item['product_id'], $item['size']);
                $total_price = $total_price + ($getDiscountAttributePrice['final_price'] * $item['quantity']);
            }
            //calculate shipping charges
            $shipping_charges = 0;
            //calculate grand total
            $grand_total = $total_price + $shipping_charges - Session::get('couponAmount');

            //insert grand total in session variable
            Session::put('grand_total', $grand_total);

            //insert order details

            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->name = $addressDelivery['name'];
            $order->address = $addressDelivery['address'];
            $order->city = $addressDelivery['city'];
            $order->state = $addressDelivery['state'];
            $order->country = $addressDelivery['country'];
            $order->pincode = $addressDelivery['pincode'];
            $order->phone = $addressDelivery['phone'];
            $order->email =  Auth::user()->email;
            $order->shipping_charges = $shipping_charges;
            $order->coupon_code = Session::get('couponCode');
            $order->coupon_amount = Session::get('couponAmount');
            $order->order_status = $order_status;
            $order->payment_method = $payment_method;
            $order->payment_gateway = $data['payment_gateway'];
            $order->grand_total = $grand_total;
            $order->save();
            $order_id = DB::getPdo()->lastInsertId();


            foreach ($getCartItems as $item) {
                $cartItem = new OrderProduct();
                $cartItem->order_id = $order_id;
                $cartItem->user_id = Auth::user()->id;
                $getProductDetails = Product::select('product_code', 'product_name', 'product_color', 'admin_id', 'vendor_id')
                    ->where('id', $item['product_id'])->first()->toArray();
                // dd($getProductDetails);
                $cartItem->admin_id = $getProductDetails['admin_id'];
                $cartItem->vendor_id = $getProductDetails['vendor_id'];
                $cartItem->product_id = $item['product_id'];
                $cartItem->product_code = $getProductDetails['product_code'];
                $cartItem->product_name = $getProductDetails['product_name'];
                $cartItem->product_color = $getProductDetails['product_color'];
                $cartItem->product_size = $item['size'];
                $getDiscountAttributePrice = Product::getDiscountAttributePrice($item['product_id'], $item['size']);
                $cartItem->product_price = $getDiscountAttributePrice['final_price'];
                $cartItem->product_qty = $item['quantity'];
                $cartItem->save();
            }

            //insert order id in session variable
            Session::put('order_id', $order_id);
            DB::commit();

            return redirect('thanks');
        }
        return view('front.products.checkout')->with(compact('deliveryAddress', 'countries', 'getCartItems'));
    }
    public function thanks()
    {
        if (Session::has('order_id')) {
            //Empty the cart
            Cart::where('user_id', Auth::user()->id)->delete();
            return view('front.products.thanks');
        } else {
            return redirect('cart');
        }
    }
}
