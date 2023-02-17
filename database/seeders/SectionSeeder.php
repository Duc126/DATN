<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Section::insert([
                ['name' => 'Quần Áo', 'status' => 1],
                ['name' => 'Thiết Bị', 'status' => 1],
                ['name' => 'Điện Tử', 'status' => 1],
        ]);
    }
}
