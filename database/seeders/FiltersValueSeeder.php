<?php

namespace Database\Seeders;

use App\Models\ProductsFiltersValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FiltersValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductsFiltersValue::insert([
            ['filter_id' => '1', 'filter_value' => 'cotton','status' => 1],
            ['filter_id' => '1', 'filter_value' => 'polyester','status' => 1],
            ['filter_id' => '2', 'filter_value' => '4 GB','status' => 1],
            ['filter_id' => '2', 'filter_value' => '8 GB','status' => 1],
        ]);
    }
}
