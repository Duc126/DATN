<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Staff::insert([
            ['name' => 'Nguyen Van Nam','phone' => '','address' => '','status' => 1],
            ['name' => 'Tran Van Bao','phone' => '','address' => '','status' => 1],
            ['name' => 'Nguyen Van Hoang','phone' => '','address' => '','status' => 1],
            ['name' => 'Nguyen Thi Ngoc','phone' => '','address' => '','status' => 1],
            ['name' => 'Thai Van Hoang','phone' => '','address' => '','status' => 1],
        ]);
    }
}
