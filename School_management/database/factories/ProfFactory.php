<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prof>
 */
class ProfFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Nom' =>$this->faker->firstName(),
            'Prenom' =>$this->faker->lastName(),
            'Sexe' =>$this->faker->randomElement(['Male','Female']),
            'Email' => $this->faker->unique->safeEmail(),
            'Password' =>$this->faker->password(),
            'Module' =>$this->faker->numberBetween(2,5)
        ];
    }
}
