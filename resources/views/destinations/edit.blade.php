@extends('layouts.app')
@extends('layouts.header')
@section('content')
<div class="container h-full pt-20 mx-auto">
    <div class="pt-5 mt-5 md:mt-0 md:col-span-2">
        <form action="{{route('destination.update', $destination->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 space-y-6 bg-white sm:p-6">
                    <div class="grid grid-cols-3 gap-6">
                        <div class=" sm:col-span-2">
                            <label for="company-website" class="block text-sm font-medium text-gray-700">
                                name
                            </label>
                            <div class="flex mt-1 rounded-md shadow-sm">
                                <input class="w-full h-12 px-4 mb-2 text-lg text-gray-700 placeholder-gray-400 border rounded-lg focus:shadow-outline" type="text" placeholder="{{$destination->name }}" name="name" value="{{$destination->name }}" />
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-6 ">
                        <div class=" sm:col-span-2">
                            <label for="company-website" class="block font-medium text-gray-700 text-md">
                                slug <span class="text-xs font-extralight">Slug is used for destination URL (current slug: {{$destination->slug}})</span>
                            </label>
                            <div class="flex mt-1 rounded-md shadow-sm">
                                <input class="w-full h-12 px-4 mb-2 text-lg text-gray-700 placeholder-gray-400 border rounded-lg focus:shadow-outline" type="text" placeholder="{{$destination->slug }}" name="slug" value="" />
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-6">
                        <div class=" sm:col-span-2">
                            <label for="company-website" class="block text-sm font-medium text-gray-700">
                                location
                            </label>
                            <div class="flex mt-1 rounded-md shadow-sm">
                                <input class="w-full h-12 px-4 mb-2 text-lg text-gray-700 placeholder-gray-400 border rounded-lg focus:shadow-outline" type="text" placeholder="Large input" name="location" value="{{$destination->location}}" />
                            </div>
                        </div>
                    </div>


                    <label for="company-website" class="block text-sm font-medium text-gray-700">
                        tags
                    </label>
                    <div class="flex mt-1 rounded-md shadow-sm">
                        <input class="w-full h-12 px-4 mb-2 text-lg text-gray-700 placeholder-gray-400 border rounded-lg focus:shadow-outline" type="text" placeholder="Large input" name="tags" value="@foreach ($destination->tags as $key=>$tag){{($key>0)?',':''}}{{$tag->name}}@endforeach " />
                    </div>
                    <p class="mt-2 text-sm text-gray-500">
                        Separate Tags by Coma "," ex: Swimming, Hicking
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-6">
                <div class=" sm:col-span-2">
                    <label for="company-website" class="block text-sm font-medium text-gray-700">
                        price
                    </label>
                    <div class="flex mt-1 rounded-md shadow-sm">
                        <input class="w-full h-12 px-4 mb-2 text-lg text-gray-700 placeholder-gray-400 border rounded-lg focus:shadow-outline" type="text" placeholder="Large input" name="price" value="{{$destination->price }}" />
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-6">
                <div class=" sm:col-span-2">
                    <label for="company-website" class="block text-sm font-medium text-gray-700">
                        duration
                    </label>
                    <div class="flex mt-1 rounded-md shadow-sm">
                        <input class="w-full h-12 px-4 mb-2 text-lg text-gray-700 placeholder-gray-400 border rounded-lg focus:shadow-outline" type="text" placeholder="Large input" name="duration" value="{{$destination->duration }}" />
                    </div>
                </div>
            </div>



            <div>
                <label for="about" class="block text-sm font-medium text-gray-700">
                    Description
                </label>
                <div class="mt-1">
                    <textarea id="about" name="description" rows="3" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="you@example.com"> {{$destination->description}}</textarea>
                </div>
                <p class="mt-2 text-sm text-gray-500">
                    Brief description for your profile. URLs are hyperlinked.
                </p>
            </div>


            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Cover photo
                </label>
                <div class="flex justify-center px-6 pt-5 pb-6 mt-1 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="file-upload" class="relative font-medium text-indigo-600 bg-white rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                <span>Upload a file</span>
                                <input id="file-upload" name="images[]" type="file" class="sr-only" multiple="multiple">

                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">
                            PNG, JPG, GIF up to 10MB
                        </p>
                    </div>
                </div>
            </div>
    </div>
    <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
        <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Save
        </button>
    </div>
</div>
</form>

<div class="flex gap-4 p-4">
    @foreach($destination->getMedia() as $image)
    <div class="bg-gray-100 rounded-lg">
        <p class="text-lg font-bold ">{{$image->name}}</p>
        <a href="{{$image->id}}"><img src="{{$image->getFullUrl()}}" alt=""></a>
    </div>
    @endforeach
</div>
</div>

@if ($errors->any())
<div class="">
    <ul>
        @foreach ($errors->all() as $error)
        <li class="w-64 p-2 mt-2 bg-red-400 rounded shadow-lg">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@endsection
