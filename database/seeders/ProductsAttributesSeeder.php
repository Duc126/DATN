<?php

namespace Database\Seeders;

use App\Models\ProductsAttributes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsAttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductsAttributes::insert([
            ['product_id' => 2, 'size' => 'Small', 'price' => 150000, 'stock' => 10, 'sku' => 'RC001-S', 'status' => 1],
            ['product_id' => 2, 'size' => 'Medium', 'price' => 170000, 'stock' => 10, 'sku' => 'RC001-M', 'status' => 1],
            ['product_id' => 2, 'size' => 'Large', 'price' => 190000, 'stock' => 10, 'sku' => 'RC001-L', 'status' => 1],

        ]);
    }
}
