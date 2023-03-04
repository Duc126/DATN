<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function section(){
        return $this->belongsTo(Section::class, 'section_id');
    }
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function attributes(){
        return $this->hasMany(ProductsAttributes::class);
    }
    public function images(){
        return $this->hasMany(ProductsImage::class);
    }
    public static function getDiscountPrice($product_id){
        $proDetails = Product::select('product_price', 'product_discount','category_id')->where('id', $product_id)->first();
        $proDetails = json_decode(json_encode($proDetails), true);
        $catDetails = Category::select('category_discount')->where('id', $proDetails['category_id'])->first();
        $catDetails = json_decode(json_encode($catDetails), true);

        if($proDetails['product_discount'] > 0){
            $discounted_price = $proDetails['product_price'] - ($proDetails['product_price'] *  $proDetails['product_discount']/100);
        } else if($catDetails['category_discount'] > 0){
            $discounted_price = $catDetails['product_price'] - ($catDetails['product_price'] *  $catDetails['category_discount']/100);

        }else{
            $discounted_price = 0;
        }
        return $discounted_price;
    }
}
