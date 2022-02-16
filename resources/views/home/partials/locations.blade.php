        <div class="p-10 px-5 mx-auto md:pb-20 md:p-10 md:px-0">
            <div class="relative mb-8 text-center">
                <span class="absolute inset-x-0 h-px -translate-y-1/2 bg-black/10 top-1/2"></span>

                <h2 class="relative inline-block px-4 text-2xl font-bold text-center bg-white">
                    Top Locations
                </h2>
            </div>
            <section class="grid grid-cols-1 gap-10 md:grid-cols-2 xl:grid-cols-3">
                @foreach($destinations as $destination)
                <div class="relative w-full cursor-pointer hover:-translate-y-1 group">
                    <div class="absolute top-0 left-0 w-full h-full opacity-80 bg-gradient-to-t from-black"></div>
                    <img class="rounded-lg shadow-xl hover:shadow-2xl" src="{{$destination->getImageUrl()}}" />
                    <div class="absolute flex justify-center w-full px-4 -mt-20 text-lg text-white">
                        <div class="truncate">
                            <span class="text-xl font-black tracking-wide capitalize ">{{$destination->location}}</span>
                        </div>
                    </div>
                </div>
                @endforeach

            </section>
        </div>
