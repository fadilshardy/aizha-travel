@extends('layouts.app')
@include('layouts.header')
@section('content')
<div class="container w-full h-full mx-auto ">
    <section class="pt-8 text-center lg:text-left">
        <div class="max-w-screen-xl px-4 py-16 mx-auto sm:px-6 lg:px-8 lg:items-end lg:justify-between lg:flex">
            <div class="max-w-xl mx-auto lg:ml-0">
                <h1 class="text-sm font-medium tracking-widest text-teal-600 uppercase">
                    Go Adventure.
                </h1>

                <h2 class="mt-2 text-3xl font-bold sm:text-4xl">
                    Seek Your Own Journey.
                </h2>
            </div>

            <p class="max-w-xs mx-auto mt-4 text-gray-700 lg:mt-0 lg:mr-0">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi consequatur tempore culpa officiis
            </p>
        </div>
    </section>
    <div class="px-12 md:px-6 xl:px-0">
        <div class="relative w-full ">
            <form action="{{ route('user.destination.search') }}" method="GET">
                <svg class="pointer-events-none absolute inset-y-0 left-0 h-full w-8 stroke-gray-400 pl-2.5" viewBox="0 0 256 256" aria-hidden="true">
                    <circle cx="116" cy="116" r="84" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></circle>
                    <line x1="175.4" y1="175.4" x2="224" y2="224" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line>
                </svg>
                <label for="search-basic" class="sr-only">Search Destinations...</label>

                <input id="search-basic" type="search" placeholder="Search Destinations..." name="search" class="block w-full py-4 pl-10 transition border-gray-200 rounded-md md:py-8 text-md focus:border-teal-600 focus:ring-teal-600 disabled:cursor-not-allowed disabled:bg-gray-200 disabled:opacity-75">
            </form>

        </div>
    </div>

    @if($destinations->isNotEmpty())
    <section class="p-10 px-5 mx-auto md:py-20 md:p-10 md:px-0">
        <section class="grid grid-cols-1 gap-10 md:grid-cols-2 xl:grid-cols-3">
            @foreach($destinations as $destination)
            @include('home.partials.destinations')
            @endforeach
        </section>

        <div class="flex justify-center py-3">
            <div class="w-full mx-4">
                {!! $destinations->links() !!}
            </div>
        </div>
    </section>
    @else
    <div class="flex items-center py-12 text-center h-1/2">
        <span class="w-full px-8 text-2xl font-semibold xl:text-4xl lg:text-3xl">Sorry no destinations matched your criteria... 😔</span>
    </div>
    @endif

    <section class="p-10 px-5 mx-auto md:py-20 md:p-10 md:px-0">
        <div class="relative mb-8 text-center">
            <span class="absolute inset-x-0 h-px -translate-y-1/2 bg-black/10 top-1/2"></span>

            <h2 class="relative inline-block px-4 text-2xl font-bold text-center bg-white">
                Top Locations
            </h2>
        </div>
        <section class="grid grid-cols-1 gap-10 md:grid-cols-2 xl:grid-cols-3">
            @foreach($locations as $location)
            <div class="relative w-full cursor-pointer hover:-translate-y-1 group">
                <div class="absolute top-0 left-0 w-full h-full opacity-80 bg-gradient-to-t from-black"></div>
                <img class="rounded-lg shadow-xl hover:shadow-2xl" src="{{$location->getImageUrl()}}" />
                <div class="absolute flex justify-center w-full px-4 -mt-20 text-lg text-white">
                    <div class="truncate">
                        <span class="text-xl font-black tracking-wide capitalize ">{{$location->location}}</span>
                    </div>
                </div>
            </div>
            @endforeach

        </section>
    </section>
</div>
@endsection
