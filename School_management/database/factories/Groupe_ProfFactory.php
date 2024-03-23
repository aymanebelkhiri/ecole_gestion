<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\groupe_Prof>
 */
class Groupe_ProfFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Groupe' =>$this->faker->numberBetween(1,5),
            'Prof' =>$this->faker->numberBetween(1,5),
        ];
    }
}
