        {{-- <form action="{{route('destination.storeComment', $destination->id)}}" method="POST" class="w-full px-4 pt-2 rounded-lg bg-gray-50">
        @csrf
        <input type="hidden" name="destination_id" value="{{$destination->id}}">
        <input type="hidden" name="user_id" value="{{Auth::id()}}">
        <div class="hidden">{{$rating =  5}}</div>
        <span class="ml-2 text-sm text-gray-600"></span>
        <div class="flex flex-wrap mb-6 -mx-3">
            <div class="flex flex-col">
                <label for="" class="text-sm ">Title</label>
                <input type="text" class="h-6 text-gray-500">
            </div>
            <h2 class="px-4 pt-3 pb-2 text-lg text-gray-500">Add Comment</h2>
            <div class="w-full px-3 mt-2 mb-2 md:w-full">
                <textarea class="w-full h-20 px-3 py-2 font-medium leading-normal placeholder-gray-700 bg-white border border-gray-400 rounded resize-none focus:outline-none focus:bg-white" name="body" placeholder='Type Your Comment' required></textarea>
            </div>
            <div class="flex items-start w-full px-3 pt-1 md:w-full">
                <div class="flex items-center w-1/2 gap-2 px-2 mr-auto text-gray-700">
                    <img class="inline-block w-12 h-12 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                    {{Auth::user()->name;}}
                </div>
                <div class="pt-1 -mr-1">
                    <input type='submit' class="btn bg-amber-500 hover:bg-amber-400">
                </div>
            </div>
        </div>
        </form>
        <script>


        </script> --}}

        <div class="flex flex-wrap justify-center">
            <div class="w-full px-4">
                <div class="relative flex flex-col w-full mb-6 bg-white rounded-lg shadow-lg">
                    <div class="flex-auto p-5">
                        <h4 class="flex justify-center mb-4 text-2xl font-semibold text-black">Rate your experience with us?</h4>
                        <form action="{{route('destination.storeComment', $destination->id)}}" method="POST">
                            @csrf
                            <input type="hidden" name="destination_id" value="{{$destination->id}}">
                            <input type="hidden" name="user_id" value="{{Auth::id()}}">
                            <div class="flex flex-wrap justify-center mt-10 space-x-3">
                                @for($i = 1; $i <= 5; $i++) <div>
                                    <input type='radio' value='{{$i}}' name='rating' id='radio{{$i}}' class="hidden" />
                                    <label for='radio{{$i}}' onclick="addActiveClass(this)" class="flex items-center justify-center w-10 h-10 font-bold text-gray-600 bg-gray-100 rounded-full cursor-pointer rating hover:bg-amber-500 hover:text-amber-50">{{$i}}</label>
                            </div>
                            @endfor
                    </div>

                    <div class="relative w-full mb-3">
                        <label class="block mb-2 text-xs font-bold text-gray-700 uppercase">Title</label>
                        <input type="input" name="title" class="w-full px-3 py-3 text-sm text-gray-800 bg-gray-300 border-0 rounded shadow outline-none focus:bg-gray-100" required />
                    </div>
                    <div class="relative w-full mb-3">
                        <label class="block mb-2 text-xs font-bold text-gray-700 uppercase">Review</label>
                        <textarea maxlength="300" name="review" rows="4" cols="80" class="w-full px-3 py-3 text-sm text-gray-800 bg-gray-300 border-0 rounded shadow focus:outline-none focus:bg-gray-100" required></textarea>
                    </div>
                    <div class="mt-6 text-center">
                        <button class="btn bg-amber-500 hover:bg-amber-400" type="submit">Submit
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        @push('scripts')
        <script>
            function addActiveClass(elem, i) {
                var opt = document.getElementsByClassName('rating');
                for (i = 0; i < opt.length; i++) {
                    opt[i].classList.remove('bg-amber-500');
                    opt[i].classList.add('bg-gray-100');
                    opt[i].classList.add('text-gray-600');
                }
                elem.classList.add('bg-amber-500');
                elem.classList.remove('bg-gray-100');
                elem.classList.remove('text-gray-600');
                elem.classList.add('text-white');
            }

        </script>
        @endpush
