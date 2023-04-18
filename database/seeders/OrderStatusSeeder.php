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
            ['name' => 'Moi','status' =>1],
            ['name' => 'Chua Giai Quyet','status' =>1],
            ['name' => 'Da Huy','status' =>1],
            ['name' => 'Dang Tien Hanh','status' =>1],
            ['name' => 'Van Chuyen','status' =>1],
            ['name' => 'Da Giao Hang','status' =>1],
            ['name' => 'Paid','status' =>1],
        ]);
    }
}
