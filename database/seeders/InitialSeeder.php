<?php

namespace Database\Seeders;

use App\Models\DiningArea;
use App\Models\Restaurant;
use App\Models\Table;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $indoor = DiningArea::create(['name' => 'Indoor']);
        $outdoor = DiningArea::create(['name' => 'Outdoor']);
        $outdoorTerrace = DiningArea::create(['name' => 'Outdoor Terrace']);

        $greenRestaurant = Restaurant::create(['name' => 'Green Restaurant']);
        $greenRestaurant->diningAreas()->attach([$indoor->id, $outdoor->id]);

        $blueRestaurant = Restaurant::create(['name' => 'Blue Restaurant']);
        $blueRestaurant->diningAreas()->attach([$indoor->id, $outdoorTerrace->id]);

        // Green Restaurant tables
        for ($i = 1; $i <= 4; $i++) {
            Table::create([
                'name' => "Table $i", 
                'minimum_capacity' => 2, 
                'maximum_capacity' => 4, 
                'active' => true, 
                'restaurant_id' => $greenRestaurant->id, 
                'dining_area_id' => $indoor->id
            ]);
        }

        for ($i = 1; $i <= 2; $i++) {
            Table::create([
                'name' => "Table $i", 
                'minimum_capacity' => 3, 
                'maximum_capacity' => 5, 
                'active' => false, 
                'restaurant_id' => $greenRestaurant->id, 
                'dining_area_id' => $indoor->id
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            Table::create([
                'name' => "Table $i", 
                'minimum_capacity' => 3, 
                'maximum_capacity' => 5, 
                'active' => true, 
                'restaurant_id' => $greenRestaurant->id, 
                'dining_area_id' => $outdoor->id
            ]);
        }

        // Blue Restaurant tables
        for ($i = 1; $i <= 2; $i++) {
            Table::create([
                'name' => "Table $i", 
                'minimum_capacity' => 1, 
                'maximum_capacity' => 2, 
                'active' => true, 
                'restaurant_id' => $blueRestaurant->id, 
                'dining_area_id' => $indoor->id
            ]);
        }

        for ($i = 1; $i <= 2; $i++) {
            Table::create([
                'name' => "Table $i", 
                'minimum_capacity' => 3, 
                'maximum_capacity' => 5, 
                'active' => true, 
                'restaurant_id' => $blueRestaurant->id, 
                'dining_area_id' => $outdoorTerrace->id
            ]);
        }
    }
}
