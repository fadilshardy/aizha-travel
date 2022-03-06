 @extends('user.dashboard.partials.layout')

 @section('main')


 <section class="p-6 mt-8 text-gray-900 bg-gray-100 rounded-lg">
     <form action="{{route('user.update', $user->id)}}" class="container flex flex-col mx-auto space-y-12" method="POST" enctype="multipart/form-data">
         @csrf
         @method('PUT')

         <div class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm bg-gray-50">
             <div class="space-y-2 col-span-full lg:col-span-1">
                 <p class="font-medium">Profile</p>
                 <p class="text-xs">Profile Settings</p>
             </div>
             <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">
                 <div class="col-span-full sm:col-span-3">
                     <label for="name" class="text-sm">Name</label>
                     <input id="name" type="text" name="name" placeholder="Name" class="w-full p-2 form-input bg-white @error('name') border-red-500 @enderror" value="{{$user->name }}">
                 </div>
                 <div class="col-span-full sm:col-span-3">
                     <label for="email" class="text-sm">Email</label>
                     <input id="email" type="text" class="w-full p-2 form-input  disabled:bg-gray-200 disabled:opacity-75 @error('email') border-red-500 @enderror" value="{{$user->email}}" disabled>
                 </div>
                 <div class="col-span-full sm:col-span-3">
                     <label for="bio" class="text-sm" id="imgCover">Photo</label>
                     <div class="flex items-center space-x-4">
                         <img src="{{$user->getThumbnailUrl()}}" alt="" class="object-cover w-16 h-16 bg-gray-500 rounded-full">
                         <input type="file" id="file" name="avatar" />
                     </div>
                 </div>
                 <div class="flex items-end justify-end col-span-full sm:col-span-3">
                     <button type="submit" class="btn-dashboard">Submit</button>
                 </div>
             </div>
         </div>
     </form>

     <form action="{{route('user.changePassword')}}" method="post" class="container flex flex-col mx-auto space-y-12">
         @csrf
         @method('PUT')

         <div class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm bg-gray-50">
             <div class="space-y-2 col-span-full lg:col-span-1">
                 <p class="font-medium">Password</p>
                 <p class="text-xs">Update Password</p>
             </div>
             <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">
                 <div class="col-span-full sm:col-span-3">
                     <label for="current_password" class="text-sm">Current Password</label>
                     <input id="current_password" name="current_password" type="password" class="w-full p-2 form-input bg-white  @error('current_password') border-red-500 @enderror" value="">
                     @error('current_password') <p class="pl-2 text-xs text-red-500">{{ $message }}</p> @enderror

                 </div>
                 <div class="col-span-full sm:col-span-3">
                     <label for="new_password" class="text-sm">New Password</label>
                     <input id="new_password" name="new_password" type="password" class="w-full p-2 form-input bg-white  @error('new_password') border-red-500 @enderror" value="">
                     @error('new_password') <p class="pl-2 text-xs text-red-500">{{ $message }}</p> @enderror

                 </div>

                 <div class="flex items-end justify-end col-span-full ">
                     <button type="submit" class="btn-dashboard ">Submit</button>
                 </div>
             </div>
         </div>
     </form>

 </section>



 @endsection
