<?php

namespace Database\Factories;

use App\Models\Etudiant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Etudiant>
 */
class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $EtudiantModel = Etudiant::class;
    public function definition(): array
    {
        return [
            'Matricule' =>$this->faker->randomNumber(),
            'Nom' =>$this->faker->firstName(),
            'Prenom' =>$this->faker->lastName(),
            'DateNaissance'=> $this->faker->date(),
            'Age' => $this->faker->randomNumber(),
            'Sexe' => $this->faker->randomElement(['Male','Female']),
            'Email' => $this->faker->safeEmail(),
            'Password' =>$this->faker->password(),
            'Groupe' =>$this->faker->numberBetween(1,10)
        ];
    }
}
