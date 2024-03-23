<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Events>
 */
class EventsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $EventModel = Events::class;
    public function definition(): array
    {
        return [
            'Title' =>$this->faker->sentence(),
            'Description' =>$this->faker->paragraph(),
            'Date' =>$this->faker->date(),
        ];
    }
}
