<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/airbnb.css">


<div class="relative flex items-center justify-center h-16 text-xl font-bold text-white bg-gray-600 rounded-t-xl">
    Order Now
    <div class="absolute top-0 -mt-2 right-10">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-yellow-400 fill-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
        </svg>
    </div>

</div>
<form action="{{route('order.redirect')}}" method="POST" enctype="multipart/form-data" autocomplete="off" class="overflow-hidden shadow-lg rounded-b-xl">
    @csrf
    <input name="destination_id" type="hidden" value="{{$destination->id}}">
    <div class="flex flex-col justify-center w-full gap-4 p-4 bg-white">

        <div class="flex items-center px-4">
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <input name="date" type="text" id="datePicker" class=" border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full pl-12  p-2.5  dark:bg-gray-700 dark:border-gray-600 " placeholder="Pick Your Date">
            </div>
        </div>

        <div dr class="flex items-center px-4">
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <input name="quantity" min="1" class="border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full pl-12  p-2.5  dark:bg-gray-700 dark:border-gray-600 " type="number" placeholder="How Many Person?">
            </div>
        </div>



        <button type="submit" class="h-12 px-4 mx-6 my-2 text-lg font-bold capitalize bg-teal-700 btn hover:bg-teal-500 ">
            Book Now
        </button>
    </div>
</form>

@if ($errors->any())
<div class="">
    <ul>
        @foreach ($errors->all() as $error)
        <li class="w-64 p-2 mt-2 bg-red-400 rounded shadow-lg">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    flatpickr("#datePicker", {
        enableTime: false
        , altInput: true
        , altFormat: "F j, Y"
        , dateFormat: "d F Y"
        , minDate: "today"
        , theme: "airbnb"
    });

</script>

@endpush
