<?php

namespace Database\Factories;

use App\Models\Destination;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Services\TagService;


class DestinationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Destination::class;

    public function tags()
    {
        $tags_array = ['Hiking', 'Beach', 'diving', 'sightseeing', 'adventure', 'biking', 'kayaking', 'rafting', 'fishing', 'camping', 'skiing', 'biking', 'rock climbing', 'swiming'];

        $tag_key = array_rand($tags_array, mt_rand(2, 5));

        $tags = [];

        foreach ($tag_key as $tag) {
            array_push($tags, $tags_array[$tag]);
        }

        return $tags;
    }



    public function definition()
    {


        $paragraphs = $this->faker->paragraphs(rand(7, 15));
        $locations = ['Indonesia', 'Thailand', 'Canada', 'France', 'Germany', 'USA', 'Japan', 'Korea'];

        $location = $locations[array_rand($locations)];

        $name =  $location  . ' ' . $this->faker->sentence(rand(4, 6));

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

    public function configure()
    {
        return $this->afterCreating(function (Destination $destination) {
            $url = 'https://source.unsplash.com/1600x900/?' . $destination->location . ',landscape';

            $destination
                ->addMediaFromUrl($url)
                ->toMediaCollection();

            $tagService = new TagService();

            $tags = implode(",", $this->tags());

            $tagService->store($tags, $destination->id);
        });
    }
}
