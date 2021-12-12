        <form action="{{route('order.redirect')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <input name="destination_id" type="hidden" value="{{$destination->id}}">
            <div class="flex flex-col justify-center w-full gap-2 p-4 bg-gray-100 rounded-lg">
                <div date-rangepicker class="flex items-center" id="dateRangePickerId">
                    <div class="relative w-1/2">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="text-gray-500 far fa-calendar hover:text-amber-500"></i>
                        </div>
                        <input name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Start of Date">
                    </div>
                    <span class="mx-4 text-gray-500">to</span>

                    <div class="relative w-1/2">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="text-gray-500 fas fa-calendar hover:text-amber-500"></i>
                        </div>
                        <input name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="End of Date">
                    </div>
                </div>

                <div class="flex-grow">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="text-gray-500 fas fa-user hover:text-amber-500 "></i>
                        </div>
                        <input name="quantity" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Number of Guest...">
                    </div>
                </div>
                <button type="submit" class="btn bg-amber-500 hover:bg-amber-400">order</button>
        </form>

        @push('scripts')
        <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/datepicker.bundle.js"></script>


        @endpush
