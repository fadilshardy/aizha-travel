 @extends('dashboard.partials.layout')

 @section('main')
 <div class="w-full h-full my-4 bg-white rounded-lg">
     <div class="p-8 border border-gray-200 rounded">

         <h1 class="text-base font-bold">Add User</h1>
         <p class="mt-6 text-gray-600">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos dolorem vel cupiditate laudantium dicta.</p>
         <form>
             <div class="grid gap-4 mt-8 lg:grid-cols-2">
                 <div> <label for="name" class="block mb-1 text-sm font-medium text-gray-700">Name</label> <input type="text" name="name" id="name" class="block w-full px-3 py-1 text-gray-700 bg-gray-100 border border-gray-200 rounded focus:ring-blue-500 focus:border-blue-500" placeholder="Enter your name" /> </div>
                 <div> <label for="email" class="block mb-1 text-sm font-medium text-gray-700">Email Adress</label> <input type="text" name="email" id="email" class="block w-full px-3 py-1 text-gray-700 bg-gray-100 border border-gray-200 rounded focus:ring-blue-500 focus:border-blue-500" placeholder="yourmail@provider.com" /> </div>
                 <div> <label for="job" class="block mb-1 text-sm font-medium text-gray-700">Job title</label> <input type="text" name="job" id="job" class="block w-full px-3 py-1 text-gray-700 bg-gray-100 border border-gray-200 rounded focus:ring-blue-500 focus:border-blue-500" placeholder="(ex. developer)" /> </div>
                 <div> <label for="brithday" class="block mb-1 text-sm font-medium text-gray-700">Birthday</label> <input type="text" name="brithday" id="brithday" class="block w-full px-3 py-1 text-gray-700 bg-gray-100 border border-gray-200 rounded focus:ring-blue-500 focus:border-blue-500" placeholder="(01/01/1993)" /> </div>
             </div>
             <div class="mt-8 space-x-4"> <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50">Save</button> <!-- Secondary --> <button class="px-4 py-2 text-gray-600 bg-white border border-gray-200 rounded hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50">Cancel</button> </div>
         </form>
     </div>
 </div>


 @endsection
