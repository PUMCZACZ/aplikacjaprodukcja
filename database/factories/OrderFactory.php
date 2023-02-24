<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name_of_company' => fake()->name(),
            'price'           => fake()->numberBetween(1 - 1200),
            'quantity'        => fake()->numberBetween(1 - 24),
            'arrived_at'      => now(),
        ];
    }
}
