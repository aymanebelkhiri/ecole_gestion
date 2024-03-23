<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\groupes>
 */
class GroupeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $GroupeModel = Groupe::class;

    public function definition(): array
    {
        return [
            'Nom' =>$this->faker->numberBetween([101,102,103,104,105,106,201,202,203,204,205]),
            'Effectif' =>$this->faker->randomNumber(),
            'Filiére' =>$this->faker->numberBetween(1, 8)
        ];
    }
}
