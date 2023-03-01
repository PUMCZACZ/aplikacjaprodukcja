<?php
namespace Database\Factories;

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
            'name'           => fake()->name,
            'lastname'       => fake()->lastName(),
            'type_of_client' => 22,
            'status'         => 1,
            'comments'       => fake()->paragraph(),
        ];
    }
}
