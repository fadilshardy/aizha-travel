 @extends('dashboard.partials.layout')

 @section('main')


 <section class="p-6 mt-8 text-gray-900 rounded-lg bg-gray-50">
     <form action="" class="container flex flex-col mx-auto space-y-12">

         <fieldset class="grid grid-cols-4 gap-6 p-6 bg-gray-100 rounded-md shadow-sm">
             <div class="space-y-2 col-span-full lg:col-span-1">
                 <p class="font-medium">Profile</p>
                 <p class="text-xs">Adipisci fuga autem eum!</p>
             </div>
             <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">
                 <div class="col-span-full sm:col-span-3">
                     <label for="username" class="text-sm">Name</label>
                     <input id="username" type="text" placeholder="Name" class="w-full p-2 form-input bg-white @error('name') border-red-500 @enderror" value="{{$user->name }}">
                 </div>
                 <div class="col-span-full sm:col-span-3">
                     <label for="website" class="text-sm">Email</label>
                     <input id="website" type="text" placeholder="https://" class="w-full p-2 form-input  @error('name') border-red-500 @enderror" value="{{$user->email}}" disabled>
                 </div>
                 <div class="col-span-full sm:col-span-3">
                     <label for="bio" class="text-sm">Photo</label>
                     <div class="flex items-center space-x-4">
                         <img src="{{$user->getThumbnailUrl()}}" alt="" class="object-cover w-12 h-12 bg-gray-300 bg-gray-500 rounded-full">
                         <button type="button" class="px-4 py-2 border border-gray-800 rounded-md hover:bg-teal-600 hover:text-white">Change</button>
                     </div>
                 </div>
                 <div class="flex items-end justify-end col-span-full sm:col-span-3">
                     <button type="submit" class="bg-teal-600 btn hover:bg-teal-500 ">Submit</button> </div>
             </div>
         </fieldset>
     </form>

     <form action="{{route('user.changePassword', $user->id)}}" method="post" class="container flex flex-col mx-auto space-y-12">
         @csrf
         @method('PUT')

         <fieldset class="grid grid-cols-4 gap-6 p-6 bg-gray-100 rounded-md shadow-sm">
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
                 </div>

                 <div class="flex items-end justify-end col-span-full ">
                     <button type="submit" class="bg-teal-600 btn hover:bg-teal-500 ">Submit</button>
                 </div>
             </div>
         </fieldset>
     </form>

     <form action="">

     </form>

 </section>


 @endsection
