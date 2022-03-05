 @extends('dashboard.partials.layout')

 @section('main')



 <section class="pt-4 md:pt-0">
     <div class="max-w-2xl py-0 mx-auto md:py-16">
         <div class="hidden pb-4 md:block">
             <a href="#" class="py-1 font-medium bg-teal-700 btn Capitalize">back</a>
         </div>
         <article class="overflow-hidden shadow-none md:shadow-md md:rounded-md">
             <div class="bg-white md:rounded-b-md">
                 <div class="border-b border-gray-200 p-9">
                     <div class="space-y-6">
                         <div class="flex justify-between items-top">
                             <div class="space-y-4">
                                 <div>
                                     <p class="text-lg font-bold">Order History</p>
                                     <p class="flex items-center gap-2 text-base font-bold text-gray-600 hover:text-teal-700 group"> <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" class="w-10 h-10 text-gray-700 group-hover:text-teal-700" viewBox="0 0 24 24" fill="currentColor">
                                             <path d="M19.3,16.9c0.4-0.7,0.7-1.5,0.7-2.4c0-2.5-2-4.5-4.5-4.5S11,12,11,14.5s2,4.5,4.5,4.5c0.9,0,1.7-0.3,2.4-0.7l3.2,3.2 l1.4-1.4L19.3,16.9z M15.5,17c-1.4,0-2.5-1.1-2.5-2.5s1.1-2.5,2.5-2.5s2.5,1.1,2.5,2.5S16.9,17,15.5,17z M12,20v2 C6.48,22,2,17.52,2,12C2,6.48,6.48,2,12,2c4.84,0,8.87,3.44,9.8,8h-2.07c-0.64-2.46-2.4-4.47-4.73-5.41V5c0,1.1-0.9,2-2,2h-2v2 c0,0.55-0.45,1-1,1H8v2h2v3H9l-4.79-4.79C4.08,10.79,4,11.38,4,12C4,16.41,7.59,20,12,20z" />
                                         </svg>
                                         Aizha Travel</p>
                                 </div>
                                 <div>
                                     <p class="text-sm font-medium text-gray-400"> Customer Information </p>
                                     <p>{{$order->user->name}}</p>
                                     <p>{{$order->user->email}}</p>
                                 </div>
                                 <div>
                                     <p class="text-sm font-medium text-gray-400">Arrival Time</p>
                                     <p> {{$order->start_date->format('d F Y')}}</p>
                                 </div>
                             </div>
                             <div class="space-y-2">
                                 <div>
                                     <p class="text-sm font-medium text-gray-400"> Invoice Number </p>
                                     <p> #{{$order->invoice_id}} </p>
                                 </div>
                                 <div>
                                     <p class="text-sm font-medium text-gray-400"> Invoice Due Until</p>
                                     <p> {{$order->created_at->format('d F Y')}}</p>
                                 </div>

                                 <div>
                                     <p class="text-sm font-medium text-gray-400">Order Status</p>
                                     <p> {{$order->status}}</p>
                                 </div>
                                 <div>
                                     <p class="text-sm font-medium text-gray-400">Departure Time</p>
                                     <p> {{$order->end_date->format('d F Y')}}</p>
                                 </div>

                                 <div>
                                     <a href="#" target="_blank" class="inline-flex items-center text-sm font-medium text-blue-500 hover:opacity-75 "> Download PDF <svg class="ml-0.5 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                             <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"></path>
                                             <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"></path>
                                         </svg>
                                     </a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="border-b border-gray-200 p-9">
                     <p class="text-sm font-medium text-gray-400"> Note </p>
                     <p class="text-sm"> {{$order->note}}</p>
                 </div>
                 <table class="w-full text-sm divide-y divide-gray-200">
                     <thead>
                         <tr class="flex justify-between py-4 px-9">
                             <th scope="col" class="font-semibold text-left text-gray-400"> Name </th>
                             <th scope="col" class="font-semibold text-left text-gray-400"> Person</th>
                         </tr>
                     </thead>
                     <tbody class="divide-y divide-gray-200 ">
                         <tr class="flex justify-between py-4 px-9">
                             <td class="flex items-center space-x-1 whitespace-nowrap">
                                 <div>
                                     <p> {{$order->destination->name}} </p>
                                     <p class="text-sm text-gray-400"> {{$order->destination->location}} ({{$order->total_days}} days)</p>
                                 </div>
                             </td>
                             <td class="flex justify-end w-full ">{{$order->quantity}}</td>
                         </tr>

                     </tbody>
                 </table>
                 <div class="border-b border-gray-200 px-9">
                     <div class="space-y-3">
                         <div class="flex justify-between">
                             <div>
                                 <p class="text-sm text-gray-500"> Price / Person </p>
                             </div>
                             <p class="text-sm text-gray-500"> ${{$order->destination->price}} </p>
                         </div>
                         <div class="flex justify-between">
                             <div>
                                 <p class="text-sm text-gray-500"> Tax </p>
                             </div>
                             <p class="text-sm text-gray-500"> $0.00 </p>
                         </div>
                         <hr class="px-4 text-gray-200">
                         <div class="flex justify-between">
                             <div class="pb-8">
                                 <p class="text-sm text-gray-500"> Total </p>
                             </div>
                             <p class="text-sm text-gray-500"> ${{$order->total_amount}} </p>
                         </div>
                     </div>
                 </div>
                 <div class="border-b border-gray-200 p-9">
                     <div class="space-y-3">
                         <div class="flex justify-between">
                             <div>
                                 <p class="text-lg font-bold text-black"> Amount Due </p>
                             </div>
                             <p class="text-lg font-bold text-black"> ${{$order->total_amount}}</p>
                         </div>
                     </div>
                 </div>
             </div>
         </article>
     </div>
 </section>

 @endsection
