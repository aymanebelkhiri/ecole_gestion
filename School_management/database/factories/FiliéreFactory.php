<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Filiére>
 */
class FiliéreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Nom' =>$this->faker->randomElement(['developpement digital',
                                                 'infrastructure digital',
                                                 'Gestion des entreprise',
                                                 'Marketing digital',
                                                 'Commerce électronique',
                                                 'Intelligence artificiel',
                                                 'Médecine du travail',
                                                 'Mécanique énérgitique']),
            'Domaine' =>$this->faker->randomElement(['Informatique','Santé','Economie']),                                
            'Description' =>$this->faker->paragraph(4)
        ];
    }
}
