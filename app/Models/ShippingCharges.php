<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingCharges extends Model
{
    use HasFactory;
    public static function getShippingCharges($state)
    {
        $getShippingCharges = ShippingCharges::select('rate')->where('state', $state)->first();
        return $getShippingCharges->rate;
    }
}
