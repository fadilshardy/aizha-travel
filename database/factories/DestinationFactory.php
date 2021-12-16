<?php

namespace Database\Factories;

use App\Models\Destination;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DestinationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Destination::class;

    public function definition()
    {
        $name = $this->faker->sentences(rand(1, 2), true);
        return [
            'name' => $name,
            'slug' => Str::slug($name, '-'),
            'description' => $this->faker->paragraphs(rand(5, 8), true),
            'price' => $this->faker->numberBetween(15, 100),
            'location' => $this->faker->unique()->country(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Destination $destination) {
            $url = 'https://source.unsplash.com/1080x1920/?travel?' . $this->faker->numberBetween();

            $destination
                ->addMediaFromUrl($url)
                ->toMediaCollection();
        });
    }
}
