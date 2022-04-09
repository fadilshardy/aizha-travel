@extends('layouts.app')
@include('layouts.header')
@section('content')

@include('home.partials.hero')

<div class="w-full h-full ">
    <div class="container mx-auto ">
        <section class="p-10 px-5 mx-auto md:py-20 md:p-10 md:px-0">
            <div class="relative mb-8 text-center">

                <div class="max-w-xl mb-10 text-center md:mx-auto lg:max-w-2xl md:mb-12">
                    <div>
                        <p class="inline-block text-xs font-semibold text-teal-600 uppercase ">
                            new
                        </p>
                    </div>
                    <h2 class="max-w-lg mx-auto mb-6 font-sans text-4xl font-bold leading-none tracking-tight text-gray-900 sm:text-5xl">
                        Latest Tours
                    </h2>
                    <p class="text-base text-gray-700 md:text-lg">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic dolorum eligendi dolore deserunt amet labore.
                    </p>
                </div>

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
            @include('home.partials.cards')
        </section>

        <section>
            @include('home.partials.banner')
        </section>

        @include('home.partials.locations')
        </section>



        <section>
            <div class="px-4 py-16 mx-auto max-w-screen-2xl sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 lg:h-screen">
                    <div class="relative z-10 lg:py-16">
                        <div class="relative h-64 sm:h-80 lg:h-full">
                            <img class="absolute inset-0 object-cover w-full h-full" src="https://images.unsplash.com/photo-1541890289-b86df5bafd81?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1145&q=80" alt="Indoors house" />
                        </div>
                    </div>

                    <div class="relative flex items-center bg-gray-100">
                        <span class="hidden lg:inset-y-0 lg:absolute lg:w-16 lg:bg-gray-100 lg:block lg:-left-16"></span>

                        <div class="p-8 sm:p-16 lg:p-24">
                            <h2 class="text-2xl font-bold sm:text-3xl">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore,
                                debitis.
                            </h2>

                            <p class="mt-4 text-gray-600">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid,
                                molestiae! Quidem est esse numquam odio deleniti, beatae, magni
                                dolores provident quaerat totam eos, aperiam architecto eius quis
                                quibusdam fugiat dicta.
                            </p>

                            <a class="inline-block px-12 py-3 mt-8 text-sm font-medium text-white bg-teal-600 border border-teal-600 rounded active:text-teal-500 hover:bg-transparent hover:text-teal-600 focus:outline-none focus:ring" href="{{route('contact')}}">
                                Get in Touch
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>




    </div>
    <section>
        @include('layouts.footer')
    </section>

</div>



@endsection
