@extends('layouts.app')
@extends('layouts.header')
@section('content')

<div class="container h-full mx-auto">
    <a href="{{route('destination.index')}}" class="p-4 text-white bg-yellow-500 rounded ">Back</a>

    <div class="pt-5 mt-5 md:mt-0 md:col-span-2">
        <form action="{{route('destination.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="shadow sm:rounded-md sm:overflow-hidden">

                <div class="grid grid-cols-3 gap-6">
                    <div class=" sm:col-span-2">

                        <label for="company-website" class="block text-sm font-medium text-gray-700">
                            tags
                        </label>
                        <div class="flex mt-1 rounded-md shadow-sm">
                            <input class="w-full h-12 px-4 mb-2 text-lg text-gray-700 placeholder-gray-400 border rounded-lg focus:shadow-outline" type="text" placeholder="Large input" name="tags" />
                        </div>
                        <p class="mt-2 text-sm text-gray-500">
                            Separate Tags by Coma "," ex: Swimming, Hicking
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-6">
                    <div class=" sm:col-span-2">
                        <label for="company-website" class="block text-sm font-medium text-gray-700">
                            location
                        </label>
                        <div class="flex mt-1 rounded-md shadow-sm">
                            <input class="w-full h-12 px-4 mb-2 text-lg text-gray-700 placeholder-gray-400 border rounded-lg focus:shadow-outline" type="text" placeholder="Large input" name="location" />
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-6">
                    <div class=" sm:col-span-2">
                        <label for="company-website" class="block text-sm font-medium text-gray-700">
                            Total Days
                        </label>
                        <div class="flex mt-1 rounded-md shadow-sm">
                            <input class="w-full h-12 px-4 mb-2 text-lg text-gray-700 placeholder-gray-400 border rounded-lg focus:shadow-outline" type="text" placeholder="Large input" name="total_days" />
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-6">
                    <div class=" sm:col-span-2">
                        <label for="company-website" class="block text-sm font-medium text-gray-700">
                            price
                        </label>
                        <div class="flex mt-1 rounded-md shadow-sm">
                            <input class="w-full h-12 px-4 mb-2 text-lg text-gray-700 placeholder-gray-400 border rounded-lg focus:shadow-outline" type="text" placeholder="Large input" name="price" />
                        </div>
                    </div>
                </div>


                <div>
                    <label for="about" class="block text-sm font-medium text-gray-700">
                        Summary
                    </label>
                    <div class="mt-1">
                        <textarea id="about" name="summary" rows="3" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Summary"></textarea>
                    </div>
                    <p class="mt-2 text-sm text-gray-500">
                        Brief Summary for the destination.
                    </p>
                </div>



                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        Cover photo
                    </label>
                    <div class="flex justify-center px-6 pt-5 pb-6 mt-1 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="file-upload" class="relative font-medium text-indigo-600 bg-white rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="file-upload" name="images[]" type="file" class="sr-only" multiple="multiple">

                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">
                                PNG, JPG, GIF up to 10MB
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col px-5 gap-y-6">
                <div class="flex flex-col gap-1">
                    <label class="pr-2 text-xl text-gray-600"> Title <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full p-2 border-2 border-gray-300" name="name" id="title" required>
                </div>



                <div class="h-screen">
                    <textarea id="my-editor" name="description" rows="30" cols="100">{!! old('content', '') !!}</textarea>
                </div>

            </div>







            <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                </button>
            </div>
    </div>
    </form>


</div>
{{-- <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">
                    <form method="POST" action="action.php" class="flex flex-col">
                        <div class="mb-4">
                            <label class="text-xl text-gray-600"> Title <span class="text-red-500">*</span></label>
                            <input type="text" class="w-full p-2 border-2 border-gray-300" name="name" id="title" value="" required>
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Description</label>
                            <input type="text" class="w-full p-2 border-2 border-gray-300" name="description" id="description" placeholder="(Optional)">
                        </div>

                        <div class="mb-8">
                            <label class="text-xl text-gray-600">Content <span class="text-red-500">*</span></label>
                            <textarea name="content" class="border-2 border-gray-500">

                            </textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Cover photo
                            </label>
                            <div class="flex justify-center px-6 pt-5 pb-6 mt-1 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="file-upload" class="relative font-medium text-indigo-600 bg-white rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                            <span>Upload a file</span>
                                            <input id="file-upload" name="images[]" type="file" class="sr-only" multiple="multiple">

                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">
                                        PNG, JPG, GIF up to 10MB
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="flex p-1">
                            <button role="submit" class="p-3 text-white bg-blue-500 hover:bg-blue-400" required>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
</div>


</div>


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






@if ($errors->any())
<div class="">
    <ul>
        @foreach ($errors->all() as $error)
        <li class="w-64 p-2 mt-2 bg-red-400 rounded shadow-lg">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@endsection
