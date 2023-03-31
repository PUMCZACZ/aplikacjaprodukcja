<?php
namespace Database\Factories;

use App\CompanyTagEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
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
            'tag'             => CompanyTagEnum::RAWMATERIALSUPLIER,
            'phone'           => fake()->number(),
        ];
    }
}
