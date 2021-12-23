<?php

namespace Database\Seeders;

use App\Models\Destination;
use App\Models\Review;
use App\Models\User;
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
    }
}
