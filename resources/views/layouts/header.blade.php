    <header class="fixed z-50 flex items-center justify-between w-full px-40 py-4 bg-white shadow ">

        <a href="/" class="text-3xl font-extrabold text-gray-600 hover:text-amber-400"><i class="text-amber-500 fas fa-paper-plane hover:text-amber-400"></i> Aizha Travel</a>

        <nav class="flex gap-8 text-lg font-semibold text-gray-700">
            <a href="#home" class="hover:text-amber-400">home</a>
            <a href="#destinations" class="hover:text-amber-400">Destinations</a>
            <a href="#services" class="hover:text-amber-400">services</a>
            <a href="#featured" class="hover:text-amber-400">featured</a>
            <a href="#contact" class="hover:text-amber-400">contact</a>
            <a href="/admin/destination" class="hover:text-amber-400">admin/destinations</a>
        </nav>
        <div class="flex gap-5 text-xl">
            <a href="/login" class="p-3 text-gray-600 bg-gray-200 rounded-full fas fa-bell hover:text-amber-500"></a>
            <a href="/login" class="p-3 text-gray-600 bg-gray-200 rounded-full fas fa-user hover:text-amber-500"></a>
        </div>


        <div class="flex items-center justify-center">
            <div class="relative inline-block text-left dropdown">
                <span class="rounded-md shadow-sm"><button class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800" type="button" aria-haspopup="true" aria-expanded="true" aria-controls="headlessui-menu-items-117">
                        <span>Login</span>
                        <svg class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button></span>
                <div class="invisible transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 opacity-0 dropdown-menu">
                    <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none" aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                        <div class="px-4 py-3">
                            <p class="text-sm leading-5">Signed in as</p>
                            <p class="text-sm font-medium leading-5 text-gray-900 truncate">tom@example.com</p>
                        </div>
                        <div class="py-1">
                            <a href="javascript:void(0)" tabindex="0" class="flex justify-between w-full px-4 py-2 text-sm leading-5 text-left text-gray-700" role="menuitem">Account settings</a>
                            <a href="javascript:void(0)" tabindex="1" class="flex justify-between w-full px-4 py-2 text-sm leading-5 text-left text-gray-700" role="menuitem">Support</a>
                            <span role="menuitem" tabindex="-1" class="flex justify-between w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 opacity-50 cursor-not-allowed" aria-disabled="true">New feature (soon)</span>
                            <a href="javascript:void(0)" tabindex="2" class="flex justify-between w-full px-4 py-2 text-sm leading-5 text-left text-gray-700" role="menuitem">License</a></div>
                        <div class="py-1">
                            <a href="javascript:void(0)" tabindex="3" class="flex justify-between w-full px-4 py-2 text-sm leading-5 text-left text-gray-700" role="menuitem">Sign out</a></div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .dropdown:focus-within .dropdown-menu {
                opacity: 1;
                transform: translate(0) scale(1);
                visibility: visible;
            }

        </style>

    </header>
