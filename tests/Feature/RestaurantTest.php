<?php

namespace Tests\Unit;

use App\Models\Restaurant;
use App\Models\Table;
use App\Models\DiningArea;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RestaurantTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_restaurant_can_have_many_tables()
    {
        $restaurant = Restaurant::factory()->create();
        $table1 = Table::factory()->create(['restaurant_id' => $restaurant->id]);
        $table2 = Table::factory()->create(['restaurant_id' => $restaurant->id]);

        $this->assertCount(2, $restaurant->tables);
    }

    /** @test */
    public function a_restaurant_can_have_many_dining_areas()
    {
        $restaurant = Restaurant::factory()->create();
        $diningArea1 = DiningArea::factory()->create();
        $diningArea2 = DiningArea::factory()->create();

        $restaurant->diningAreas()->attach([$diningArea1->id, $diningArea2->id]);

        $this->assertCount(2, $restaurant->diningAreas);
    }
}
