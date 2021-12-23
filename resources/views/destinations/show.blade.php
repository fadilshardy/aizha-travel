@extends('layouts.app')
@extends('layouts.header')
@section('content')

<main class="container relative px-4 mx-auto bg-white">
    <div class="relative -mx-4 top-0 pt-[17%] overflow-hidden">
        <img class="absolute inset-0 object-cover object-top w-full h-full filter blur" src="{{$destination->getImageUrl()}}" alt="" />
    </div>

    <div class="mt-[-10%] w-1/2 mx-auto">
        <div class="relative pt-[56.25%] overflow-hidden rounded-2xl">

            <img class="absolute inset-0 object-cover w-full h-full " src=" {{$destination->getImageUrl()}}" alt="" />
        </div>
    </div>

    <article class="pt-8 mx-auto max-w-prose">
        <h1 class="text-2xl font-bold">{{$destination->name}}</h1>
        <div class="flex items-baseline gap-8">
            <span class="mt-2 text-sm text-gray-500"> <i class="text-2xl text-gray-500 fas fa-map-marked-alt hover:text-amber-500"> </i> {{$destination->location}}</span>
            <span class="mt-2 text-a text-amber-500 ">$ {{$destination->price}}</span>
        </div>
        <p>{{$destination->getAvgRating()}}</p>

        <p class="pb-10">{{$destination->description}}</p>

        <hr class="p-2">

        <h2 class="flex justify-center p-2 text-3xl font-bold"> <span class="pr-1 text-amber-400">Interested?</span> Book Your Journey Now</h2>
        @include('destinations.partials.order_form')
        </div>

    </article>
    @auth
    <div class="flex items-center justify-center max-w-screen-sm pt-5 mx-auto mb-4 ">
        @include('destinations.partials.review_form')
    </div>
    @endauth

    <div class="max-w-screen-sm mx-auto antialiased">
        @include('destinations.partials.reviews')
    </div>
</main>


{{-- @foreach($destination->getMedia() as $image)
<a href="{{$image->id}}"><img src="{{$image->getFullUrl()}}" alt=""></a>

@endforeach --}}


@endsection


@if ($errors->any())
<div class="">
    <ul>
        @foreach ($errors->all() as $error)
        <li class="w-64 p-2 mt-2 bg-red-400 rounded shadow-lg">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
