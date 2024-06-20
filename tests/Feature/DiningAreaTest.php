<?php

namespace Tests\Unit;

use App\Models\DiningArea;
use App\Models\Restaurant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DiningAreaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_dining_area_can_have_many_restaurants()
    {
        $diningArea = DiningArea::factory()->create();
        $restaurant1 = Restaurant::factory()->create();
        $restaurant2 = Restaurant::factory()->create();

        $diningArea->restaurants()->attach([$restaurant1->id, $restaurant2->id]);

        $this->assertCount(2, $diningArea->restaurants);
    }
}
