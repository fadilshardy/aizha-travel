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


        $paragraphs = $this->faker->paragraphs(rand(7, 15));

        $locations = ['Indonesia', 'Thailand', 'Canada', 'France', 'Germany', 'USA', 'Japan', 'Korea'];

        $location = $locations[array_rand($locations)];

        $name =  $location  . ' ' . $this->faker->sentence(rand(4, 6));

        $description = '';

        $url_architecture = 'https://source.unsplash.com/1600x900/?' . $location . ',landscape,architecture';


        $url_sea =  'https://source.unsplash.com/1600x900/?' . $location . ',landscape,sea';

        $images = '
        <section class="pb-2">
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

        foreach ($paragraphs as $para) {
            $description .= "<p>{$para}</p>";
        }
        $plans = '                    <section>
        <ul class="border-l border-gray-300">
            <li>
                <div class="flex items-center pt-3 flex-start">
                    <div class="w-2 h-2 mr-3 -ml-1 bg-gray-300 rounded-full"></div>
                    <p class="text-sm text-gray-500">DAY 1</p>
                </div>
                <div class="mt-0.5 ml-4 mb-6">
                    <h4 class="text-gray-800 font-semibold text-xl mb-1.5">Title of section 1</h4>
                    <p class="mb-3 text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula.</p>
                </div>
            </li>
            <li>
                <div class="flex items-center pt-2 flex-start">
                    <div class="w-2 h-2 mr-3 -ml-1 bg-gray-300 rounded-full"></div>
                    <p class="text-sm text-gray-500">DAY 2</p>
                </div>
                <div class="mt-0.5 ml-4 mb-6">
                    <h4 class="text-gray-800 font-semibold text-xl mb-1.5">Title of section 2</h4>
                    <p class="mb-3 text-gray-500">Libero expedita explicabo eius fugiat quia aspernatur autem laudantium error architecto recusandae natus sapiente sit nam eaque, consectetur porro molestiae ipsam an deleniti.</p>
                </div>
            </li>
            <li>
                <div class="flex items-center pt-2 flex-start">
                    <div class="w-2 h-2 mr-3 -ml-1 bg-gray-300 rounded-full"></div>
                    <p class="text-sm text-gray-500">DAY 3</p>
                </div>
                <div class="mt-0.5 ml-4 pb-5">
                    <h4 class="text-gray-800 font-semibold text-xl mb-1.5">Title of section 3</h4>
                    <p class="mb-3 text-gray-500">Voluptatibus temporibus esse illum eum aspernatur, fugiat suscipit natus! Eum corporis illum nihil officiis tempore. Excepturi illo natus libero sit doloremque, laborum molestias rerum pariatur quam ipsam necessitatibus incidunt, explicabo.</p>
                </div>
            </li>
        </ul>
    </section>';

        $description .= $plans;


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
