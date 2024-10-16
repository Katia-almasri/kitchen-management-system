<?php

namespace Database\Seeders;

use App\Interfaces\ConstantsInterface\BaseConstants;
use App\Models\locations\Location;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::create([
            'name' => 'refrigerator',
            'status' => BaseConstants::ACTIVE,
            'qr_code' => uniqid() . Str::random(10),
            'count' => 20,
            'kitchen_id' => 1
        ]);

        Location::create([
            'name' => 'shelf',
            'status' => BaseConstants::ACTIVE,
            'qr_code' => uniqid() . Str::random(10),
            'count' => 5,
            'kitchen_id' => 1
        ]);
    }
}
