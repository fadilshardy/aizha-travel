@extends('layouts.app')
@extends('layouts.header')
@section('content')

{{-- hero image --}}
<div class="relative w-full">
    <div class="absolute top-0 left-0 w-full h-full bg-blue-500 opacity-40">
    </div>
    <div class="absolute top-0 left-0 flex flex-col items-center justify-center w-full h-full">
        <div class="text-6xl font-bold text-white">Make Youre Trip Fun & Noted</div>
        <div class="mt-2 text-2xl text-white">Travel has helped us to understand the meaning of life and it has helped us become better people. each time we travel, we see the world with new eyes</div>
        <button class="p-4 mt-5 font-semibold tracking-wider text-white bg-yellow-500 rounded-full">Explore More</button>
    </div>
    <img src="images/header.jpg" alt="" class="object-cover w-full max-h-screen">
    <div class="absolute bottom-0 left-0 w-full">
        <form action="" class="">
            <div class="flex gap-12 p-4 m-12 bg-gray-200 rounded-lg shadow-lg">
                <div class="relative flex items-center w-full h-16">
                    <input type="search" name="search" placeholder="Destination" class="w-full h-full p-4 text-lg bg-gray-100 rounded-lg">
                    <button type="submit" class="absolute top-0 right-0 flex items-center mt-4 mr-4">
                        <label for="searchBox" class="text-2xl text-gray-500 fas fa-map-marked-alt hover:text-yellow-500"></label>
                    </button>
                </div>
                <div class="relative flex items-center w-full h-16">
                    <input type="search" name="search" placeholder="Start Of Date" class="w-full h-full p-4 text-lg bg-gray-100 rounded-lg">
                    <button type="submit" class="absolute top-0 right-0 flex items-center mt-4 mr-4">
                        <label for="searchBox" class="text-2xl text-gray-500 far fa-calendar hover:text-yellow-500"></label>
                    </button>
                </div>
                <div class="relative flex items-center w-full h-16">
                    <input type="search" name="search" placeholder="End Of Date" class="w-full h-full p-4 text-lg rounded-lg bg-gray-50">
                    <button type="submit" class="absolute top-0 right-0 flex items-center mt-4 mr-4">
                        <label for="searchBox" class="text-2xl text-gray-500 fas fa-calendar hover:text-yellow-500"></label>
                    </button>
                </div>
                <button class="w-1/3 text-lg font-light tracking-wider text-white bg-yellow-500 rounded-lg">Submit</button>
            </div>
        </form>

    </div>
</div>

@endsection
