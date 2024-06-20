<?php

namespace Tests\Feature;

use App\Models\DiningArea;
use App\Models\Restaurant;
use App\Models\Table;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TableControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_new_table()
    {
        $restaurant = Restaurant::factory()->create();
        $diningAreaName = 'Main Hall';
        
        $data = [
            'name' => 'Table 1',
            'minimum_capacity' => 2,
            'maximum_capacity' => 4,
            'active' => true,
            'restaurant_id' => $restaurant->id,
            'dining_area' => $diningAreaName,
        ];

        $response = $this->post(route('tables.store'), $data);

        $this->assertDatabaseHas('tables', ['name' => 'Table 1']);
        $this->assertDatabaseHas('dining_areas', ['name' => $diningAreaName]);

        $response->assertRedirect(route('tables.create'));
        $response->assertSessionHas('success', 'Table created successfully');
    }

    /** @test */
    public function it_gets_dining_areas_based_on_query()
    {
        $diningArea = DiningArea::factory()->create(['name' => 'Main Hall']);

        $response = $this->getJson(route('dining-areas.index', ['query' => 'Main']));

        $response->assertStatus(200);
        $response->assertJsonFragment(['name' => 'Main Hall']);
    }
}
