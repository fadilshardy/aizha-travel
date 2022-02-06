@extends('layouts.app')
@include('layouts.header')
@section('content')

@include('home.partials.hero')

<div class="container w-full h-full mx-auto ">
    <div class="flex flex-col items-center pt-4">
        <div>

            {{-- Tour location google map


            Tour Highlight

            Tour plan
            day 1
            day 2
            day 3

            what to except


            Gallery


            TOP DESTINATIONS (CARD)


            GET A QUESTION? (SIDEBAR)

            ORDER (SIDEBAR)

            WHY CHOOSE US? (HOMEPAGE) --}}
        </div>
    </div>


    <section class="p-10 px-5 mx-auto md:py-20 md:p-10 md:px-0">
        <section class="grid grid-cols-1 gap-10 md:grid-cols-2 xl:grid-cols-3">
            @foreach($destinations as $destination)
            @include('home.partials.destinations')
            @endforeach

        </section>
        <div class="flex items-center justify-center gap-5 pt-4">
            {{ $destinations->links() }}


        </div>

        {{-- <div class="flex justify-end">

            <a href="#" class="flex items-center gap-1 px-6 py-5 font-bold text-white bg-teal-400 rounded hover:bg-teal-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
                Check More</a>
        </div> --}}
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
                        <img class="object-cover mb-6 rounded shadow-lg h-28 sm:h-48 xl:h-56 w-28 sm:w-48 xl:w-56" src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1035&q=80" alt="" />
                        <img class="object-cover w-20 h-20 rounded shadow-lg sm:h-32 xl:h-40 sm:w-32 xl:w-40" src="https://images.unsplash.com/photo-1539635278303-d4002c07eae3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="" />
                    </div>
                    <div class="px-3">
                        <img class="object-cover w-40 h-40 rounded shadow-lg sm:h-64 xl:h-80 sm:w-64 xl:w-80" src="https://images.unsplash.com/photo-1476900543704-4312b78632f8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <aside class="relative text-white bg-teal-900">
        <img src="https://images.unsplash.com/photo-1508672019048-805c876b67e2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1219&q=80" alt="" class="absolute inset-0 object-cover w-full h-full opacity-75" />

        <div class="relative max-w-screen-xl px-4 py-24 mx-auto sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto text-center">
                <strong class="inline-block px-3 py-1 text-xs font-semibold text-white uppercase bg-teal-600">
                    Go adventure
                </strong>

                <h2 class="mt-2 text-4xl font-bold text-white sm:text-6xl">
                    Lorem ipsum dolor sit amet consectetur.
                </h2>

                <a href="" class="inline-flex items-center px-5 py-3 mt-8 font-medium text-white border border-white rounded-lg hover:bg-white hover:text-teal-600">
                    Take the dive

                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-4 h-4 ml-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        </div>
    </aside>

    @include('home.partials.steps')

    @include('layouts.footer')

</div>






@endsection
