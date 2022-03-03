@extends('layouts.app')
@include('layouts.header')
@section('content')
<section class="w-full text-gray-900 bg-center bg-no-repeat bg-cover py-36" style="background:url('https://images.unsplash.com/photo-1623479322729-28b25c16b011?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=1280')">
    <div class="flex items-center justify-center px-4 mx-auto max-w-7xl sm:px-6 lg:px-4">
        <div class="pr-0 lg:w-3/6 lg:pr-0">
            <h1 class="text-5xl font-medium text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h1>
            <p class="mt-4 leading-relaxed text-white">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="flex flex-col w-full p-8 mt-10 rounded-md lg:w-3/6 xl:w-2/5 md:w-full bg-gray-50 lg:ml-auto lg:mt-0">
            <div class="relative mb-4">
                <label for="full-name" class="text-sm leading-7 text-gray-600">Name</label>
                <input type="text" id="name" name="name" class="w-full px-3 py-1 text-sm leading-8 text-gray-900 transition-colors duration-150 ease-in-out bg-white border border-gray-300 rounded-md outline-none focus:border-indigo-600 focus:ring-2 focus:ring-indigo-200">
            </div>
            <div class="relative mb-4">
                <label for="email" class="text-sm leading-7 text-gray-600">Email</label>
                <input type="email" id="email" name="email" class="w-full px-3 py-1 text-sm leading-8 text-gray-900 transition-colors duration-150 ease-in-out bg-white border border-gray-300 rounded-md outline-none focus:border-indigo-600 focus:ring-2 focus:ring-indigo-200">
            </div>
            <div class="relative mb-4">
                <label for="email" class="text-sm leading-7 text-gray-600">Phone</label>
                <input type="email" id="phone" name="phone" class="w-full px-3 py-1 text-sm leading-8 text-gray-900 transition-colors duration-150 ease-in-out bg-white border border-gray-300 rounded-md outline-none focus:border-indigo-600 focus:ring-2 focus:ring-indigo-200">
            </div>
            <div class="relative mb-4">
                <label for="email" class="text-sm leading-7 text-gray-600">Message</label>
                <textarea id="message" name="message" rows="4" class="w-full px-3 py-1 text-sm leading-8 text-gray-900 transition-colors duration-150 ease-in-out bg-white border border-gray-300 rounded-md outline-none focus:border-indigo-600 focus:ring-2 focus:ring-indigo-200"> </textarea>
            </div>
            <button class="px-8 py-2 text-lg text-white bg-indigo-500 border-0 rounded-md focus:outline-none hover:bg-indigo-600">Submit</button>
        </div>
    </div>
</section>
@endsection
