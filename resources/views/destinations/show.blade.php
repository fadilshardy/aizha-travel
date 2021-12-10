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

    <article class="pt-8 mx-auto max-w-prose">
        <h1 class="text-2xl font-bold">{{$destination->name}}</h1>
        <div class="flex items-baseline gap-8">
            <span class="mt-2 text-sm text-gray-500"> <i class="text-2xl text-gray-500 fas fa-map-marked-alt hover:text-amber-500"> </i> {{$destination->location}}</span>
            <span class="mt-2 text-a text-amber-500 ">$ {{$destination->price}}</span>

        </div>

        <p class="pb-10">{{$destination->description}}</p>

        <hr class="p-2">

        <h2 class="flex justify-center p-2 text-3xl font-bold"> <span class="pr-1 text-amber-400">Interested?</span> Book Your Journey Now</h2>
        <form action="{{route('order.redirect')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
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

    @auth
    <div class="flex items-center justify-center max-w-lg mx-auto mb-4 shadow-lg ">
        <form action="{{route('destination.storeComment', $destination->id)}}" method="POST" class="w-full max-w-xl px-4 pt-2 rounded-lg bg-gray-50">
            @csrf
            <input type="hidden" name="destination_id" value="{{$destination->id}}">
            <input type="hidden" name="user_id" value="{{Auth::id()}}">

            <div class="flex flex-wrap mb-6 -mx-3">
                <h2 class="px-4 pt-3 pb-2 text-lg text-gray-500">Add Comment</h2>
                <div class="w-full px-3 mt-2 mb-2 md:w-full">
                    <textarea class="w-full h-20 px-3 py-2 font-medium leading-normal placeholder-gray-700 bg-gray-100 border border-gray-400 rounded resize-none focus:outline-none focus:bg-white" name="body" placeholder='Type Your Comment' required></textarea>
                </div>
                <div class="flex items-start w-full px-3 md:w-full">
                    <div class="flex items-center w-1/2 gap-2 px-2 mr-auto text-gray-700">
                        <img class="inline-block w-12 h-12 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                        {{Auth::user()->name;}}
                    </div>
                    <div class="-mr-1">
                        <input type='submit' class="px-4 py-1 mr-1 font-medium tracking-wide text-gray-700 bg-white border border-gray-400 rounded-lg hover:bg-gray-100">
                    </div>
                </div>
        </form>
    </div>
    </div>

    @endauth

    <div class="max-w-screen-sm mx-auto antialiased">
        <h3 class="mb-4 text-lg font-semibold text-gray-900">Comments</h3>
        <div class="space-y-4">
            @foreach($destination->comments as $comment)
            <div class="flex">
                <div class="flex-shrink-0 mr-3">
                    <img class="w-8 h-8 mt-2 rounded-full sm:w-10 sm:h-10" src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80" alt="">
                </div>
                <div class="flex-1 px-4 py-2 leading-relaxed border rounded-lg sm:px-6 sm:py-4">
                    <strong>{{$comment->user->name}}</strong> <span class="text-xs text-gray-400">{{$comment->updated_at->diffForHumans();}}</span>
                    <p class="text-sm">
                        <h4>{{$comment->body}}</h4>
                    </p>
                    <h4 class="my-5 text-xs font-bold tracking-wide text-gray-400 uppercase">Replies</h4>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <!-- comment form -->


</main>
{{-- @foreach($destination->getMedia() as $image)
<a href="{{$image->id}}"><img src="{{$image->getFullUrl()}}" alt=""></a>

@endforeach --}}

<script type="text/javascript">
    const dateRangePickerEl = document.getElementById("dateRangePickerId");

</script>
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
