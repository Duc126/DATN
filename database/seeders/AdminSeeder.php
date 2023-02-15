<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

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
                'id' => 1, 'name' => 'Admin', 'type' => 'admin', 'vendor_id' => '0', 'mobile' => '0355913199',
                'email' => 'admin@gmail.com', 'password' => '$2a$12$OikWfCt81tETPiQkS9pWi..8IPqRqw.AGLmSuh/EdUauE7EDq5.lG
                ', 'image' => '', 'status' => 1
            ],
        ];
        Admin::insert($adminRecords);
    }
}
