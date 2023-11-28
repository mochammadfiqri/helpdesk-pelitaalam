<?php

namespace Database\Factories;

use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KnowledgeBase>
 */
class KnowledgeBaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = FakerFactory::create();
        return [
            'title'   => $faker->sentence,
            'type_id' => $faker->numberBetween(1, 5), // Sesuaikan dengan kebutuhan
            'details' => $faker->paragraph,
            'views'   => $faker->numberBetween(0, 500),
        ];
    }
}
