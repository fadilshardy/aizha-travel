         <table class="w-full py-2 pt-2 whitespace-no-wrap">
             <thead>
                 <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase buser-b dark:buser-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                     <th class="py-3 lg:block">
                         <div class="flex flex-row items-center justify-center gap-1 py-3">
                             <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                             </svg>
                             User
                         </div>
                     </th>
                     <th class="px-4 py-3">
                         <div class="flex flex-row items-center justify-center gap-1">
                             <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                             </svg>
                             Total orders
                         </div>
                     </th>

                     <th class="px-4 py-3">
                         <div class="flex flex-row items-center justify-center gap-1">
                             <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                             </svg>
                             action
                         </div>
                     </th>
                 </tr>
             </thead>
             <tbody class="w-full bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                 @foreach ($users as $user)
                 <tr class="overflow-y-scroll text-xs text-gray-700 dark:text-gray-400 ">
                     <td class="flex w-full py-3 lg:block sm:py-4">
                         <div class="flex flex-row gap-1 ">
                             <div class="flex items-center w-full px-4 space-x-4">
                                 <img class="hidden object-cover w-8 h-8 rounded-full md:block" src="{{$user->getThumbnailUrl()}}" alt="{{$user->name}}" />
                                 <div class="flex-1 min-w-0">
                                     <p class="font-medium text-gray-900 truncate dark:text-white">{{$user->name}}</p>
                                     <p class="text-gray-500 truncate dark:text-gray-400">{{$user->email}}</p>
                                 </div>
                             </div>
                     </td>

                     <td>
                         <span class="flex justify-center font-semibold">
                             {{$user->getTotalOrderCount()}}
                         </span>
                     </td>

                     <td>
                         <div class="flex flex-row items-baseline justify-center gap-2 pt-2 text-gray-400">
                             <a href="{{route('user.show', $user->id)}}" class="hover:text-teal-500">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6" viewBox="0 0 20 20" fill="currentColor">
                                     <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                     <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                 </svg>
                             </a>

                             <form action="#" method="POST" class="hover:text-teal-500 d-inline-block">
                                 @csrf
                                 @method('DELETE')
                                 <button class="w-5 h-5 sm:w-6 sm:h-6" onclick="return confirm('Are you sure?');">
                                     <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-5a1 1 0 00-1 1v3M4 7h16" />
                                     </svg>
                                 </button>
                             </form>
                         </div>

                     </td>
                 </tr>
                 @endforeach

             </tbody>
         </table>
