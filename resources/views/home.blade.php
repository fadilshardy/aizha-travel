@extends('layouts.app')
@include('layouts.header')
@section('content')

@include('home.partials.hero')

<div class="container w-full h-full mx-auto ">

    <section class="p-10 px-5 mx-auto md:py-20 md:p-10 md:px-0">
        <div class="relative mb-8 text-center">
            <span class="absolute inset-x-0 h-px -translate-y-1/2 bg-black/10 top-1/2"></span>

            <h2 class="relative inline-block px-4 text-2xl font-bold text-center bg-white">
                Latest Tours
            </h2>
        </div>
        <section class="grid grid-cols-1 gap-10 md:grid-cols-2 xl:grid-cols-3">
            @foreach($destinations as $destination)
            @include('home.partials.destinations')
            @endforeach

        </section>

        <div class="flex items-center justify-center gap-5 pt-4">
            <a class="inline-flex items-center px-12 py-4 text-white bg-teal-500 border border-teal-500 rounded hover:bg-transparent hover:text-teal-600 active:text-teal-500 focus:outline-none focus:ring" href="{{route('user.destination.index')}}">
                <span class="font-bold"> Check more </span>

                <svg class="w-5 h-5 ml-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>

    </section>

    <section>
        @include('home.partials.locations')
    </section>

    <section>
        @include('home.partials.banner')
    </section>

    <section>
        @include('home.partials.cards')
    </section>

    <section>
        @include('layouts.footer')
    </section>

</div>


@endsection
