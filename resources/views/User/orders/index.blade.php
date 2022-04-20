 @extends('user.dashboard.partials.layout')

 @section('title', 'Orders')

 @section('main')


 <div class="w-full pt-8 overflow-hidden rounded-lg shadow-xs">

     <div class="w-full overflow-auto xl:overflow-hidden">
         @include('user.orders.partials.table')

     </div>
     <div class="flex py-3 mb-8 bg-gray-50">
         <div class="w-full mx-4">
             {!! $orders->links() !!}
         </div>
     </div>
 </div>



 @endsection
