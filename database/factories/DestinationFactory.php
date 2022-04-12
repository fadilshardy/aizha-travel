<?php

namespace Database\Factories;

use App\Models\Destination;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Services\TagService;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\TransferStats;
use  GuzzleHttp\Client;
use Monolog\Logger;


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

    public function getImgUrl($request)
    {

        $response = Http::get($request);

        $url = $response->transferStats->getHandlerStat('url');

        return $url;
    }



    public function definition()
    {



        $locations = ['Indonesia', 'Thailand', 'Canada', 'France', 'Germany', 'USA', 'Japan', 'Korea'];

        $location = $locations[array_rand($locations)];

        $name =  $location  . ' ' . $this->faker->sentence(rand(4, 6));

        $total_days = $this->faker->numberBetween(3, 7);

        $description = '';

        $url_architecture = 'https://source.unsplash.com/1600x900/?' . $location . ',landscape,architecture';


        $url_sea =  'https://source.unsplash.com/1600x900/?' . $location . ',landscape,sea';


        $images = '
        <section class="pb-2">
            <h3 class="ml-1 font-extrabold text-teal-900">Gallery</h3>

            <div class="flex flex-row w-full space-x-2">
                <div class="w-1/2 overflow-hidden rounded-lg">
                    <img alt="' . $name . '" class="w-full transition-all duration-500 ease-in-out transform bg-cover hover:scale-125" src="' . $this->getImgUrl($url_architecture) . '">
                </div>
                <div class="w-1/2 overflow-hidden rounded-lg">
                    <img "' . $name . '" class="w-full transition-all duration-500 ease-in-out transform bg-cover hover:scale-125" src="' .   $this->getImgUrl($url_sea) . '">
                </div>
            </div>
         </section>
    ';

        $description .= $images;



        $paragraphs = $this->faker->paragraphs(rand(7, 15));

        $overview = '';

        foreach ($paragraphs as $para) {
            $overview .= "<p>{$para}</p>";
        }
        $description .= '
        <hr>

        <section>
            <h3 class="ml-1 font-extrabold text-teal-900">Overview</h3>
            ' . $overview . '
        </section>
        ';





        $plan_list = '';

        for ($i = 1; $i <= $total_days; $i++) {
            $plan_list .= '      <li class="ml-2">
            <div class="relative flex items-center flex-start">
                <div class="absolute flex items-center justify-center w-4 h-4 mt-6 bg-teal-600 rounded-full -ml-7"></div>
                <h4 class="text-xl font-semibold text-gray-800 ">' . $this->faker->sentence(rand(3, 5), true) . '</h4>

            </div>
            <div>
                <span class="text-sm text-teal-600 font-semilight">Day ' . $i . '</span>
                <p class="mb-2 text-gray-700">' .  $this->faker->paragraphs(rand(1, 2), true) . '</p>
            </div>
        </li>';
        }


        $plans = ' 
        <hr>
        <section>
            <h3 class="ml-1 font-extrabold text-teal-900">Plans Day by Day</h3>                     
            <ol class="list-none border-l-2 border-teal-600">
            ' . $plan_list . '
            </ol>
        </section>

        ';

        $description .= $plans;

        return [
            'name' => $name,
            'slug' => Str::slug($name, '-'),
            'description' => $description,
            'summary' => $this->faker->paragraphs(1, true),
            'price' => $this->faker->numberBetween(15, 100),
            'total_days' => $total_days,
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
