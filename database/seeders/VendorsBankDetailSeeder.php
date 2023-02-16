<?php

namespace Database\Seeders;

use App\Models\VendorsBankDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsBankDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorBankDetail = [
            'id' => 1, 'vendor_id' => 1, 'account_holder_name' => 'Admin Test',
            'bank_name' => 'VTB','account_number'=>'0243530500022',
            'bank_ifsc_code'=> '24353563'
        ];
        VendorsBankDetail::insert($vendorBankDetail);

    }
}
