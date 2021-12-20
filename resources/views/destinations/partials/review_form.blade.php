<div class="flex flex-wrap justify-center">
    <div class="w-full px-4">
        <div class="relative flex flex-col w-full mb-6 bg-white rounded-lg shadow-lg">
            <div class="flex-auto p-5">
                <h4 class="flex justify-center mb-4 text-2xl font-semibold text-black">Rate your experience with us?</h4>
                <form action="{{route('destination.storeReview', $destination->slug)}}" method="POST">
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
