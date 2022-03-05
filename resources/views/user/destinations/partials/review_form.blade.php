<div class="flex flex-wrap justify-center" id="review">
    <div class="w-full">
        <div class="relative flex flex-col w-full mb-6 bg-white rounded-lg shadow-lg">
            <div class="flex-auto p-5">
                <h4 class="flex justify-center mb-4 text-2xl font-semibold text-black">Rate your experience with us?</h4>
                <form action="{{route('user.review.store', $destination->slug)}}" method="POST">
                    @csrf
                    <input type="hidden" name="destination_id" value="{{$destination->id}}">
                    <input type="hidden" name="user_id" value="{{Auth::id()}}">
                    <div class="flex flex-col items-center justify-center">
                        <div class="flex flex-wrap mt-10 space-x-3">
                            @for($i = 1; $i <= 5; $i++) <div>
                                <input type='radio' value='{{$i}}' name='rating' id='radio{{$i}}' class="hidden" />
                                <label for='radio{{$i}}' onclick="addActiveClass(this)" class="flex items-center justify-center w-10 h-10 font-bold text-gray-600 bg-gray-100 rounded-full cursor-pointer rating hover:bg-teal-500 hover:text-teal-50">{{$i}}</label>
                        </div>
                        @endfor
                    </div>
                    @error('rating') <p class="pt-6 text-sm text-red-500">{{ $message }}</p> @enderror


            </div>

            <div class="relative w-full mb-3">
                <label class="block mb-2 text-xs font-bold text-gray-700 uppercase">Title</label>
                <input type="input" value="{{ old('title')}}" name="title" class="w-full px-3 py-3 text-sm text-gray-800 bg-gray-300 border @error('title') border-red-500 @enderror  rounded shadow outline-none focus:bg-gray-100 " required />
                @error('title') <p class="pt-2 text-sm text-red-500">{{ $message }}</p> @enderror

            </div>
            <div class="relative w-full mb-3">
                <label class="block mb-2 text-xs font-bold text-gray-700 uppercase">Review</label>
                <textarea maxlength="300" name="review" value="{{ old('review')}}" rows="4" cols="80" class="w-full px-3 py-3 text-sm text-gray-800 border  @error('review') border-red-500 @enderror bg-gray-300 rounded shadow focus:outline-none focus:bg-gray-100" required>{{ old('review')}}</textarea>
                @error('review') <p class="pt-2 text-sm text-red-500">{{ $message }}</p> @enderror

            </div>
            <div class="mt-6 text-center">
                <button class="px-4 py-2 font-bold text-white capitalize bg-teal-700 rounded hover:bg-teal-600" type="submit">Submit
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
            opt[i].classList.remove('bg-teal-500');
            opt[i].classList.add('bg-gray-100');
            opt[i].classList.add('text-gray-600');
        }
        elem.classList.add('bg-teal-500');
        elem.classList.remove('bg-gray-100');
        elem.classList.remove('text-gray-600');
        elem.classList.add('text-white');
    }

</script>
@endpush
