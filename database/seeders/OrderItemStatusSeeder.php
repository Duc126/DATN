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
            ['name' => 'Chua Giai Quyet','status' =>1],
            ['name' => 'Dang Tien Hanh','status' =>1],
            ['name' => 'Van Chuyen','status' =>1],
            ['name' => 'Da Giao Hang','status' =>1],
        ]);
    }
}
