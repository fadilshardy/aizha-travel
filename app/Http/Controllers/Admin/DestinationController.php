<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDestinationRequest;
use App\Http\Requests\UpdateDestinationRequest;

use App\Models\Destination;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $destination = Destination::all();

        return view('destinations.index', [
            'destinations' => $destination
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('destinations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDestinationRequest $request)
    {
        $validated = $request->validated();

        $destination = Destination::create($validated);

        if ($request->hasFile('images')) {
            $destination
                ->addMultipleMediaFromRequest(['images'])
                ->each(function ($image) {
                    $image->toMediaCollection();
                });
        }

        return redirect(route('destination.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function show(Destination $destination)
    {

        // $destination->deleteMedia(15);

        return view('destinations.show', compact('destination'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function edit(Destination $destination)
    {
        return view('destinations.edit', compact('destination'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDestinationRequest $request, Destination $destination)
    {
        $validated = $request->validated();

        $destination->update(array_filter($validated));

        if ($request->hasFile('images')) {
            $destination
                ->addMultipleMediaFromRequest(['images'])
                ->each(function ($image) {
                    $image->toMediaCollection();
                });
        }

        return redirect(route('destination.show', $destination->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destination $destination)
    {
        $destination->delete();

        return view('destinations.index');
    }

    public function delete_image(Destination $destination, $image_id)
    {
        $destination->deleteMedia($image_id);

        return view('destinations.show', compact('destination'));
    }
}
