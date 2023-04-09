<?php

namespace Database\Seeders;

use App\Models\ShippingCharges;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingChargesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShippingCharges::insert([
            ['state' => 'Nghe An','country' => 'Vietnam', 'rate' => '30000', 'status' => 1],
            ['state' => 'An Giang','country' => 'Vietnam', 'rate' => '30000', 'status' => 1],
            ['state' => 'Bac Lieu','country' => 'Vietnam', 'rate' => '30000', 'status' => 1],
            ['state' => 'Ha Noi','country' => 'Vietnam', 'rate' => '30000', 'status' => 1],
            ['state' => 'Thanh Pho HCM','country' => 'Vietnam', 'rate' => '30000', 'status' => 1],
            ['state' => 'Quang Binh','country' => 'Vietnam', 'rate' => '30000', 'status' => 1],
            ['state' => 'Ninh Binh','country' => 'Vietnam', 'rate' => '30000', 'status' => 1],
            ['state' => 'Ha Tinh','country' => 'Vietnam', 'rate' => '30000', 'status' => 1],
            ['state' => 'Kon Tum','country' => 'Vietnam', 'rate' => '30000', 'status' => 1],
            ['state' => 'Ha Giang','country' => 'Vietnam', 'rate' => '30000', 'status' => 1],
            ['state' => 'Vinh Phuc','country' => 'Vietnam', 'rate' => '30000', 'status' => 1],
            ['state' => 'Thanh Hoa','country' => 'Vietnam', 'rate' => '30000', 'status' => 1],
            ['state' => 'Ha Nam','country' => 'Vietnam', 'rate' => '30000', 'status' => 1],
        ]);
    }
}
