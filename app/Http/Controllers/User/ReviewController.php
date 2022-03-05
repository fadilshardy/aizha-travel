<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Models\Review;
use App\Models\Destination;

class ReviewController extends Controller
{

    public function store(StoreReviewRequest $request, Destination $destination)
    {
        $validated = $request->validated();

        if (Review::where('user_id', $request->user_id)->where('destination_id', $destination->id)->exists()) {

            toast('You already have a review for this destination', 'error');

            return redirect()->route('user.destination.show', $destination->slug . '#reviews');
        }

        Review::create($validated);

        toast('Your review has been successfully saved', 'success');

        return redirect()->route('user.destination.show', $destination->slug . '#reviews');
    }
}
