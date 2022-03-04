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
        $name = $this->faker->sentence(rand(4, 6));
        $paragraphs = $this->faker->paragraphs(rand(7, 15));
        $location = $this->faker->country();
        $description = '';

        foreach ($paragraphs as $para) {
            $description .= "<p>{$para}</p>";
        }


        return [
            'name' => $name,
            'slug' => Str::slug($name, '-'),
            'description' => $description,
            'summary' => $this->faker->paragraphs(1, true),
            'price' => $this->faker->numberBetween(15, 100),
            'total_days' => $this->faker->numberBetween(5, 25),
            'location' => $location,
        ];
    }

    // public function configure()
    // {
    //     // return $this->afterCreating(function (Destination $destination) {
    //     //     $url = 'https://source.unsplash.com/collection/3813068/1920x1080/?' . $this->faker->numberBetween();

    //     //     $destination
    //     //         ->addMediaFromUrl($url)
    //     //         ->toMediaCollection();
    //     // });
    // }
}
