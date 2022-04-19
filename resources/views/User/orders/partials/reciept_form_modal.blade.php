<div id="modal" class="fixed inset-0 z-50 hidden w-full h-full px-4 overflow-y-auto bg-gray-900 bg-opacity-60">
    <div class="relative max-w-md mx-auto bg-white rounded-md shadow-lg top-40">

        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-t-md ">
            <h3>reciept</h3>
            <button onclick="closeModal()"><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hover:text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg></button>
        </div>
        <form action=" {{route('user.order.payment', $order->invoice_id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Modal body -->
            <div class="p-4 overflow-y-scroll max-h-48">

                <div class="col-span-2">
                    <div class="grid grid-cols-1 ">

                        <label class="form-label">Upload receipt : <span class="pl-2" id="imgCover"></span> </label>
                        <div class="flex items-center justify-center w-full">
                            <label class="flex flex-col w-full h-32 border-4 border-dashed hover:bg-gray-100 hover:border-teal-300 group">
                                <div class="flex flex-col items-center justify-center pt-7">
                                    <svg class="w-10 h-10 text-teal-400 group-hover:text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <p class="pt-1 text-sm tracking-wider text-gray-400 lowercase group-hover:text-teal-600">Select a photo</p>
                                </div>
                                <input type="file" class="hidden" onchange="showname()" id="fileInput" name="reciept" value="{{ old('reciept')}}" />
                            </label>

                        </div>
                        @error('reciept') <p class="pl-2 text-xs text-red-500">{{ $message }}</p> @enderror

                    </div>
                </div>

            </div>

            <!-- Modal footer -->
            <div class="flex items-center justify-end px-4 py-2 space-x-4 border-t border-t-gray-500">
                <div class="flex justify-between w-full">
                    <button class="btn-dashboard" type="submit">Submit</button>

                    <button class="bg-gray-400 btn-dashboard" onclick="closeModal()">Close</button>

                </div>
            </div>
        </form>
    </div>
</div>


<script type="text/javascript">
    function openModal(modalId) {
        modal = document.getElementById(modalId)
        modal.classList.remove('hidden')
    }

    function closeModal() {
        modal = document.getElementById('modal')
        modal.classList.add('hidden')
    }

</script>
