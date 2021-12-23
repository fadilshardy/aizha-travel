@extends('layouts.app')
@include('layouts.header')
@section('content')

@include('home.partials.hero')
{{-- hero image --}}
{{-- <div class="relative w-full">
    <div class="absolute top-0 left-0 w-full h-full bg-blue-500 opacity-40">
    </div>
    <div class="absolute top-0 left-0 flex flex-col items-center justify-center w-full h-full">
        <div class="text-6xl font-bold text-white ">Make Youre Trip Fun & Noted</div>
        <div class="mt-2 text-2xl text-white ">Travel has helped us to understand the meaning of life and it has helped us become better people. each time we travel, we see the world with new eyes</div>
        <button class="p-4 mt-5 font-semibold tracking-wider text-white rounded-full bg-amber-500 hover:bg-amber-400">Explore More</button>
    </div>
    <img src="{{ asset('images/header.jpg')}}" alt="" class="object-cover w-full max-h-screen">
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
</div> --}}



<div class="container w-full h-full mx-auto ">
    <div class="flex flex-col items-center pt-4">
        <h1 class="text-4xl font-semibold">Destinations</h1>
        <span class="font-light ">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum, quis.</span>
    </div>

    <section class="container p-10 px-5 mx-auto md:py-20 md:p-10 md:px-0">
        <section class="grid grid-cols-1 gap-10 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-3">
            @foreach($destinations as $destination)
            @include('home.partials.destinations')
            @endforeach
        </section>
    </section>
    <div class="bg-white">
        <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
            <div class="grid gap-10 lg:grid-cols-2">
                <div class="flex flex-col justify-center md:pr-8 xl:pr-0 lg:max-w-lg">
                    <div class="flex items-center justify-center w-16 h-16 mb-4 rounded-full bg-teal-accent-400">
                        <svg class="text-teal-900 w-7 h-7" viewBox="0 0 24 24">
                            <polyline fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" points=" 8,5 8,1 16,1 16,5" stroke-linejoin="round"></polyline>
                            <polyline fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" points="9,15 1,15 1,5 23,5 23,15 15,15" stroke-linejoin="round"></polyline>
                            <polyline fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" points="22,18 22,23 2,23 2,18" stroke-linejoin="round"></polyline>
                            <rect x="9" y="13" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" width="6" height="4" stroke-linejoin="round"></rect>
                        </svg>
                    </div>
                    <div class="max-w-xl mb-6">
                        <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl sm:leading-none">
                            Let us handle<br class="hidden md:block" />
                            your next
                            <span class="inline-block text-4xl text-deep-purple-accent-400">destination</span>
                        </h2>
                        <p class="text-base text-gray-700 md:text-lg">
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae. explicabo.
                        </p>
                    </div>
                    <div>
                        <a href="/" aria-label="" class="inline-flex items-center font-semibold transition-colors duration-200 text-deep-purple-accent-400 hover:text-deep-purple-800">
                            Learn more
                            <svg class="inline-block w-3 ml-2" fill="currentColor" viewBox="0 0 12 12">
                                <path d="M9.707,5.293l-5-5A1,1,0,0,0,3.293,1.707L7.586,6,3.293,10.293a1,1,0,1,0,1.414,1.414l5-5A1,1,0,0,0,9.707,5.293Z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="flex items-center justify-center -mx-4 lg:pl-8">
                    <div class="flex flex-col items-end px-3">
                        <img class="object-cover mb-6 rounded shadow-lg h-28 sm:h-48 xl:h-56 w-28 sm:w-48 xl:w-56" src="https://images.pexels.com/photos/3184287/pexels-photo-3184287.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=750&amp;w=1260" alt="" />
                        <img class="object-cover w-20 h-20 rounded shadow-lg sm:h-32 xl:h-40 sm:w-32 xl:w-40" src="https://images.pexels.com/photos/3182812/pexels-photo-3182812.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=750&amp;w=1260" alt="" />
                    </div>
                    <div class="px-3">
                        <img class="object-cover w-40 h-40 rounded shadow-lg sm:h-64 xl:h-80 sm:w-64 xl:w-80" src="https://images.pexels.com/photos/3182739/pexels-photo-3182739.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;w=500" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('home.partials.steps')


    @include('home.partials.teams')

    @include('layouts.footer')

</div>






@endsection
