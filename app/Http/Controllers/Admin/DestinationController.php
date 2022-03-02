<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDestinationRequest;
use App\Http\Requests\UpdateDestinationRequest;

use App\Models\Destination;

use App\Services\ImageService;
use App\Services\TagService;
use Illuminate\Http\Request;

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

        $this->authorize('index', Destination::class);


        $destination = Destination::orderBy('id', 'desc')->paginate(10);

        return view('admin.destinations.index', [
            'destinations' => $destination
        ]);
    }

    public function create()
    {
        $this->authorize('create', Destination::class);

        return view('admin.destinations.create');
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

        toast('destination has been successfully saved', 'success');


        return redirect(route('destination.index'));
    }



    public function edit(Destination $destination)
    {
        $this->authorize('edit', Destination::class);

        return view('admin.destinations.edit', compact('destination'));
    }

    public function update(UpdateDestinationRequest $request, Destination $destination)
    {
        $validated = $request->safe();

        $destination->update(array_filter($validated->except(['tags', 'images'])));

        $this->tagService->store($request->tags, $destination->id);


        if ($request->hasFile('images')) {
            $this->imageService->upload($request->images, $destination);
        }

        toast('Your destination has been successfully updated', 'success');


        return redirect(route('destination.show', $destination->slug))->with('success', 'updated successfully!');
    }

    public function destroy(Destination $destination)
    {
        $destination->delete();

        toast('Destination has been successfully deleted', 'success');

        return redirect(route('destination.index'));
    }

    public function deleteImage(Destination $destination, $image_id)
    {
        $destination->deleteMedia($image_id);

        return view('admin.destinations.show', compact('destination'));
    }


    public function uploadImage(Request $request)
    {

        if ($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename . '_' . time() . '.' . $extension;

            //Upload File
            $request->file('upload')->storeAs('public/uploads', $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/' . $filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }
}
