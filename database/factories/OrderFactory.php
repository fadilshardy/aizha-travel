<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Order::class;




    public function definition()
    {
        return [

            'note' => $this->faker->paragraph()
        ];
    }
}
