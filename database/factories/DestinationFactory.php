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
        return [
            'name' => $this->faker->address('city'),
            'slug' => $this->faker->unique()->address(),
            'description' => $this->faker->text('200'),
            'price' => $this->faker->randomNumber(2),
            'location' => $this->faker->unique()->address(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Destination $destination) {
            $url = 'https://source.unsplash.com/random/1200x800';
            $destination
                ->addMediaFromUrl($url)
                ->toMediaCollection();
        });
    }
}
