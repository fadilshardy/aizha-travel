<?php


namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $destination = Destination::latest()->take(6)->get();

        return view('home', [
            'destinations' => $destination,
        ]);
    }
}
