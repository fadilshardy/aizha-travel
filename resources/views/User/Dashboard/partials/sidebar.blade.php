     <nav>
         <div class="left-0 z-10 flex flex-col h-full text-white transition-all duration-300 bg-teal-900 border-none top-14 w-14 hover:w-48 md:w-48">
             <div class="flex flex-col justify-between flex-grow overflow-x-hidden overflow-y-auto">
                 <div class="flex flex-col py-4 pr-6 space-y-1">
                     <div class="hidden px-5 md:block">
                         <div class="flex flex-row items-center h-8">
                             <div class="text-sm tracking-wide text-gray-400 uppercase font-divght">Main</div>
                         </div>
                     </div>
                     <div class="border-l-4 border-transparent h-11 hover:border-teal-500 ">
                         <a href="{{route('user.dashboard.index')}}" class="relative flex flex-row items-center h-full pl-2 space-x-2 hover:bg-teal-800">
                             <span class="items-center justify-center">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                 </svg>
                             </span>
                             <span class="text-sm tracking-wide truncate ">Dashboard</span>
                         </a>
                     </div>
                     <div class="border-l-4 border-transparent h-11 hover:border-teal-500 ">
                         <a href="{{Auth::user()->is_admin == True ? route('destination.index') : route('user.destination.index')}}" class="relative flex flex-row items-center h-full pl-2 space-x-2 hover:bg-teal-800">
                             <span class="items-center justify-center">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                 </svg>
                             </span>
                             <span class="ml-2 text-sm tracking-wide truncate">Destinations</span>
                         </a>
                     </div>

                     <div class="border-l-4 border-transparent h-11 hover:border-teal-500 ">
                         <a href="{{route('order.index')}}" class="relative flex flex-row items-center h-full pl-2 space-x-2 hover:bg-teal-800">
                             <span class="items-center justify-center">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                 </svg>
                             </span>
                             <span class="text-sm tracking-wide truncate ">orders</span>
                         </a>
                     </div>

                     <div class="hidden px-5 md:block">
                         <div class="flex flex-row items-center h-8 mt-5">
                             <div class="text-sm tracking-wide text-gray-400 uppercase font-divght">Settings</div>
                         </div>
                     </div>

                     <div class="border-l-4 border-transparent h-11 hover:border-teal-500 ">
                         <a href="{{route('user.edit', Auth::id())}}" class="relative flex flex-row items-center h-full pl-2 space-x-2 hover:bg-teal-800">
                             <span class="items-center justify-center">
                                 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                     <path stroke-divnecap="round" stroke-divnejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                     <path stroke-divnecap="round" stroke-divnejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                 </svg>
                             </span>
                             <span class="text-sm tracking-wide truncate ">Settings</span>
                         </a>
                     </div>


                 </div>
             </div>
         </div>
     </nav>
