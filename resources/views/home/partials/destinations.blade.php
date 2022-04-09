<article class="flex flex-col w-full max-w-md mx-auto overflow-hidden transform bg-white rounded-lg hover:shadow-lg hover:-translate-y-1 group">
    <img class="object-cover object-bottom rounded-t" src="{{$destination->getThumbnailUrl()}}" alt="" />

    <div class="mx-4 mt-3 ">
        <div class="flex items-start flex-1 gap-1 sm:justify-between">
            <h2 class="flex-grow text-xl font-bold tracking-tighter text-left text-gray-600 break-words hover:text-teal-500 "><a href="{{route('user.destination.show', $destination->slug)}}">{{$destination->name}}</a></h2>
        </div>
        <div class="flex flex-col mt-4 text-sm font-bold tracking-wide text-gray-500 uppercase gap-y-1">
            <div class="flex justify-between">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <a href="{{route('user.destination.location', strtolower($destination->location))}}"> {{$destination->location}}</a>
                </div>
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{$destination->total_days}} Days
                </div>
            </div>
            <div class="flex justify-between">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    ${{$destination->price}}
                    / person
                </div>

                <div class="flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                    </svg>
                    {{$destination->getAvgRating()}} ({{$destination->getTotalReviews()}} reviews)
                </div>
            </div>
        </div>
    </div>


    <p class="flex-1 m-2 text-sm leading-loose text-gray-800 sm:mt-4 line-clamp-2">{{$destination->summary}}</p>

    <div class="mx-4 mb-4">
        <a href="{{route('user.destination.show', $destination->slug)}}">
            <button class="invisible w-full p-2 mr-5 text-xl font-bold text-center text-white transition bg-teal-500 rounded duration-7000 hover:bg-teal-400 group-hover:visible">Book now</button>
        </a>
    </div>
</article>
