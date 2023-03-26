<?php

namespace Database\Seeders;

use App\Models\Banners;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banners::insert([
            ['image'=>'banner-1.png','link'=>'spring-collection','title' =>'Spring Collection',
            'alt' => 'Spring Collection', 'status' => 1],
            ['image'=>'banner-2.png','link'=>'tops','title' =>'Tops', 'alt' => 'Tops', 'status' => 1],
        ]);
    }
}
