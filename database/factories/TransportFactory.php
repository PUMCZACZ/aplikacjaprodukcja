<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transport>
 */
class TransportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_of_company' => fake()->company(),
            'type_of_product' => fake()->sentence(),
            'delivered_at' => fake()->dateTimeThisYear(),
            'product_amount' => fake()->numberBetween(1, 10000),
            'tag' => fake()->sentence(),
            'completed_at' => fake()->dateTimeThisMonth(),
        ];
    }
}
