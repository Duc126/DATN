<?php

namespace Database\Seeders;

use App\Models\DeliveryAddress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DeliveryAddress::insert([
            ['user_id' => 1, 'name'=>'test','address'=>'Nam Dan','city'=>'Vinh', 'state'=>'Delhi','Country' => 'Viet Nam', 'pincode' => '10001','phone' => '024681012', 'status' =>1],
            ['user_id' => 1, 'name'=>'Duc','address'=>'Nam Dan','city'=>'Vinh', 'state'=>'Delhi','Country' => 'Viet Nam', 'pincode' => '141001','phone' => '024681012', 'status' =>1],
        ]);
    }
}
