<?php

namespace Database\Seeders;

use App\Models\OrderItemStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderItemStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderItemStatus::insert([
            ['name' => 'Pending','status' =>1],
            ['name' => 'In Process','status' =>1],
            ['name' => 'Shipped','status' =>1],
            ['name' => 'Delivered','status' =>1],
        ]);
    }
}
