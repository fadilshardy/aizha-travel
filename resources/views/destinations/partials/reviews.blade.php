        <div class="flex flex-col items-center justify-center" id="reviews">
            <h2 class="text-xl font-bold sm:text-2xl">Customer Reviews</h2>

            <div class="flex items-center mt-4">
                <p class="text-3xl font-medium">
                    {{$destination->getAvgRating()}}
                    <span class="sr-only"> Average review score </span>
                </p>

                <div class="ml-4">
                    <div class="flex -ml-1">
                        @for ($i = 1; $i <= 5; $i++) <i class="fas fa-star {{ ($i <= $destination->getAvgRating() ) ? "text-yellow-400" : 'text-gray-400';}}"></i> @endfor

                    </div>

                    <p class="mt-0.5 text-xs text-gray-500">Based on {{$destination->getTotalReviews()}} reviews</p>
                </div>
            </div>
        </div>

        <div class="space-y-8">
            @foreach($destination->reviews_paginated as $review)
            <div class="flex">
                <div class="w-full leading-relaxed rounded-lg shadow sm:px-6 sm:py-4">
                    <div class="flex flex-row items-center mb-2 gap-x-4">
                        <img class="object-cover w-12 h-12 mt-2 rounded-full" src="{{$review->user->getMedia('avatar')[0]->getUrl()}}" alt="">
                        <div class="flex flex-col">
                            <div class="flex items-baseline gap-2 text-sm">
                                <strong>{{$review->user->name}}</strong>
                                <div class="flex items-center mt-1 mb-1">
                                    @for ($i = 1; $i <= 5; $i++) <i class="fas fa-star {{ ($i <= $review->rating ) ? "text-yellow-400" : 'text-gray-400';}}"></i> @endfor
                                </div>
                            </div>
                            <span class="text-xs text-gray-400">{{$review->updated_at->diffForHumans();}}</span>
                        </div>
                    </div>



                    <div class="pt-1">
                        <h4 class="text-lg font-bold ">{{$review->title}}</h4>
                        <p class="text-sm text-gray-600">{{$review->review}}</p>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="row">
                <div class="flex items-center justify-center gap-5">
                    {{ $destination->reviews_paginated->links() }}

                </div>
            </div>

        </div>
