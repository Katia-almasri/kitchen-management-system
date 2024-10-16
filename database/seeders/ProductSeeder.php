<?php

namespace Database\Seeders;

use App\Interfaces\ConstantsInterface\BaseConstants;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'apple',
            'ingredients' => '',
            'location_id' => 1,
            'sub_location_id' => 1,
            'quantity' => 15,
            'alert_quantity' => 2,
            'qr_code' => uniqid() . Str::random(10),
            'status' => BaseConstants::ACTIVE
        ]);

        Product::create([
            'name' => 'juice',
            'ingredients' => 'orange, water',
            'location_id' => 1,
            'sub_location_id' => 2,
            'quantity' => 5,
            'alert_quantity' => 1,
            'qr_code' => uniqid() . Str::random(10),
            'status' => BaseConstants::ACTIVE
        ]);
    }
}
