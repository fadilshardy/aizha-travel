<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\StoreDestinationRequest;
use App\Http\Requests\UpdateDestinationRequest;

use App\Models\Destination;
use App\Models\Comment;
use App\Models\Review;
use App\Models\User;
use App\Services\ImageService;
use App\Services\TagService;


class DestinationController extends Controller
{

    protected $imageService;

    public function __construct(ImageService $imageService, TagService $tagService)
    {
        $this->imageService = $imageService;
        $this->tagService = $tagService;
    }

    public function index()
    {

        $destination = Destination::all();

        return view('destinations.index', [
            'destinations' => $destination
        ]);
    }

    public function create()
    {
        $this->authorize('create', Destination::class);

        return view('destinations.create');
    }

    public function store(StoreDestinationRequest $request)
    {
        $this->authorize('store', Destination::class);

        $validated = $request->safe();

        $destination = Destination::create($validated->except(['tags', 'images']));

        $this->tagService->store($request->tags, $destination->id);

        if ($request->hasFile('images')) {
            $this->imageService->upload($request->images, $destination);
        }

        return redirect(route('destination.index'));
    }

    public function show(Destination $destination)
    {
        return view('destinations.show', compact('destination'));
    }

    public function edit(Destination $destination)
    {
        $this->authorize('edit', Destination::class);


        return view('destinations.edit', compact('destination'));
    }

    public function update(UpdateDestinationRequest $request, Destination $destination)
    {
        $validated = $request->safe();

        $destination->update(array_filter($validated->except(['tags', 'images'])));

        $this->tagService->store($request->tags, $destination->id);


        if ($request->hasFile('images')) {
            $this->imageService->upload($request->images, $destination);
        }

        return redirect(route('destination.show', $destination->slug));
    }

    public function destroy(Destination $destination)
    {
        $destination->delete();

        return redirect(route('destination.index'));
    }

    public function deleteImage(Destination $destination, $image_id)
    {
        $destination->deleteMedia($image_id);

        return view('destinations.show', compact('destination'));
    }

    public function storeReview(StoreReviewRequest $request, Destination $destination)
    {

        $validated = $request->validated();
        Review::create($validated);

        return redirect()->route('destination.show', $destination->slug);
    }
}
