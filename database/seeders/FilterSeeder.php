<?php

namespace Database\Seeders;

use App\Models\ProductsFilter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductsFilter::insert([
            ['cat_ids' => '1,2,6,7,8,9', 'filter_name' => 'Fabric','filter_column' => 'fabric','status' => 1],
            ['cat_ids' => '4,5', 'filter_name' => 'Ram','filter_column' => 'ram','status' => 1],

        ]);
    }
}
