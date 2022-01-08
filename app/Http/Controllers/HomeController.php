<?php


namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $destination = Destination::simplePaginate(6);

        return view('home', [
            'destinations' => $destination,
        ]);
    }
}
