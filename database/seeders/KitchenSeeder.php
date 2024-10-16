<?php

namespace Database\Seeders;

use App\Models\Kitchen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KitchenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kitchen::create([
            'name' => 'Italian Kitchen',
            'restaurant_id' => 1,
        ]);

        Kitchen::create([
            'name' => 'Middle East Kitchen',
            'restaurant_id' => 1,
        ]);
    }
}
