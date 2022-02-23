<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destination;


class DestinationController extends Controller
{

    public function index()
    {

        $destination = Destination::orderBy('id', 'desc')->paginate(9);

        return view('user.destinations.index', [
            'destinations' => $destination
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
