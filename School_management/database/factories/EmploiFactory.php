<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use App\Models\Emploi;

class EmploiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Emploi::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        return [
            'module' => $faker->numberBetween(1,10),
            'prof' => $faker->numberBetween(1,10),
            'filiere' => $faker->numberBetween(1,10),
            'salleNum' => $faker->randomNumber(3),
            'day' => $faker->dayOfWeek(),
            'startTime' => $faker->time('H:i'),
            'endTime' => $faker->time('H:i'),
        ];
    }
}
