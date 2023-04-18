<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingCharges extends Model
{
    use HasFactory;
    public static function getShippingCharges($total_weight,$state)
    {
        $getShippingCharges = ShippingCharges::where('state', $state)->first()->toArray();
        if($total_weight > 0){
            if($total_weight > 0 && $total_weight <=500){
                $rate = $getShippingCharges['0_500g'];
            }
            else if($total_weight > 500 && $total_weight <=1000){
                $rate = $getShippingCharges['501_1000g'];
            }
            else if($total_weight > 1000 && $total_weight <=2000){
                $rate = $getShippingCharges['1001_2000g'];
            }
            else if($total_weight > 2000 && $total_weight <=5000){
                $rate = $getShippingCharges['2001_5000g'];
            }
            else if($total_weight > 5000){
                $rate = $getShippingCharges['above_5000g'];
            }
            else {
                $rate = 0;

            }
        }else {
            $rate = 0;
        }
        return $rate;
    }
}
