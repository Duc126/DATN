<?php

namespace Database\Seeders;

use App\Models\VendorsBusinessDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsBusinessDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $VendorBusinessDetailRecords = [

            ['id' => 1, 'vendor_id' => 1, 'shop_name' => 'Store', 'shop_address' => 'An Duong Vuong', 'shop_city' => 'Vinh',
            'shop_state' => 'Nghe An', 'shop_country' => 'Viet Nam', 'shop_pincode' => '110001', 'shop_mobile' => '0355913199', 'shop_website' => 'datn.com', 'shop_email' => 'admin@gmail.com',
            'address_proof' => 'Passport', 'address_proof_image' => '', 'business_license_number' => '132435355', 'gst_number' => '446466446',
             'pan_number' => '242355346'],

        ];
        VendorsBusinessDetail::insert($VendorBusinessDetailRecords);

    }
}
