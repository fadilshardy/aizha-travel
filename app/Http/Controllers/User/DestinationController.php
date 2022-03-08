<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\Session;

class DestinationController extends Controller
{

    public function index()
    {
        $destinations = Destination::orderBy('id', 'desc')->paginate(9);

        $locations = Destination::all()->random(6);

        return view('user.destinations.index', [
            'destinations' => $destinations,
            'locations' => $locations,
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $destinations = Destination::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('location', 'LIKE', "%{$search}%")
            ->paginate(9);

        $locations = Destination::all()->random(6);

        Session::flash('message', 'name (' . $destinations->count() . ') ');


        return view('user.destinations.index', [
            'destinations' => $destinations,
            'locations' => $locations,
        ]);
    }

    public function location($location)
    {
        $destinations = Destination::where('location', $location)->paginate(9);

        $locations = Destination::all()->random(6);

        Session::flash('message', 'location: ' . $location  . ' (' . $destinations->count() . ') ');


        return view('user.destinations.index', [
            'destinations' => $destinations,
            'locations' => $locations,
        ]);
    }

    public function tag(Tag $tag)
    {
        $destinations = $tag->destinations()->paginate(9);

        $locations = Destination::all()->random(6);

        Session::flash('message', 'tag: ' . $tag->name  . ' (' . $destinations->count() . ')');

        return view('user.destinations.index', [
            'destinations' => $destinations,
            'locations' => $locations
        ]);
    }

    public function show(Destination $destination)
    {
        return view(
            'user.destinations.show',
            compact('destination')
        );
    }
}
