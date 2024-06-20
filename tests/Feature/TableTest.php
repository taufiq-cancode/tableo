<?php

namespace Tests\Unit;

use App\Models\Restaurant;
use App\Models\Table;
use App\Models\DiningArea;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TableTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_table_belongs_to_a_restaurant()
    {
        $restaurant = Restaurant::factory()->create();
        $table = Table::factory()->create(['restaurant_id' => $restaurant->id]);

        $this->assertEquals($restaurant->id, $table->restaurant->id);
    }

    /** @test */
    public function a_table_belongs_to_a_dining_area()
    {
        $diningArea = DiningArea::factory()->create();
        $table = Table::factory()->create(['dining_area_id' => $diningArea->id]);

        $this->assertEquals($diningArea->id, $table->diningArea->id);
    }
}
