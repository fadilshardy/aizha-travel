@extends('layouts.app')
@include('layouts.header')
@section('content')


<main class="pb-12 bg-indigo-50 pt-18">
    <div class="relative w-full shadow-sm ">
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-t from-black opacity-60"></div>
        <div class="absolute top-0 left-0 flex flex-col items-center justify-center w-full h-full ">
            <div class="text-4xl font-bold tracking-wide text-center text-white capitalize lg:text-6xl md:text-5xl">
                {{$destination->name}}
            </div>

            <div class="flex items-center gap-2 pt-3 text-lg tracking-wide text-white capitalize">
                <nav class="text-sm">
                    <ol class="flex items-center">
                        <li class="inline-flex items-center">
                            <a href="" class="underline">
                                Home
                            </a>
                            <span class="px-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </li>


                        <li class="hidden sm:inline-flex sm:items-center">
                            <a href="/" class="underline">destinations</a>

                            <span class="px-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </li>

                        <li>
                            Current Page
                        </li>
                    </ol>
                </nav>
                {{-- <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                {{$destination->location}} --}}
            </div>
        </div>
        <div class="w-auto h-[30rem] bg-red-600">
            <img src="{{$destination->getImageUrl()}}" class="object-cover object-top w-full h-full rounded shadow-lg">
        </div>
    </div>

    <div class="container relative flex flex-wrap justify-center px-4 mx-auto lg:flex-nowrap -mt-28 z-999">

        <!-- Main content -->
        <div class="w-full xl:w-6/12 lg:w-9/12 xl:ml-6 lg:mr-6">

            <!-- post view -->
            <div class="overflow-hidden bg-white rounded-lg shadow-sm">

                <div class="p-4 pb-5">
                    <h2 class="block text-4xl font-black tracking-wide text-gray-700 capitalize md:break-all">
                        {{$destination->name}}
                    </h2>

                    <div class="flex flex-col mt-4 text-sm font-bold tracking-wide text-gray-600 uppercase gap-y-2">
                        <div class="flex justify-between">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{$destination->location}}
                            </div>
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{$destination->total_days}} Days
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                ${{$destination->price}}
                                / person
                            </div>

                            <div class="flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                </svg>
                                {{$destination->getAvgRating()}} ({{$destination->getTotalReviews()}} reviews)
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap items-center gap-2 mt-5">
                        <a href="#" class="px-3 py-1 text-sm transition border border-gray-200 rounded-sm hover:bg-teal-500 hover:text-white">Beauti</a>
                        <a href="#" class="px-3 py-1 text-sm transition border border-gray-200 rounded-sm hover:bg-teal-500 hover:text-white">Sports</a>
                        <a href="#" class="px-3 py-1 text-sm transition border border-gray-200 rounded-sm hover:bg-teal-500 hover:text-white">Business</a>
                    </div>



                    <section class="pt-2 prose text-gray-600 prose-slate">
                        {!! $destination->description!!}


                    </section>
                </div>
            </div>


            <div class="mt-8">
                @if($destination->userReview->isEmpty())
                @include('destinations.partials.review_form')
                @endif
            </div>

            <!-- reviews -->
            <div class="p-4 mt-4 bg-white rounded-sm shadow-sm">
                @include('destinations.partials.reviews')
            </div>

        </div>

        <!-- right sidebar -->
        <div class="w-full mt-8 lg:w-3/12 lg:-mt-16">
            @include('destinations.partials.order_form')


            <!-- Popular posts -->
            <div class="w-full p-4 mt-8 rounded-sm shadow-sm ">
                <h3 class="mb-3 text-3xl font-bold text-center text-gray-700">Related Destinations</h3>
                @include('destinations.partials.related_destinations')
            </div>

            <!-- tag -->
            <!-- categories -->
            <div class="w-full p-4 mt-8 bg-white rounded-sm shadow-sm">
                <h3 class="mb-3 text-xl font-semibold text-gray-700 font-roboto">Tags</h3>
                <div class="flex flex-wrap items-center gap-2">
                    <a href="#" class="px-3 py-1 text-sm transition border border-gray-200 rounded-sm hover:bg-blue-500 hover:text-white">Beauti</a>
                    <a href="#" class="px-3 py-1 text-sm transition border border-gray-200 rounded-sm hover:bg-blue-500 hover:text-white">Sports</a>
                    <a href="#" class="px-3 py-1 text-sm transition border border-gray-200 rounded-sm hover:bg-blue-500 hover:text-white">Business</a>
                    <a href="#" class="px-3 py-1 text-sm transition border border-gray-200 rounded-sm hover:bg-blue-500 hover:text-white">Politics</a>
                    <a href="#" class="px-3 py-1 text-sm transition border border-gray-200 rounded-sm hover:bg-blue-500 hover:text-white">Computer</a>
                    <a href="#" class="px-3 py-1 text-sm transition border border-gray-200 rounded-sm hover:bg-blue-500 hover:text-white">Coding</a>
                    <a href="#" class="px-3 py-1 text-sm transition border border-gray-200 rounded-sm hover:bg-blue-500 hover:text-white">Web
                        Design</a>
                    <a href="#" class="px-3 py-1 text-sm transition border border-gray-200 rounded-sm hover:bg-blue-500 hover:text-white">Web
                        App</a>
                </div>
            </div>
        </div>

    </div>
</main>

@include('layouts.footer')

@endsection
