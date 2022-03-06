<?php

namespace Database\Seeders;

use App\Models\Destination;
use App\Models\Review;
use App\Models\User;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Support\Carbon;

use Illuminate\Database\Seeder;


class DestinationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $destinations =  Destination::factory()->times(12)->create();

        $users = User::where('is_admin', false)->get();

        foreach ($destinations as $destination) {
            for ($i = 0; $i < rand(5, $users->count()); $i++) {
                $user = $users->random();
                if (Review::where([['user_id', $user->id], ['destination_id', $destination->id]])->exists()) {
                    continue;
                }

                Review::factory()->create(['destination_id' => $destination->id, 'user_id' => $user->id]);
            }
        }

        foreach ($destinations as $index => $destination) {
            for ($i = 0; $i < rand(5, $users->count()); $i++) {

                $user = $users->random();
                if (Order::where([['user_id', $user->id], ['destination_id', $destination->id]])->exists()) {
                    continue;
                }

                $orderService = new OrderService();

                $quantity = rand(1, 10);

                $start_date = Carbon::today()->addDays(rand(1, 14));
                $invoice_id =  Carbon::now()->format('dmY') + (rand(10, 1000));


                Order::factory()->create([
                    'destination_id' => $destination->id,
                    'user_id' => $user->id,
                    'total_days' => $destination->total_days,
                    'invoice_id' => $invoice_id,
                    'quantity' => $quantity,
                    'start_date' => $start_date,
                    'end_date' => $orderService->getEndDate($start_date, $quantity),
                    'total_amount' => $orderService->getTotalAmount($destination->price, $quantity),
                ]);
            }
        }
    }
}
