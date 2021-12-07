@extends('layouts.app')
@extends('layouts.header')
@section('content')

<main class="container relative px-4 mx-auto bg-white">
    <div class="relative -mx-4 top-0 pt-[17%] overflow-hidden">
        <img class="absolute inset-0 object-cover object-top w-full h-full filter blur" src="{{$destination->getMedia()[0]->getUrl()}}" ;}}" alt="" />
    </div>

    <div class="mt-[-10%] w-1/2 mx-auto">
        <div class="relative pt-[56.25%] overflow-hidden rounded-2xl">
            <img class="absolute inset-0 object-cover w-full h-full" src="{{$destination->getMedia()[0]->getUrl()}}" ;}}" alt="" />
        </div>
    </div>

    <article class="py-8 mx-auto max-w-prose">
        <h1 class="text-2xl font-bold">{{$destination->name}}</h1>
        <div class="flex items-baseline gap-8">
            <span class="mt-2 text-sm text-gray-500"> <i class="text-2xl text-gray-500 fas fa-map-marked-alt hover:text-amber-500"> </i> {{$destination->location}}</span>
            <span class="mt-2 text-a text-amber-500 ">$ {{$destination->price}}</span>

        </div>

        <p class="pb-10">{{$destination->description}}</p>

        <hr class="p-2">

        <h2 class="flex justify-center p-2 text-3xl font-bold"> <span class="pr-1 text-amber-400">Interested?</span> Book Your Journey Now</h2>
        <form action="{{route('destination.checkout')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <input name="destination_id" type="hidden" value="{{$destination->id}}">
            <div class="flex flex-col justify-center w-full gap-2 p-4 bg-gray-100 rounded-lg">
                <div date-rangepicker class="flex items-center" id="dateRangePickerId">
                    <div class="relative w-1/2">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="text-gray-500 far fa-calendar hover:text-amber-500"></i>
                        </div>
                        <input name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Start of Date">
                    </div>
                    <span class="mx-4 text-gray-500">to</span>

                    <div class="relative w-1/2">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="text-gray-500 fas fa-calendar hover:text-amber-500"></i>
                        </div>
                        <input name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="End of Date">
                    </div>
                </div>

                <div class="flex-grow">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="text-gray-500 fas fa-user hover:text-amber-500 "></i>
                        </div>
                        <input name="quantity" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Number of Guest...">
                    </div>
                </div>
                <button type="submit" class="px-4 py-2 text-sm font-light text-white uppercase bg-amber-500 hover:bg-amber-400">order</button>

        </form>
        </div>

    </article>

</main>
{{-- @foreach($destination->getMedia() as $image)
<a href="{{$image->id}}"><img src="{{$image->getFullUrl()}}" alt=""></a>

@endforeach --}}

<script type="text/javascript">
    const dateRangePickerEl = document.getElementById("dateRangePickerId");

</script>
@endsection
