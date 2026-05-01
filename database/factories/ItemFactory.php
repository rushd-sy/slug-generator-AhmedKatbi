<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'price' => fake()->numberBetween(100, 1000),
            'stock flag' => fake()->boolean(),
            'image' => fake()->imageUrl(),
            'description' => fake()->text(),
        ];
    }
}
