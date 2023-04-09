<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsAttributes extends Model
{
    use HasFactory;
    public static function getProductStock($product_id, $size)
    {
        $getProductStock = ProductsAttributes::select('stock')
                            ->where(['product_id' => $product_id, 'size' => $size])
                            ->first();

        if ($getProductStock) {
            return $getProductStock->stock;
        } else {
            // handle the case where the $getProductStock is null
            return 0; // or any other value that makes sense for your use case
        }
    }
    public static function getAttributeStatus($product_id, $size)
    {
        $getAttributeStatus = ProductsAttributes::select('status')->where(['product_id' => $product_id, 'size' => $size])->first();
        return $getAttributeStatus->status;
    }
}
