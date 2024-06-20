<?php

namespace Database\Factories;

use App\Models\Table;
use Illuminate\Database\Eloquent\Factories\Factory;

class TableFactory extends Factory
{
    protected $model = Table::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'minimum_capacity' => $this->faker->numberBetween(1, 4),
            'maximum_capacity' => $this->faker->numberBetween(5, 10),
            'active' => $this->faker->boolean,
            'restaurant_id' => \App\Models\Restaurant::factory(),
            'dining_area_id' => \App\Models\DiningArea::factory(),
        ];
    }
}
