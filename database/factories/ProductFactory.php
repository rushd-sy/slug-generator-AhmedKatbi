<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph(),
            'number_of_pieces' => $this->faker->numberBetween(1, 12),
            'size_or_weight' => $this->faker->randomElement(['500g', '1kg', 'Large', 'Medium']),
            'price' => $this->faker->randomFloat(2, 10, 500), 
            'stock_quantity' => $this->faker->numberBetween(0, 10),
            'image_path' => 'products/' . $this->faker->image(null, 640, 480, null, false), 
        ];
    }
}