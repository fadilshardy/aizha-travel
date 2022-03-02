 @extends('layouts.app')
 @include('layouts.header')

 @section('content')

 <div class="flex min-h-screen pt-16">
     <nav class="">
         @include('admin.dashboard.partials.sidebar')
     </nav>

     <main class="flex-1 min-w-0 px-8 overflow-auto bg-indigo-50">

         <div class="container mx-auto md:px-6">
             @yield('main')
         </div>
     </main>
 </div>
 @endsection
