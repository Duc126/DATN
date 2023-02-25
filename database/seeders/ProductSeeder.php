<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            [
                'section_id' => 2, 'category_id' => 5, 'brand_id' => 7, 'vendor_id' => 1, 'admin_id' => 2,
                'admin_type' => 'vendor', 'product_name' => 'Redmi Note 11', 'product_code' => 'RM11',
                'product_color' => 'Blue', 'product_price' => 5000000, 'product_discount' => 10,
                'product_weight' => 500, 'product_image' => '', 'description' => '', 'product_video' => '', 'meta_title' => '',
                'meta_description' => '', 'meta_keywords' => '', 'is_featured' => 'Yes', 'status' => 1
            ],
            [
                'section_id' => 1, 'category_id' => 6, 'brand_id' => 2, 'vendor_id' => 0, 'admin_id' => 1,
                'admin_type' => 'admin', 'product_name' => 'Red Casual T-Shit', 'product_code' => 'RC001',
                'product_color' => 'Red', 'product_price' => 1000000, 'product_discount' => 20,
                'product_weight' => 200, 'product_image' => '', 'description' => '', 'product_video' => '', 'meta_title' => '',
                'meta_description' => '', 'meta_keywords' => '', 'is_featured' => 'Yes', 'status' => 1
            ],
        ]);
    }
}
