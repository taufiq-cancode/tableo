<?php

namespace Database\Seeders;

use App\Models\DiningArea;
use App\Models\Restaurant;
use App\Models\Table;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InitialSeeder extends Seeder
{
   
    public function run()
    {
       // Create Dining Areas
        $indoor = DiningArea::create(['name' => 'Indoor']);
        $outdoor = DiningArea::create(['name' => 'Outdoor']);
        $outdoorTerrace = DiningArea::create(['name' => 'Outdoor Terrace']);

        // Create Green Restaurant and associate dining areas
        $greenRestaurant = Restaurant::create(['name' => 'Green Restaurant']);
        $greenRestaurant->diningAreas()->attach([$indoor->id, $outdoor->id]);

        // Create Blue Restaurant and associate dining areas
        $blueRestaurant = Restaurant::create(['name' => 'Blue Restaurant']);
        $blueRestaurant->diningAreas()->attach([$indoor->id, $outdoorTerrace->id]);

        // Custom table names for Green Restaurant
        $greenIndoorTableNames = ['Emerald Garden Table', 'Jade Pavilion Table', 'Mint Blossom Table', 'Verdant Oasis Table'];
        $greenIndoorInactiveTableNames = ['Sage Sanctuary Table', 'Olive Grove Table'];
        $greenOutdoorTableNames = ['Forest Canopy Table', 'Pine Retreat Table', 'Mossy Meadow Table', 'Cedar Haven Table', 'Fern Glade Table'];

        // Create Tables for Green Restaurant (Indoor)
        foreach ($greenIndoorTableNames as $tableName) {
            Table::create([
                'name' => $tableName, 
                'minimum_capacity' => 2, 
                'maximum_capacity' => 4, 
                'active' => true, 
                'restaurant_id' => $greenRestaurant->id, 
                'dining_area_id' => $indoor->id
            ]);
        }

        foreach ($greenIndoorInactiveTableNames as $tableName) {
            Table::create([
                'name' => $tableName, 
                'minimum_capacity' => 3, 
                'maximum_capacity' => 5, 
                'active' => false, 
                'restaurant_id' => $greenRestaurant->id, 
                'dining_area_id' => $indoor->id
            ]);
        }

        // Create Tables for Green Restaurant (Outdoor)
        foreach ($greenOutdoorTableNames as $tableName) {
            Table::create([
                'name' => $tableName, 
                'minimum_capacity' => 3, 
                'maximum_capacity' => 5, 
                'active' => true, 
                'restaurant_id' => $greenRestaurant->id, 
                'dining_area_id' => $outdoor->id
            ]);
        }

        // Custom table names for Blue Restaurant
        $blueIndoorTableNames = ['Sapphire Lounge Table', 'Azure Bay Table'];
        $blueOutdoorTerraceTableNames = ['Sky Terrace Table', 'Ocean Breeze Table'];

        // Create Tables for Blue Restaurant (Indoor)
        foreach ($blueIndoorTableNames as $tableName) {
            Table::create([
                'name' => $tableName, 
                'minimum_capacity' => 1, 
                'maximum_capacity' => 2, 
                'active' => true, 
                'restaurant_id' => $blueRestaurant->id, 
                'dining_area_id' => $indoor->id
            ]);
        }

        // Create Tables for Blue Restaurant (Outdoor Terrace)
        foreach ($blueOutdoorTerraceTableNames as $tableName) {
            Table::create([
                'name' => $tableName, 
                'minimum_capacity' => 3, 
                'maximum_capacity' => 5, 
                'active' => true, 
                'restaurant_id' => $blueRestaurant->id, 
                'dining_area_id' => $outdoorTerrace->id
            ]);
        }
    }
}
