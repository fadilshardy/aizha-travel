@extends('layouts.app')
@include('layouts.header')
@section('content')
<section class="pt-12">
    <!-- component -->
    <div class="bg-gray-100">
        <div class="container mx-auto">
            <div role="article" class="py-12 bg-gray-100 md:px-8">
                <div class="px-4 py-10 xl:px-0">
                    <div class="flex flex-col flex-wrap lg:flex-row">
                        <div class="mt-4 lg:mt-0 lg:w-3/5">
                            <div>
                                <h1 class="ml-2 text-3xl font-bold tracking-normal text-gray-900 lg:ml-0 lg:text-4xl lg:w-11/12">Frequently asked questions</h1>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="px-6 xl:px-0">
                    <div class="grid gap-8 pb-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
                        <div role="cell" class="bg-gray-100">
                            <div class="relative w-full h-full p-5 bg-white rounded-md">
                                <!-- class="absolute inset-0 object-cover object-center w-full h-full"  -->
                                <span><img class="p-2 mb-5 bg-gray-200 rounded-full" src="https://i.ibb.co/27R6nk5/home-1.png" alt="home-1" /></span>
                                <h1 class="pb-4 text-2xl font-semibold">Account Overview</h1>
                                <div class="my-5">
                                    <div class="flex items-center w-full pb-4 space-x-3 cursor-pointer dark:border-gray-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12.5" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                        <h4 class="text-gray-900 text-md dark:text-gray-100">First time, what do I do next?</h4>
                                    </div>
                                    <div class="flex items-center w-full pb-4 space-x-3 cursor-pointer dark:border-gray-700">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12.5" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                        <h4 class="text-gray-900 text-md dark:text-gray-100">Changing you profile picture and other information</h4>
                                    </div>
                                    <div class="flex items-center w-full pb-4 cursor-pointer dark:border-gray-700">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12.5" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                        <h4 class="pl-4 text-gray-900 text-md dark:text-gray-100">I didnt get a confirmation email, what should I do next</h4>
                                    </div>
                                    <div class="flex items-center w-full pb-4 cursor-pointer dark:border-gray-700">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12.5" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                        <h4 class="pl-4 text-gray-900 text-md dark:text-gray-100">What is the refund policy if I have to cancel during the month</h4>
                                    </div>
                                </div>
                                <a class="absolute flex items-center text-sm font-bold text-teal-700 cursor-pointer hover:text-teal-500 hover:underline bottom-5" href="javascript:void(0)">
                                    <p>Show All</p>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-right" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#4338CA" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <line x1="5" y1="12" x2="19" y2="12" />
                                            <line x1="15" y1="16" x2="19" y2="12" />
                                            <line x1="15" y1="8" x2="19" y2="12" />
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div role="cell" class="bg-gray-100">
                            <div class="relative w-full h-full p-5 bg-white rounded-md">
                                <!-- class="absolute inset-0 object-cover object-center w-full h-full"  -->
                                <span><img class="p-2 mb-5 bg-gray-200 rounded-full" src="https://i.ibb.co/bdGyLYk/pricetags-1.png" alt="pricetags-1" /></span>
                                <h1 class="pb-4 text-2xl font-semibold">Subscription Plans</h1>
                                <div class="my-5">
                                    <div class="flex items-center w-full pb-4 cursor-pointer dark:border-gray-700">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12.5" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                        <h4 class="pl-4 text-gray-900 text-md dark:text-gray-100">First time, what do I do next?</h4>
                                    </div>
                                    <div class="flex items-center w-full pb-4 cursor-pointer dark:border-gray-700">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12.5" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                        <h4 class="pl-4 text-gray-900 text-md dark:text-gray-100">Changing you profile picture and other information</h4>
                                    </div>
                                    <div class="flex items-center w-full pb-4 cursor-pointer dark:border-gray-700">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12.5" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                        <h4 class="pl-4 text-gray-900 text-md dark:text-gray-100">I didnt get a confirmation email, what should I do next</h4>
                                    </div>
                                    <div class="flex items-center w-full pb-4 cursor-pointer dark:border-gray-700">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12.5" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                        <h4 class="pl-4 text-gray-900 text-md dark:text-gray-100">What is the refund policy if I have to cancel during the month</h4>
                                    </div>
                                    <div class="flex items-center w-full pb-4 cursor-pointer dark:border-gray-700">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12.5" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                        <h4 class="pl-4 text-gray-900 text-md dark:text-gray-100">What is the refund policy?</h4>
                                    </div>
                                </div>
                                <a class="absolute flex items-center text-sm font-bold text-teal-700 cursor-pointer hover:text-teal-500 hover:underline bottom-5" href="javascript:void(0)">
                                    <p>Show All</p>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-right" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#4338CA" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <line x1="5" y1="12" x2="19" y2="12" />
                                            <line x1="15" y1="16" x2="19" y2="12" />
                                            <line x1="15" y1="8" x2="19" y2="12" />
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div role="cell" class="bg-gray-100">
                            <div class="relative w-full h-full p-5 bg-white rounded-md">
                                <!-- class="absolute inset-0 object-cover object-center w-full h-full"  -->
                                <span><img class="p-2 mb-5 bg-gray-200 rounded-full" src="https://i.ibb.co/GT4KHvJ/card-1.png" alt="home-1" /></span>
                                <h1 class="pb-4 text-2xl font-semibold">Payment Options</h1>
                                <div class="my-5">
                                    <div class="flex items-center w-full pb-4 cursor-pointer dark:border-gray-700">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12.5" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                        <h4 class="pl-4 text-gray-900 text-md dark:text-gray-100">First time, what do I do next?</h4>
                                    </div>
                                    <div class="flex items-center w-full pb-4 cursor-pointer dark:border-gray-700">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12.5" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                        <h4 class="pl-4 text-gray-900 text-md dark:text-gray-100">Changing you profile picture and other information</h4>
                                    </div>
                                    <div class="flex items-center w-full pb-4 cursor-pointer dark:border-gray-700">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12.5" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                        <h4 class="pl-4 text-gray-900 text-md dark:text-gray-100">I didnt get a confirmation email, what should I do next</h4>
                                    </div>
                                    <div class="flex items-center w-full pb-4 cursor-pointer dark:border-gray-700">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12.5" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                        <h4 class="pl-4 text-gray-900 text-md dark:text-gray-100">What is the refund policy if I have to cancel during the month</h4>
                                    </div>
                                </div>
                                <a class="absolute flex items-center text-sm font-bold text-teal-700 cursor-pointer hover:text-teal-500 hover:underline bottom-5" href="javascript:void(0)">
                                    <p>Show All</p>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-right" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#4338CA" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <line x1="5" y1="12" x2="19" y2="12" />
                                            <line x1="15" y1="16" x2="19" y2="12" />
                                            <line x1="15" y1="8" x2="19" y2="12" />
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div role="cell" class="bg-gray-100">
                            <div class="relative w-full h-full p-5 bg-white rounded-md">
                                <!-- class="absolute inset-0 object-cover object-center w-full h-full"  -->
                                <span><img class="p-2 mb-5 bg-gray-200 rounded-full" src="https://i.ibb.co/rG4r6NJ/notifications-1.png" alt="home-1" /></span>
                                <h1 class="pb-4 text-2xl font-semibold">Notification Settings</h1>
                                <div class="my-5">
                                    <div class="flex items-center w-full pb-4 cursor-pointer dark:border-gray-700">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12.5" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                        <h4 class="pl-4 text-gray-900 text-md dark:text-gray-100">First time, what do I do next?</h4>
                                    </div>
                                    <div class="flex items-center w-full pb-4 cursor-pointer dark:border-gray-700">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12.5" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                        <h4 class="pl-4 text-gray-900 text-md dark:text-gray-100">Changing you profile picture and other information</h4>
                                    </div>
                                    <div class="flex items-center w-full pb-4 cursor-pointer dark:border-gray-700">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12.5" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                        <h4 class="pl-4 text-gray-900 text-md dark:text-gray-100">I didnt get a confirmation email, what should I do next</h4>
                                    </div>
                                    <div class="flex items-center w-full pb-4 cursor-pointer dark:border-gray-700">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12.5" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                        <h4 class="pl-4 text-gray-900 text-md dark:text-gray-100">What is the refund policy if I have to cancel during the month</h4>
                                    </div>
                                </div>
                                <a class="absolute flex items-center text-sm font-bold text-teal-700 cursor-pointer hover:text-teal-500 hover:underline bottom-5" href="javascript:void(0)">
                                    <p>Show All</p>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-right" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#4338CA" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <line x1="5" y1="12" x2="19" y2="12" />
                                            <line x1="15" y1="16" x2="19" y2="12" />
                                            <line x1="15" y1="8" x2="19" y2="12" />
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div role="cell" class="bg-gray-100">
                            <div class="relative w-full h-full p-5 bg-white rounded-md">
                                <!-- class="absolute inset-0 object-cover object-center w-full h-full"  -->
                                <span><img class="p-2 mb-5 bg-gray-200 rounded-full" src="https://i.ibb.co/HFC1hqn/people-1.png" alt="home-1" /></span>
                                <h1 class="pb-4 text-2xl font-semibold">Profile Preferences</h1>
                                <div class="my-5">
                                    <div class="flex items-center w-full pb-4 cursor-pointer dark:border-gray-700">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12.5" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                        <h4 class="pl-4 text-gray-900 text-md dark:text-gray-100">First time, what do I do next?</h4>
                                    </div>
                                    <div class="flex items-center w-full pb-4 cursor-pointer dark:border-gray-700">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12.5" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                        <h4 class="pl-4 text-gray-900 text-md dark:text-gray-100">Changing you profile picture and other information</h4>
                                    </div>
                                    <div class="flex items-center w-full pb-4 cursor-pointer dark:border-gray-700">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12.5" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                        <h4 class="pl-4 text-gray-900 text-md dark:text-gray-100">I didnt get a confirmation email, what should I do next</h4>
                                    </div>
                                </div>
                                <a class="absolute flex items-center text-sm font-bold text-teal-700 cursor-pointer hover:text-teal-500 hover:underline bottom-5" href="javascript:void(0)">
                                    <p>Show All</p>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-right" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#4338CA" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <line x1="5" y1="12" x2="19" y2="12" />
                                            <line x1="15" y1="16" x2="19" y2="12" />
                                            <line x1="15" y1="8" x2="19" y2="12" />
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div role="cell" class="bg-gray-100">
                            <div class="relative w-full h-full p-5 bg-white rounded-md">
                                <!-- class="absolute inset-0 object-cover object-center w-full h-full"  -->
                                <span><img class="p-2 mb-5 bg-gray-200 rounded-full" src="https://i.ibb.co/QX80fYm/lock-closed-1.png" alt="home-1" /></span>
                                <h1 class="pb-4 text-2xl font-semibold">Privacy and Cookies</h1>
                                <div class="my-5">
                                    <div class="flex items-center w-full pb-4 cursor-pointer dark:border-gray-700">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12.5" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                        <h4 class="pl-4 text-gray-900 text-md dark:text-gray-100">First time, what do I do next?</h4>
                                    </div>
                                    <div class="flex items-center w-full pb-4 cursor-pointer dark:border-gray-700">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12.5" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                        <h4 class="pl-4 text-gray-900 text-md dark:text-gray-100">Changing you profile picture and other information</h4>
                                    </div>
                                    <div class="flex items-center w-full pb-4 cursor-pointer dark:border-gray-700">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12.5" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                        <h4 class="pl-4 text-gray-900 text-md dark:text-gray-100">I didnt get a confirmation email, what should I do next</h4>
                                    </div>
                                    <div class="flex items-center w-full pb-4 cursor-pointer dark:border-gray-700">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12.5" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                        <h4 class="pl-4 text-gray-900 text-md dark:text-gray-100">What is the refund policy if I have to cancel during the month</h4>
                                    </div>
                                </div>
                                <a class="absolute flex items-center text-sm font-bold text-teal-700 cursor-pointer hover:text-teal-500 hover:underline bottom-5" href="javascript:void(0)">
                                    <p>Show All</p>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-right" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#4338CA" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <line x1="5" y1="12" x2="19" y2="12" />
                                            <line x1="15" y1="16" x2="19" y2="12" />
                                            <line x1="15" y1="8" x2="19" y2="12" />
                                        </svg>
                                        <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section>
        @include('layouts.footer')
    </section>
</section>
@endsection
