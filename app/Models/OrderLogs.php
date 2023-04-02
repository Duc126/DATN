<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLogs extends Model
{
    use HasFactory;
    public function orders_products(){
        return $this->hasMany(OrderProduct::class , 'id', 'order_item_id');
    }
    public static function getItemDetails($order_item_id){
        $getItemDetails = OrderProduct::where('id', $order_item_id)->first()->toArray();
        return $getItemDetails;
    }
}
