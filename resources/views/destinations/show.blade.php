@extends('layouts.app')
@extends('layouts.header')
@section('content')
<div class="container h-full pt-20 mx-auto">
    <div class="p-10">
        <!--Card 1-->
        <div class="max-w-sm overflow-hidden rounded shadow-lg">
            <img class="w-full" src="/mountain.jpg" alt="Mountain">
            <div class="px-6 py-4">
                <div class="mb-2 text-xl font-bold">{{$destination->name}}</div>
                <p class="text-base text-gray-700">
                    {{$destination->description}} </p>
            </div>
            <div class="px-6 pt-4 pb-2">
                <span class="inline-block px-3 py-1 mb-2 mr-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-full">{{$destination->price}} / $</span>
                <span class="inline-block px-3 py-1 mb-2 mr-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-full">{{$destination->duration}} /days</span>
            </div>
        </div>
        <a href="{{route('destination.edit', $destination->id)}}" class="p-4 font-bold text-white bg-green-300 rounded-full shadow">Edit</a>

    </div>
    @foreach($destination->getMedia() as $image)
    <a href="{{$image->id}}"><img src="{{$image->getFullUrl()}}" alt=""></a>

    @endforeach
</div>
@endsection
