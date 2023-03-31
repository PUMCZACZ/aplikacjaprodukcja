<?php
namespace Database\Factories;

use App\ClientTypeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'           => fake()->firstName(),
            'lastname'       => fake()->lastName(),
            'city'           => fake()->city(),
            'type_of_client' => ClientTypeEnum::RETAILCLIENT,
            'phone_number'   => fake()->number(),
            'status'         => 1,
        ];
    }
}
