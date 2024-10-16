<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\locations\Location;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // call the seeders
        // $this->call(RestaurantSeeder::class);
        // $this->call(KitchenSeeder::class);
        // $this->call(LocationSeeder::class);
        // $this->call(SubLocationSeeder::class);
        // $this->call(ProductSeeder::class);

        User::factory(10)->create();
    }
}
