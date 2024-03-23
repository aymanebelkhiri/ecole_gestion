<?php

namespace Database\Factories;
use  App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $AdminModel = Admin::class;
    public function definition(): array
    {
        return [
            'Nom' =>$this->faker->lastName(),
            'Prenom' =>$this->faker->firstName(),
            'Email' =>$this->faker->safeEmail(),
            'Password' =>$this->faker->password()
        ];
    }
}
