@extends('layouts.app')
@extends('layouts.header')
@section('content')

<div class="container p-12 mx-auto bg-white border shadow-xl">
    <hr>
    <h1 class="flex justify-center pt-10 text-4xl font-bold text-gray-600">Order Summary</h1>
    <hr class="my-3" />
    <form action="{{route('destination.order')}}" method="POST">
        @csrf
        <input type="hidden" name="destination_id" value="{{$destination->id}}">
        <input type="hidden" name="total_days" value="{{$destination->total_days}}">
        <input type="hidden" name="user_id" value="{{$user->id}}">
        <input type="hidden" name="start_date" value="{{$request->date}}">
        <input type="hidden" name="end_date" value="{{$data['end_date']}}">
        <input type="hidden" name="quantity" value="{{$request->quantity}}">
        <input type="hidden" name="total_amount" value="{{$data['total_amount']}}">


        <div class="flex flex-col w-full px-0 mx-auto lg:flex-row">
            <div class="flex flex-col md:w-full">
                <div>

                    <div class="relative pt-3 xl:pt-6"><label for="note" class="block mb-3 text-sm font-semibold text-gray-500"> Notes
                            (Optional)</label><textarea name="note" class="flex items-center w-full px-4 py-3 text-sm border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-blue-600" rows="4" placeholder="Additional notes"></textarea>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center w-full ml-0 lg:ml-12 lg:w-2/5">
                <div class="pt-12 md:pt-0 2xl:-mt-5 2xl:-ml-8">
                    <div class="flex items-center gap-4 pt-4 ">
                        <div class="h-full ">
                            <div class="relative overflow-hidden bg-gray-100 rounded-lg shadow-md pb-3/5">
                                <a href="{{route('destination.show', $destination->slug)}}">
                                    <img src="{{$destination->getImageUrl()}}" alt="" class="absolute bottom-0 object-cover w-full h-full"></a>
                            </div>
                            <div class="relative px-4 -mt-16">
                                <div class="p-6 bg-white rounded-lg shadow-lg">
                                    <div class="flex items-baseline gap-2 text-sm text-gray-600">
                                        <span> <i class="fas fa-map-marker-alt"></i> <a href="#" class="hover:text-amber-400">{{$destination->location}}</a> </span>
                                    </div>
                                    <span class=""></span>
                                    <a class="mt-1 overflow-hidden text-lg font-semibold leading-tight truncate hover:text-amber-400" href="{{route('destination.show', $destination->id)}}">{{$destination->name}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-6 mx-auto">

            <div class="flex flex-col max-w-full overflow-hidden bg-white rounded shadow-lg">
                <div class="flex items-center w-full px-4 py-2 text-sm uppercase bg-gray-100">
                    <span class="font-semibold">Order Details (ID - #{{$data['invoice_id']}})</span>
                </div>

                <div class="flex flex-row justify-between gap-6 pt-2 mx-4 text-sm font-light tracking-wider uppercase ">
                    <div class="flex flex-col w-1/2 gap-1">
                        <div class="flex justify-between">
                            <span class="text-sm font-light tracking-wider uppercase">Full name</span>
                            <span class="font-bold">{{$user->name}}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm font-light tracking-wider uppercase ">location</span>
                            <span class="font-bold">{{$destination->location}}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm font-light tracking-wider uppercase ">Start Date</span>
                            <span class="font-bold">{{$data['date']}}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm font-light tracking-wider uppercase ">End Date</span>
                            <span class="font-bold">{{$data['end_date']}}</span>
                        </div>
                    </div>

                    <div class="flex flex-col w-1/2 gap-1">
                        <div class="flex justify-between">
                            <span class="text-sm font-light tracking-wider uppercase">Price / Person </span>
                            <span class="font-bold">${{$destination->price}}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm font-light tracking-wider uppercase ">Number of Guest</span>
                            <span class="font-bold">{{$data['quantity']}}</span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-sm font-light tracking-wider uppercase ">Total Days</span>
                            <span class="font-bold">5</span>
                        </div>
                        <hr>
                        <div class="flex justify-between">
                            <span class="text-sm font-light tracking-wider uppercase ">Total Checkout</span>
                            <span class="font-bold">${{$data['total_amount']}}</span>
                        </div>
                    </div>
                </div>
                <div class="mx-4 mt-8 mb-4">
                    <button class="w-full p-2 mr-5 text-xl font-bold text-center text-white transition bg-teal-700 rounded duration-7000 hover:bg-teal-500 group-hover:visible " type="submit">Book now</button>
                </div>
            </div>
        </div>
    </form>
    @if ($errors->any())
    <div class="">
        <ul>
            @foreach ($errors->all() as $error)
            <li class="w-64 p-2 mt-2 bg-red-400 rounded shadow-lg ">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @endsection
