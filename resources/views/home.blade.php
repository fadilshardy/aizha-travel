@extends('layouts.app')
@extends('layouts.header')
@section('content')

{{-- hero image --}}
<div class="relative w-full">
    <div class="absolute top-0 left-0 w-full h-full bg-blue-500 opacity-40">
    </div>
    <div class="absolute top-0 left-0 flex flex-col items-center justify-center w-full h-full">
        <div class="text-6xl font-bold text-white ">Make Youre Trip Fun & Noted</div>
        <div class="mt-2 text-2xl text-white ">Travel has helped us to understand the meaning of life and it has helped us become better people. each time we travel, we see the world with new eyes</div>
        <button class="p-4 mt-5 font-semibold tracking-wider text-white rounded-full bg-amber-500 hover:bg-amber-400">Explore More</button>
    </div>
    <img src="images/header.jpg" alt="" class="object-cover w-full max-h-screen">
    <div class="absolute bottom-0 left-0 w-full">
        <form action="" class="">
            <div class="flex gap-12 p-4 m-12 bg-gray-200 rounded-lg shadow-lg">
                <div class="relative flex items-center w-full h-16">
                    <input type="search" name="search" placeholder="Destination" class="w-full h-full p-4 text-lg bg-gray-100 rounded-lg">
                    <button type="submit" class="absolute top-0 right-0 flex items-center mt-4 mr-4">
                        <label for="searchBox" class="text-2xl text-gray-500 fas fa-map-marked-alt hover:text-amber-500"></label>
                    </button>
                </div>
                <div class="relative flex items-center w-full h-16">
                    <input type="search" name="search" placeholder="Start Of Date" class="w-full h-full p-4 text-lg bg-gray-100 rounded-lg">
                    <button type="submit" class="absolute top-0 right-0 flex items-center mt-4 mr-4">
                        <label for="searchBox" class="text-2xl text-gray-500 far fa-calendar hover:text-amber-500"></label>
                    </button>
                </div>
                <div class="relative flex items-center w-full h-16">
                    <input type="search" name="search" placeholder="End Of Date" class="w-full h-full p-4 text-lg rounded-lg bg-gray-50">
                    <button type="submit" class="absolute top-0 right-0 flex items-center mt-4 mr-4">
                        <label for="searchBox" class="text-2xl text-gray-500 fas fa-calendar hover:text-amber-500"></label>
                    </button>
                </div>
                <button class="w-1/3 text-lg font-light tracking-wider text-white rounded-lg bg-amber-500 hover:bg-amber-400">Submit</button>
            </div>
        </form>

    </div>
</div>
<div class="container w-full h-full mx-auto ">
    <div class="flex flex-col items-center pt-4">
        <h1 class="text-4xl font-semibold">Destinations</h1>
        <span class="font-light ">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum, quis.</span>
    </div>

    <div class="flex flex-wrap justify-center gap-10 pt-4 pb-20">
        @foreach($destinations as $destination)
        <div class="w-96">
            <div class="relative overflow-hidden rounded-lg shadow-md pb-3/4">
                <a href="{{route('destination.show', $destination->id)}}">
                    <img src="{{$destination->getMedia()[0]->getUrl()}}" ;}}" alt="" class="absolute bottom-0 object-cover w-full h-full"></a>
            </div>
            <div class="relative px-4 -mt-16">
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <div class="flex items-baseline gap-2 text-sm text-gray-600">
                        <span class="truncate"> <i class="fas fa-map-marker-alt"></i> <a href="#" class="hover:text-amber-400">{{$destination->location}}</a> </span>
                        <span class="inline-block px-2 text-xs font-semibold tracking-wide uppercase rounded-full text-amber-700 bg-amber-200">New</span>
                    </div>
                    <p class="truncate"> <a class="mt-1 text-lg font-semibold leading-tight truncate hover:text-amber-400" href="{{route('destination.show', $destination->id)}}">{{$destination->name}}</a></p>
                    <div class="mt-1">
                        <span class="font-semibold tracking-wide text-amber-500"> ${{$destination->price}}
                        </span>
                        <span class="text-xs text-gray-600">/ Person</span>
                    </div>

                    <div class="mt-2">
                        <div class="hidden">{{$rating =  rand(3,5);}}</div>
                        @for ($i = 1; $i <= 5; $i++) <i class="fas fa-star {{ ($i <= $rating ) ? "text-amber-400" : 'text-gray-400';}}"></i> @endfor
                            <span class="ml-2 text-sm text-gray-600">(Based on {{rand(5, 1000);}} reviews)</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>




@endsection
