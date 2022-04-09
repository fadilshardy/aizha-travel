        <div class="p-10 px-5 mx-auto md:pb-20 md:p-10 md:px-0">
            <div class="relative mb-8 text-center">
                <div class="max-w-xl mb-10 text-center md:mx-auto lg:max-w-2xl md:mb-12">
                    <div>
                        <p class="inline-block text-xs font-semibold text-teal-600 uppercase ">
                            top
                        </p>
                    </div>
                    <h2 class="max-w-lg mx-auto mb-6 font-sans text-4xl font-bold leading-none tracking-tight text-gray-900 sm:text-5xl">
                        Top locations
                    </h2>
                    <p class="text-base text-gray-700 md:text-lg">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic dolorum eligendi dolore deserunt amet labore.
                    </p>
                </div>
            </div>
            <section class="grid grid-cols-1 gap-10 md:grid-cols-2 xl:grid-cols-3">
                @foreach($top_locations as $location)
                <div class="relative w-full cursor-pointer hover:-translate-y-1 group">
                    <a href="{{route('user.destination.location', strtolower($location['name']))}}">

                        <div class="absolute top-0 left-0 w-full h-full opacity-80 bg-gradient-to-t from-black"></div>
                        <img class="object-fill w-full rounded-lg shadow-xl hover:shadow-2xl" src="{{$location['img_url']}}" />
                        <div class="absolute flex justify-center w-full px-4 -mt-20 text-lg text-white">
                            <div class="flex flex-col items-center truncate">
                                <span class="text-xl font-black tracking-wide capitalize ">{{$location['name']}}</span>
                                <span class="text-sm">{{$location['destination_count']}}</span>
                            </div>
                        </div>
                    </a>

                </div>

                @endforeach

            </section>
        </div>
