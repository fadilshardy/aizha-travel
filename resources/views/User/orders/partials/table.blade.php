         <table class="w-full py-2 pt-2 whitespace-no-wrap">
             <thead>
                 <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                     <th class="py-3 lg:block">
                         <div class="flex flex-row items-center justify-center gap-1 py-3">
                             <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                 <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                             </svg>
                             Date
                         </div>
                     </th>
                     <th class="px-4 py-3">
                         <div class="flex flex-row items-center justify-center gap-1">
                             <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                             </svg>
                             total
                         </div>
                     </th>
                     <th class="px-4 py-3">
                         <div class="flex flex-row items-center justify-center gap-1">
                             <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                             </svg>
                             Destination
                         </div>
                     </th>
                     <th class="px-4 py-3">
                         <div class="flex flex-row items-center justify-center gap-1">
                             <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                             </svg>
                             Status
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
                 @foreach ($orders as $order)
                 <tr class="overflow-y-scroll text-xs text-gray-700 dark:text-gray-400 ">
                     <td class="flex w-full py-3 lg:block sm:py-4">
                         <div class="flex flex-row gap-1 ">
                             <div class="flex items-center w-full px-4 space-x-4">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                     <path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                 </svg>
                                 <div class="flex-1 min-w-0">
                                     <p class="font-medium text-gray-900 truncate dark:text-white"><span class="text-xs font-light text-gray-500 truncate dark:text-gray-400"">Arrival Time : </span>{{$order->start_date->format('d F Y')}}</p>
                                      <p class="font-medium text-gray-900 truncate  dark:text-white"><span class="text-xs font-light text-gray-500 truncate dark:text-gray-400"">Departure  Time : </span>{{$order->end_date->format('d F Y')}}</p>
                                 </div>
                             </div>
                     </td>
                     <td>
                         <div class="flex flex-row items-center justify-center gap-1 ">
                                                 <div class="font-medium text-center text-green-500 ">${{$order->total_amount}}</div>
                                 </div>
                     </td>

                     <td class="px-6 py-4  whitespace-nowrap">
                                                 <div class="flex flex-col justify-center">
                                                     <div class="text-gray-900 "> <a href="{{route('user.order.show', $order->invoice_id)}}">{{$order->destination->name}}</div>
                                                     <div class="text-gray-500">{{$order->destination->location}}</div>
                                                 </div>

                     </td>

                     <td>
                         <span class="flex justify-center">

                             @if($order->status === "pending")
                             <strong class="inline-block px-3 py-1 text-xs font-semibold text-yellow-600 bg-yellow-100 rounded-sm ">

                                 @elseif($order->status === "paid")
                                 <strong class="inline-block px-3 py-1 text-xs font-semibold text-green-600 bg-green-100 rounded-sm ">

                                     @else
                                     <strong class="inline-block px-3 py-1 text-xs font-semibold text-red-600 bg-red-100 rounded-sm ">

                                         @endif
                                         {{$order->status}}
                                     </strong>

                         </span>
                     </td>

                     <td>
                         <div class="flex flex-row items-baseline justify-center gap-2 pt-2 text-gray-400">
                             <a href="{{route('user.order.show', $order->invoice_id)}}" class="hover:text-teal-500">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6" viewBox="0 0 20 20" fill="currentColor">
                                     <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                     <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                 </svg>
                             </a>
                         </div>

                     </td>
                 </tr>
                 @endforeach

             </tbody>
         </table>
