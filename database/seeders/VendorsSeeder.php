<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords = [
            [
                'id' => 1, 'first_name' => 'Duc', 'last_name' => 'Bui', 'address' => 'An Duong Vuong', 'city' => 'Vinh', 'state' => 'Delhi', 'country' => 'Viet Nam',
                'pincode' => '110001', 'phone' => '0822520299', 'email' => 'duc@gmail.com', 'status' => 0
            ]
        ];
        Vendor::insert($vendorRecords);
    }
}
