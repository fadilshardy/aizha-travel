<div class="flex flex-col gap-6">
    @foreach ($destination->similiar_destinations() as $similiarDestination)

    <div class="overflow-hidden transform bg-white rounded-lg shadow hover:-translate-y-1 group">
        <div class="relative flex flex-col mx-auto space-y-1 ">
            <div class="w-full bg-white h-28">
                <img src="{{$similiarDestination->getImageUrl()}}" alt="tailwind logo" class="object-cover w-full h-full " />
            </div>
            <div class="flex flex-col w-full px-4 pb-2 space-y-2 bg-white">
                <div class="flex items-end justify-between gap-x-4">
                    <div class="flex items-center ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 " viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <p class="ml-1 text-sm font-bold text-gray-600 line-clamp-1 ">
                            {{$similiarDestination->getAvgRating()}}
                            <span class="font-normal text-gray-500 ">({{$destination->getTotalReviews()}} reviews)</span>
                        </p>
                    </div>
                    <div class="flex items-center justify-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                        </svg>
                        <span class="w-full text-sm text-gray-600 line-clamp-1">{{$similiarDestination->location}}</span>
                    </div>
                </div>
                <h3 class="text-lg font-bold text-gray-800 break-all truncate hover:text-teal-800"><a href="{{route('user.destination.show', $similiarDestination->slug)}}">{{$similiarDestination->name}}</a></h3>
                <p class="text-sm text-gray-500 line-clamp-1">{{$similiarDestination->summary}}</p>
                <div class="flex items-end justify-between">
                    <div class="text-xs font-bold text-gray-800 xl:text-base">
                        ${{$similiarDestination->price}}
                        <span class="text-xs font-normal text-gray-600 xl:text-sm">/ person</span>
                    </div>
                    <a href="#" class="text-xs text-gray-600 sm:font-semibold xl:text-sm hover:text-teal-600 ">Check More</a>
                </div>

            </div>
        </div>
    </div>
    @endforeach

</div>
