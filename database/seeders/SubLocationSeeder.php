<?php

namespace Database\Seeders;

use App\Interfaces\ConstantsInterface\BaseConstants;
use App\Models\locations\SubLocation;
use Illuminate\Database\Seeder;

class SubLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        SubLocation::create([
            'name' => 'drawer',
            'status' => BaseConstants::ACTIVE,
            'location_id' => 1,

        ]);

        SubLocation::create([
            'name' => 'fridge shelf',
            'status' => BaseConstants::ACTIVE,
            'location_id' => 1,

        ]);
    }
}
