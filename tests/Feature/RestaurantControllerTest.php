<?php

namespace Tests\Feature;

use App\Models\DiningArea;
use App\Models\Restaurant;
use App\Models\Table;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RestaurantControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_shows_a_list_of_restaurants()
    {
        $restaurants = Restaurant::factory()->count(3)->create();

        $response = $this->get(route('restaurants.index'));

        $response->assertStatus(200);
        $response->assertViewHas('restaurants', function($viewRestaurants) use ($restaurants) {
            return $viewRestaurants->pluck('id')->toArray() === $restaurants->pluck('id')->toArray();
        });
    }

    /** @test */
    public function it_shows_tables_for_a_restaurant()
    {
        $restaurant = Restaurant::factory()->create();
        $tables = Table::factory()->count(3)->create(['restaurant_id' => $restaurant->id]);

        $response = $this->get(route('tables.index', $restaurant->id));

        $response->assertStatus(200);
        $response->assertViewHas('tables', function($viewTables) use ($tables) {
            return $viewTables->pluck('id')->toArray() === $tables->pluck('id')->toArray();
        });
    }

    /** @test */
    public function it_shows_active_tables_grouped_by_dining_area()
    {
        $restaurant = Restaurant::factory()->create();
        $diningArea = DiningArea::factory()->create();
        $table = Table::factory()->create(['restaurant_id' => $restaurant->id, 'dining_area_id' => $diningArea->id, 'active' => true]);

        $response = $this->get(route('tables.active', $restaurant->id));

        $response->assertStatus(200);
        $response->assertViewHas('activeTables');
    }
}
