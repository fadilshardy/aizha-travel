         <table class="w-full py-2 pt-2 whitespace-no-wrap">
             <thead>
                 <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">

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
                 </tr>
             </thead>
             <tbody class="w-full bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                 @foreach ($orders as $order)
                 <tr class="overflow-y-scroll text-xs text-gray-700 dark:text-gray-400 ">

                     <td>
                         <div class="flex flex-row items-center justify-center gap-1">
                             <div class="font-medium text-center text-green-500 ">${{$order->total_amount}}</div>
                         </div>
                     </td>

                     <td class="px-6 py-4 whitespace-nowrap">
                         <div class="flex flex-col justify-center">
                             <div class="text-gray-900 "> <a href="{{route('user.order.show', $order->id)}}">{{$order->destination->name}}</div>
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


                 </tr>
                 @endforeach

             </tbody>
         </table>
