<?php

namespace Database\Factories;

use App\Models\DiningArea;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiningAreaFactory extends Factory
{
    protected $model = DiningArea::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}
