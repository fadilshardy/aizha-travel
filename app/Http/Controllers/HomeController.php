<?php


namespace App\Http\Controllers;

use App\Models\Destination;

class HomeController extends Controller
{
    public function index()
    {




        $locations = Destination::groupBy('location')
            ->selectRaw('count(*) as count, location')
            ->orderBy('count', 'desc')
            ->limit(6)
            ->pluck('count', 'location');



        $top_locations = collect();

        foreach ($locations as $name => $count) {
            $destination = Destination::where('location', $name)->withCount('orders')->orderBy('orders_count', 'desc')->first();

            $location = [
                'img_url' => $destination->getImageUrl(),
                'name' => $name,
                'destination_count' => $count
            ];
            $top_locations->add($location);
        }

        $top_destinations = Destination::withCount('orders')->orderBy('orders_count', 'desc')->paginate(10);


        $destinations = Destination::simplePaginate(6);

        return view('home', [
            'destinations' => $destinations,
            'top_destinations' => $top_destinations,
            'top_locations' => $top_locations,
        ]);
    }
}
