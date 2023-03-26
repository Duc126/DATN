<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::insert([
            [
                'vendor_id' => 0, 'coupon_option' => 'Manual', 'coupon_code' => 'test10', 'categories' => '1', 'brands' => '', 'users' => '',
                'coupon_type' => 'Single', 'amount_type' => 'Percentage', 'amount' => 10, 'expiry_date' => '2022-12-31', 'status' => 1
            ],
            [
                'vendor_id' => 4, 'coupon_option' => 'Manual', 'coupon_code' => 'test20', 'categories' => '1', 'brands' => '', 'users' => '',
                'coupon_type' => 'Single', 'amount_type' => 'Percentage', 'amount' => 20, 'expiry_date' => '2022-12-31', 'status' => 1
            ]
        ]);
    }
}
