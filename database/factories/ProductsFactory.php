<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'product_name' => fake()->name('shoes'),
            'categorys_id' => fake()->numberBetween(1, 10),
            'price' => fake()->numberBetween(10000, 99999),
            'description' => fake()->text(10),
            'picture' => fake()->image()
        ];
    }
}
