<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Title' => $this->faker->title(),
            'Valeur' => $this->faker->randomNumber(),
            'Module' =>$this->faker->numberBetween(2,11),
            'Etudiant' =>$this->faker->numberBetween(1,10)

        ];
    }
}
