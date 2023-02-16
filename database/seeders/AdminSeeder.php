<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords = [
            [
                'id' => 1, 'first_name' => 'Admin', 'last_name' => 'test', 'type' => 'admin', 'vendor_id' => '0', 'phone' => '0355913199',
                'email' => 'admin@gmail.com', 'password' => Hash::make("admin123")
                , 'image' => '', 'status' => 1
            ],
            [
                'id' => 2, 'first_name' => 'Test', 'last_name' => 'Vendor', 'type' => 'vendor', 'vendor_id' => '1', 'phone' => '0355913199',
                'email' => 'test@gmail.com', 'password' => Hash::make("admin123")
                , 'image' => '', 'status' => 1
            ],
        ];
        Admin::insert($adminRecords);
    }
}
