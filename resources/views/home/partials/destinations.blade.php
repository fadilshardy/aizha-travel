<article class="flex flex-col pb-5 mx-auto duration-500 transform hover:-translate-y-1 group ">
    <div class="overflow-hidden h-[30rem]">
        <img class="object-cover object-bottom duration-300 transform group-hover:scale-110" src="{{$destination->getImageUrl()}}" alt="" />
    </div>
    <div class="flex items-start gap-1 mt-3 sm:justify-between">
        <h2 class="flex-grow text-2xl font-bold tracking-tighter text-left text-blue-800 break-words hover:text-blue-700 "><a href="{{route('destination.show', $destination->slug)}}">{{$destination->name}}</a></h2>
        <div class="flex items-center mt-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-500 fill-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
            </svg>
            <div class="ml-2 font-bold text-gray-500">{{$destination->getAvgRating()}}</div>
        </div>
    </div>
    <div class="flex flex-row flex-wrap items-center justify-center gap-2 mt-4 text-sm font-bold tracking-wide text-gray-500 uppercase 2xl:text-sm sm:gap-0 sm:justify-between">
        <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            {{$destination->location}}
        </div>
        <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{$destination->total_days}} Days
        </div>
        <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            ${{$destination->price}}
            / person
        </div>
    </div>
    <p class="m-2 mt-2 text-sm leading-loose text-gray-800 sm:mt-4">{{$destination->summary}}</p>
    <a href="{{route('destination.show', $destination->slug)}}"><button class="items-end self-end w-full p-2 mt-3 text-xl font-bold text-white duration-300 transform bg-teal-500 rounded hover:bg-teal-400">Book Now</button></a>
</article>
