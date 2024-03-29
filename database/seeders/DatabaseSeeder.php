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
        // $this->call(ProductsAttributesSeeder::class);
        // $this->call(BannerSeeder::class);
        // $this->call(FilterSeeder::class);
        // $this->call(FiltersValueSeeder::class);
        // $this->call(CouponTable::class);
        // $this->call(DeliveryAddressSeeder::class);
        // $this->call(OrderStatusSeeder::class);
        // $this->call(OrderItemStatusSeeder::class);
        // $this->call(ShippingChargesSeeder::class);
        $this->call(StaffSeeder::class);


    }
}
