<header class="fixed z-50 w-full bg-white border-b border-gray-100 shadow-sm">
    <div class="flex items-center justify-between w-full h-16 px-4 mx-auto max-w-screen-2xl sm:px-6 lg:px-8">
        <div class="flex items-center">
            <a href="{{route('home')}}" class="flex items-center w-32 gap-2 text-sm font-bold text-gray-600 md:w-40 lg:text-base hover:text-teal-700 group">
                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" class="w-8 h-8 text-gray-700 group-hover:text-teal-700" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M19.3,16.9c0.4-0.7,0.7-1.5,0.7-2.4c0-2.5-2-4.5-4.5-4.5S11,12,11,14.5s2,4.5,4.5,4.5c0.9,0,1.7-0.3,2.4-0.7l3.2,3.2 l1.4-1.4L19.3,16.9z M15.5,17c-1.4,0-2.5-1.1-2.5-2.5s1.1-2.5,2.5-2.5s2.5,1.1,2.5,2.5S16.9,17,15.5,17z M12,20v2 C6.48,22,2,17.52,2,12C2,6.48,6.48,2,12,2c4.84,0,8.87,3.44,9.8,8h-2.07c-0.64-2.46-2.4-4.47-4.73-5.41V5c0,1.1-0.9,2-2,2h-2v2 c0,0.55-0.45,1-1,1H8v2h2v3H9l-4.79-4.79C4.08,10.79,4,11.38,4,12C4,16.41,7.59,20,12,20z" />
                </svg>
                Aizha Travel
            </a>

            <nav class="items-center hidden px-4 text-xs font-medium border-l border-gray-100 lg:pl-8 md:space-x-4 lg:space-x-8 lg:text-sm md:flex">
                <a href="{{route('faq')}}" class="hover:text-teal-700">FAQ</a>
                <a href="{{route('services')}}" class="hover:text-teal-700">Services</a>
                <a href="{{route('contact')}}" class="hover:text-teal-700">Contact</a>
                <a href="{{route('user.destination.index')}}" class="p-2 bg-teal-200 rounded-md shadow-sm md:mt-0 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-700">destinations</a>
            </nav>

        </div>


        <div class="flex items-center w-full lg:px-8">
            <form action="{{ route('user.destination.search') }}" method="GET" class="relative w-full mt-5">
                <svg class="pointer-events-none absolute inset-y-0 left-0 h-full w-8 stroke-gray-400 pl-2.5" viewBox="0 0 256 256" aria-hidden="true">
                    <circle cx="116" cy="116" r="84" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></circle>
                    <line x1="175.4" y1="175.4" x2="224" y2="224" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line>
                </svg>
                <label for="search-basic" class="sr-only">Search Destinations</label>

                <input id="search-basic" type="search" placeholder="Search..." name="search" class="block w-full pl-10 text-xs transition border-gray-200 rounded-md lg:text-base focus:border-teal-600 focus:ring-teal-600 disabled:cursor-not-allowed disabled:bg-gray-200 disabled:opacity-75">

            </form>

        </div>
        @guest
        <div class="flex items-center">
            <a class="block w-1/2 px-3 py-2 mx-1 text-sm font-medium leading-5 text-center transition-colors duration-200 transform rounded-md text md:mx-2 md:w-auto hover:bg-gray-300 whitespace-nowrap " href="{{route('login')}}">Sign in</a>
            <a class="block w-1/2 px-3 py-2 mx-1 text-sm font-medium leading-5 text-center text-white transition-colors duration-200 transform bg-teal-700 rounded-md hover:bg-teal-600 md:mx-0 md:w-auto whitespace-nowrap" href="{{route('register')}}">Sign up</a>
        </div>
        @endguest

        @auth
        <div class="flex items-center ">
            <div class="flex items-center divide-x divide-gray-100 ">
                <a href="" class="hidden px-6 text-center lg:block group ">
                    <svg class="w-6 h-6 mx-auto " viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 17H20L18.5951 15.5951C18.2141 15.2141 18 14.6973 18 14.1585V11C18 8.38757 16.3304 6.16509 14 5.34142V5C14 3.89543 13.1046 3 12 3C10.8954 3 10 3.89543 10 5V5.34142C7.66962 6.16509 6 8.38757 6 11V14.1585C6 14.6973 5.78595 15.2141 5.40493 15.5951L4 17H9M15 17V18C15 19.6569 13.6569 21 12 21C10.3431 21 9 19.6569 9 18V17M15 17H9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <div class="flex flex-col ">
                        <span class="block mt-1 text-xs font-medium">notifications</span>
                        <div class="transition duration-150 border-b-2 group-hover:border-teal-200 "></div>
                    </div>
                </a>
                <div class="relative inline-block group">
                    <a href="#" class="block px-6 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" class="w-6 h-6 mx-auto ">

                            <g>
                                <g>
                                    <path d="M4,18v-0.65c0-0.34,0.16-0.66,0.41-0.81C6.1,15.53,8.03,15,10,15c0.03,0,0.05,0,0.08,0.01c0.1-0.7,0.3-1.37,0.59-1.98 C10.45,13.01,10.23,13,10,13c-2.42,0-4.68,0.67-6.61,1.82C2.51,15.34,2,16.32,2,17.35V20h9.26c-0.42-0.6-0.75-1.28-0.97-2H4z" />
                                    <path d="M10,12c2.21,0,4-1.79,4-4s-1.79-4-4-4C7.79,4,6,5.79,6,8S7.79,12,10,12z M10,6c1.1,0,2,0.9,2,2s-0.9,2-2,2 c-1.1,0-2-0.9-2-2S8.9,6,10,6z" />
                                    <path d="M20.75,16c0-0.22-0.03-0.42-0.06-0.63l1.14-1.01l-1-1.73l-1.45,0.49c-0.32-0.27-0.68-0.48-1.08-0.63L18,11h-2l-0.3,1.49 c-0.4,0.15-0.76,0.36-1.08,0.63l-1.45-0.49l-1,1.73l1.14,1.01c-0.03,0.21-0.06,0.41-0.06,0.63s0.03,0.42,0.06,0.63l-1.14,1.01 l1,1.73l1.45-0.49c0.32,0.27,0.68,0.48,1.08,0.63L16,21h2l0.3-1.49c0.4-0.15,0.76-0.36,1.08-0.63l1.45,0.49l1-1.73l-1.14-1.01 C20.72,16.42,20.75,16.22,20.75,16z M17,18c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2S18.1,18,17,18z" />
                                </g>
                            </g>
                        </svg>
                        <div class="flex flex-col">
                            <span class="block mt-1 text-xs font-medium ">account</span>
                            <div class="border-b-2 group-hover:border-teal-200 "></div>
                        </div>
                    </a>
                    <div class="absolute flex-col hidden px-3 py-1 pt-1 text-gray-700 bg-white rounded justify-items-start group-hover:flex">
                        <div class="border-b">
                            <a href="{{route('user.edit', Auth::id())}}" class="flex gap-2 px-4 py-2 hover:bg-gray-100">
                                <div class="text-gray-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <p class="text-xs font-medium leading-none text-gray-800">Account settings</p>
                            </a>
                            <a href="#" class="flex flex-row gap-2 px-4 py-2 hover:bg-gray-100">
                                <div class="text-gray-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                </div>
                                <p class="text-xs font-medium leading-none text-gray-800">Order History</p>
                            </a>
                        </div>

                        <a href="{{ route('logout') }}" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                            <div class="text-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                                </svg>
                            </div>

                            <p class="text-xs font-medium leading-none text-gray-800">
                                Sign Out
                            </p>
                            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endauth
    </div>
</header>
