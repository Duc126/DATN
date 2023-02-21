<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::insert([
            ['name' =>'Arrow','status' => 1],
            ['name' =>'Gap','status' => 1],
            ['name' =>'Lee','status' => 1],
            ['name' =>'Samsung','status' => 1],
            ['name' =>'LG','status' => 1],
            ['name' =>'Lenovo','status' => 1],
            ['name' =>'MI','status' => 1],

        ]);
    }
}
