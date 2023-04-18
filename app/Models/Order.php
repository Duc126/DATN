<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function orders_products(){
        return $this->hasMany(OrderProduct::class, 'order_id');
    }
    public function creditCard()
    {
        return $this->belongsTo(CreditCard::class,'crd_id','order_card_id');
    }
    public function orderNhanVien()
    {
        return $this->hasMany(NhanVien::class,'id_nhanvien','id_NV');
    }
}
