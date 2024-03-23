<?php
namespace Database\Factories;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;


class ModuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Generate a random image URL for testing
        $imageUrl = $this->faker->imageUrl(640, 480);

        // Alternatively, if you want to store actual image files for testing
        // You can use Laravel's storage facade to copy sample images to your storage directory
        // Make sure you have sample images in your storage directory
        // $imagePath = Storage::copy('path/to/sample/image.jpg', 'public/images');
        // $imageUrl = Storage::url($imagePath);

        return [
            'Nom' => $this->faker->randomElement(['Python', 'Java', 'C++', 'PHP', 'Front-end', 'Back-end', 'Soft skills', 'Cloud Native', 'Sécurité']),
            'MasseHoraire' => $this->faker->randomNumber(),
            'Coefficient' => $this->faker->numberBetween(1, 3),
            'description' => $this->faker->sentence(),
            'image_url' => $imageUrl, // Store the generated image URL
            'Filiére' => $this->faker->numberBetween(1, 10)
        ];
    }
}
