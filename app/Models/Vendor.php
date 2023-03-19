<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    public function vendorBusinessDetails(){
        return $this->belongsTo(VendorsBusinessDetail::class, 'id','vendor_id');
    }

    public static function getVendorShop($vendorId){
        $getVendorShop = VendorsBusinessDetail::select('shop_name')->where('vendor_id', $vendorId)
        ->first()->toArray();
        // dd($getVendorShop);
        return $getVendorShop['shop_name'];
    }
}
