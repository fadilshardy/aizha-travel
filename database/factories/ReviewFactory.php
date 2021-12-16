<?php

namespace Database\Factories;

use App\Models\Review;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'rating' =>  rand(4, 5),
            'review' => $this->faker->paragraph()
        ];
    }
}
