 @extends('layouts.app')
 @include('layouts.header')

 @section('content')

 <div class="flex min-h-screen pt-16">
     <nav class="w-56">
         @include('dashboard.partials.sidebar')
     </nav>

     <main class="flex-1 min-w-0 px-2 overflow-auto bg-indigo-50">
         <div class="container px-6 mx-auto">

             @yield('main')
         </div>
     </main>
 </div>
 @endsection
