<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderStatus::insert([
            ['name' => 'New','status' =>1],
            ['name' => 'Pending','status' =>1],
            ['name' => 'Cancelled','status' =>1],
            ['name' => 'In Process','status' =>1],
            ['name' => 'Shipper','status' =>1],
            ['name' => 'Partially Shipped','status' =>1],
            ['name' => 'Delivered','status' =>1],
            ['name' => 'Partially Delivered','status' =>1],
            ['name' => 'Paid','status' =>1],
        ]);
    }
}
