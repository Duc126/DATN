<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(AdminSeeder::class);
        // $this->call(VendorsSeeder::class);
        // $this->call(VendorsBusinessDetailSeeder::class);
        // $this->call(VendorsBankDetailSeeder::class);
        // $this->call(CountriesSeeder::class);
        // $this->call(SectionSeeder::class);
        // $this->call(CategorySeeder::class);
        // $this->call(BrandSeeder::class);
        // $this->call(ProductSeeder::class);
        $this->call(ProductsAttributesSeeder::class);




    }
}
