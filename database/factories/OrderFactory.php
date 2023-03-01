<?php
namespace Database\Factories;

use App\Models\Client;
use App\OrderTypeEnum;
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
            'order_type'   => OrderTypeEnum::BAG,
            'client_id'    => Client::factory(),
            'quantity'     => fake()->numberBetween(1, 1000),
            'weight'       => fake()->numberBetween(1, 1000),
            'price'        => null,
            'completed_at' => null,
            'deadline'     => fake()->dateTimeThisYear(),
        ];
    }
}
