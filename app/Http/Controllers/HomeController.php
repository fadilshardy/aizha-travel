<?php


namespace App\Http\Controllers;

use App\Models\Destination;

class HomeController extends Controller
{
    public function index()
    {

        $destination = Destination::all();

        return view('home', [
            'destinations' => $destination
        ]);
    }
}
