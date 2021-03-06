 @extends('admin.dashboard.partials.layout')

 @section('main')


 <div class="w-full pt-8 rounded-lg shadow-xs">
     <div class="flex items-end justify-end w-full py-2">

         <a href="{{route('destination.create')}}" class="btn-dashboard">
             add
         </a>
     </div>
     <div class="w-full overflow-hidden">
         <table class="w-full py-2 pt-2 whitespace-no-wrap ">
             <thead>
                 <tr class="text-xs tracking-wide text-center text-gray-500 uppercase border-b bg-gray-50">
                     <th class="hidden md:py-3 lg:block">
                         <div class="flex flex-row items-center justify-center gap-1 py-3">
                             <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                             </svg>
                             cover
                         </div>
                     </th>
                     <th class="md:px-4 md:py-3">
                         <div class="flex flex-row items-center justify-center gap-1">
                             <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                             </svg>
                             name
                         </div>
                     </th>
                     <th class="px-4 py-3">
                         <div class="flex flex-row items-center justify-center gap-1">
                             <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                             </svg>
                             <span class="hidden sm:block"> price
                             </span>
                         </div>
                     </th>
                     <th class="px-4 py-3">
                         <div class="flex flex-row items-center justify-center gap-1">
                             <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                             </svg>
                             <span class="hidden sm:block"> location
                             </span>
                         </div>
                     </th>
                     <th class="px-4 py-3">
                         <div class="flex flex-row items-center justify-center gap-1">
                             <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                             </svg>
                             action
                         </div>
                     </th>
                 </tr>
             </thead>
             <tbody class="w-full bg-white divide-y ">
                 @foreach ($destinations as $destination)
                 <tr class="overflow-y-scroll text-xs text-gray-700 dark:text-gray-400 hover:bg-gray-100 sm:text-sm ">
                     <td class="hidden py-3 lg:block ">
                         <div class="flex items-center justify-center">
                             <div class="w-24 h-full xl:w-32">
                                 <img class="object-cover w-full h-full rounded-lg" src="{{$destination->getImageUrl()}}" alt="" loading="lazy" />
                             </div>
                         </div>

                     </td>
                     <td class="justify-center px-4 py-3">
                         <a href="{{route('user.destination.show', $destination->slug)}}" class="">
                             {{$destination->name}} </a>
                     </td>
                     <td class="font-medium text-center text-green-500 ">
                         ${{$destination->price}}
                     </td>
                     <td class="font-medium text-center ">
                         {{$destination->location}}
                     </td>
                     <td>
                         <div class="flex flex-row items-baseline justify-center gap-2 pt-2 text-gray-400">
                             <a href="{{route('user.destination.show', $destination->slug)}}" class="hover:text-teal-500">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6" viewBox="0 0 20 20" fill="currentColor">
                                     <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                     <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                 </svg>
                             </a>
                             <a href="{{route('destination.edit', $destination->slug)}}" class="text-gray-400 hover:text-teal-500">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                 </svg>
                             </a>
                             <form action="{{route('destination.destroy', $destination->slug)}}" method="POST" class="hover:text-teal-500 d-inline-block">
                                 @csrf
                                 @method('DELETE')
                                 <button class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6" onclick="return confirm('Are you sure?');">
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
         <div class="flex py-3 mb-8 bg-gray-50">
             <div class="w-full mx-4">
                 {!! $destinations->links() !!}
             </div>
         </div>

     </div>
 </div>



 @endsection
