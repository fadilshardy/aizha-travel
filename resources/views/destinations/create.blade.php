 @extends('dashboard.partials.layout')

 @section('main')

 <div class="w-full h-full my-4 bg-white rounded-lg">
     <div class="p-8 rounded-lg">
         <div class="flex flex-col">
             <div class="pb-8">
                 <a href="{{route('destination.index')}}" class="py-1 font-medium bg-teal-700 btn Capitalize">back</a>
             </div>

             <h1 class="text-base font-bold">Add Destination</h1>
         </div>
         @if ($errors->any())
         <div class="">
             <ul>
                 @foreach ($errors->all() as $error)
                 <li class="w-64 p-2 mt-2 bg-red-400 rounded shadow-lg">{{ $error }}</li>
                 @endforeach
             </ul>
         </div>
         @endif
         <form action=" {{route('destination.store')}}" method="POST" enctype="multipart/form-data">
             @csrf
             <div class="grid gap-4 mt-8 text-sm lg:grid-cols-2 ">
                 <div class="col-span-2 lg:col-span-1">
                     <label for="name" class="form-label">
                         Name <span class="text-red-500">*</span>
                     </label>
                     <input type="text" name="name" id="name" class="block w-full px-2 py-2  form-input @error('name') border-red-500 @enderror" placeholder="destination name" value="{{ old('name')}}" />
                     @error('name') <p class="pl-2 text-xs text-red-500">{{ $message }}</p> @enderror
                 </div>

                 <div class="col-span-2 lg:col-span-1">
                     <label for="tags" class="form-label">Tags <span class="text-red-500">*</span> <span class="text-xs text-gray-500">(Separate Tags by Coma ",")</span></label>
                     <input type="text" name="tags" id="tags" class="block w-full px-2 py-2 form-input @error('tags') border-red-500 @enderror" placeholder=" ex: Swimming, Hicking" value="{{ old('tags')}}" />
                     @error('tags') <p class="pl-2 text-xs text-red-500">{{ $message }}</p> @enderror
                 </div>
                 <div class="col-span-2 lg:col-span-1">
                     <div class="flex flex-col w-full gap-2 lg:flex-row ">
                         <div class="w-full ">
                             <label for="price" class="form-label">Price <span class="text-red-500">*</span>
                             </label>
                             <input type="number" name="price" id="price" class="block w-full px-2 py-2 form-input @error('price') border-red-500 @enderror" placeholder="destination package price" value="{{ old('price')}}" />
                             @error('price') <p class="pl-2 text-xs text-red-500">{{ $message }}</p> @enderror
                         </div>

                         <div class="w-full">
                             <label for="total_days" class="form-label">Duration <span class="text-red-500">*</span> <span class="text-xs text-gray-500">(day)</span></label>
                             <input type="number" name="total_days" id="job" class="block w-full px-2 py-2 form-input @error('total_days') border-red-500 @enderror" placeholder="duration of the package" value="{{ old('total_days')}}" />
                             @error('total_days') <p class="pl-2 text-xs text-red-500">{{ $message }}</p> @enderror
                         </div>
                     </div>
                 </div>

                 <div class="col-span-2 lg:col-span-1">
                     <label for="location" class="form-label">Location <span class="text-red-500">*</span> </label>
                     <input type="text" name="location" id="tags" class="block w-full px-2 py-2 form-input @error('tags') border-red-500 @enderror" placeholder=" destination location" value="{{ old('location')}}" />
                     @error('location') <p class="pl-2 text-xs text-red-500">{{ $message }}</p> @enderror
                 </div>


                 <div class="col-span-2">
                     <div class="grid grid-cols-1 ">
                         <label class="form-label">Upload Photo<span class="text-red-500">*</span> : <span class="pl-2" id="imgCover"></span> </label>
                         <div class="flex items-center justify-center w-full">
                             <label class="flex flex-col w-full h-32 border-4 border-dashed hover:bg-gray-100 hover:border-teal-300 group">
                                 <div class="flex flex-col items-center justify-center pt-7">
                                     <svg class="w-10 h-10 text-teal-400 group-hover:text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                     </svg>
                                     <p class="pt-1 text-sm tracking-wider text-gray-400 lowercase group-hover:text-teal-600">Select a photo</p>
                                 </div>
                                 <input type="file" class="hidden" onchange="showname()" id="fileInput" name="images[]" value="{{ old('images[]')}}" />
                             </label>

                         </div>
                         @error('images') <p class="pl-2 text-xs text-red-500">{{ $message }}</p> @enderror

                     </div>
                 </div>

                 <div class="col-span-2">
                     <label for="about" class="block text-sm font-medium text-gray-700">
                         Summary <span class="text-red-500">*</span> </span>
                     </label>
                     <div class="mt-1">
                         <textarea id="about" name="summary" rows="4" class="block w-full px-2 py-2 form-input" placeholder="Brief Summary for the destination">{!! old('summary', '') !!}</textarea>
                     </div>
                     @error('summary') <p class="pl-2 text-xs text-red-500">{{ $message }}</p> @enderror

                 </div>


             </div>

             <div class="h-screen py-4 ">
                 <label for="description" class="block mb-1 text-sm font-medium text-gray-700 ">Description <span class="text-red-500">*</span></label>
                 @error('description')
                 <div class="flex items-center pb-2 mt-2 text-red-600">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                     </svg>
                     <p class="ml-2 text-sm">
                         <strong> Error: </strong>
                         <p class="pl-2 text-xs text-red-500">{{ $message }}</p>
                     </p>
                 </div>
                 @enderror

                 <textarea id="my-editor" name="description" rows="30" cols="100">{!! old('content', '') !!}</textarea>
             </div>
             <div class="mt-8 space-x-4">
                 <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50">Save</button> <!-- Secondary -->
                 <button class="px-4 py-2 text-gray-600 bg-white border border-gray-200 rounded hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50">Cancel</button>
             </div>

         </form>

     </div>

 </div>


 @endsection

 @push('scripts')
 <script src="https://cdn.ckeditor.com/4.17.1/standard-all/ckeditor.js"></script>
 <script>
     var options = {

         width: '100%'
         , height: '80vh'
         , removeButtons: 'PasteFromWord'
         , filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images'
         , filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}'
         , filebrowserBrowseUrl: '/laravel-filemanager?type=Files'
         , filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'

     };

     CKEDITOR.config.extraPlugins = ['justify', 'image2'];


     CKEDITOR.replace('my-editor', options);

 </script>

 <script>
     function showname() {
         const name = document.getElementById('fileInput');
         document.getElementById('imgCover').innerHTML = name.files.item(0).name;
     };

 </script>

 @endpush
