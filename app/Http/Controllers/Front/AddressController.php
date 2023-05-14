<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Countries;
use App\Models\DeliveryAddress;
use App\Models\ShippingCharges;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class AddressController extends Controller
{
    public function getDeliveryAddress(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            $deliveryAddress = DeliveryAddress::where('id', $data['addressid'])->first()->toArray();
            // dd( $deliveryAddress);
            return response()->json(['address' => $deliveryAddress]);
        }
    }
    public function saveDeliveryAddress(Request $request)
    {
        if ($request->ajax()) {

            $validator = Validator::make($request->all(), [
                'delivery_name' => 'required|string|max:100',
                'delivery_address' => 'required|string|max:100',
                'delivery_city' => 'required|string|max:100',
                'delivery_state' => 'required|string|max:100',
                'delivery_country' => 'required|string|max:100',
                // 'delivery_pincode' => 'required|digits:6',
                'delivery_phone' => 'required|numeric|digits:10',
            ]);
            if ($validator->passes()) {
                $data = $request->all();
                $address = array();
                $address['user_id'] = Auth::user()->id;
                $address['name'] = $data['delivery_name'];
                $address['address'] =  $data['delivery_address'];
                $address['city'] = $data['delivery_city'];
                $address['state'] = $data['delivery_state'];
                $address['country'] = $data['delivery_country'];
                $address['pincode'] = $data['delivery_pincode'];
                $address['phone'] = $data['delivery_phone'];
                // $address = array(
                //     'user_id' => Auth::user()->id,
                //     'name' => $data['delivery_name'],
                //     'address' => $data['delivery_address'],
                //     'city' => $data['delivery_city'],
                //     'state' => $data['delivery_state'],
                //     'country' => $data['delivery_country'],
                //     'pincode' => $data['delivery_pincode'],
                //     'phone' => $data['delivery_phone']
                // );
                if (!empty($data['delivery_id'])) {


                    DeliveryAddress::where('id', $data['delivery_id'])->update($address);
                } else {
                    $address['status'] = 1;
                    //add Delivery address
                    DeliveryAddress::create($address);
                }
                $deliveryAddress = DeliveryAddress::deliveryAddress();
                $countries = Countries::where('status', 1)->get()->toArray();
                $shippingState = ShippingCharges::where('status', 1)->get()->toArray();
                // dd($shipping);


                return response()->json([
                    'view' => (string)View::make('front.products.delivery_address')->with(compact('deliveryAddress', 'countries','shippingState'))
                ]);
            } else {
                return response()->json(['type' => 'error', 'errors' => $validator->messages()]);
            }
        }
    }
    public function removeDeliveryAddress(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            // dd($data);
            DeliveryAddress::where('id', $data['addressid'])->delete();
            $deliveryAddress = DeliveryAddress::deliveryAddress();
            $countries = Countries::where('status', 1)->get()->toArray();
            $shippingState = ShippingCharges::where('status', 1)->get()->toArray();

            return response()->json([
                'view' => (string)View::make('front.products.delivery_address')->with(compact('deliveryAddress', 'countries','shippingState'))
            ]);
        }
    }
}
