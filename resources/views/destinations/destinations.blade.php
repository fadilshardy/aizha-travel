@extends('layouts.app')
@include('layouts.header')
@section('content')
<section class="p-10 px-5 mx-auto md:py-20 md:p-10 md:px-0">
    <section class="grid grid-cols-1 gap-10 md:grid-cols-2 xl:grid-cols-3">
        @foreach($destinations as $destination)
        @include('home.partials.destinations')
        @endforeach

    </section>
    <div class="flex items-center justify-center gap-5">
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
@endsection
