        <h3 class="mb-4 text-lg font-semibold text-gray-900">Reviews</h3>
        <div class="space-y-4">
            @foreach($destination->reviews as $review)
            <div class="flex">
                <div class="flex-shrink-0 mr-3">
                    <img class="object-cover w-16 h-16 mt-2 rounded-full" src="{{$review->user->getMedia('avatar')[0]->getUrl()}}" alt="">
                </div>
                <div class="flex-1 px-4 py-2 leading-relaxed border rounded-lg sm:px-6 sm:py-4">
                    <div class="flex items-baseline gap-2 text-sm">
                        <strong>{{$review->user->name}}</strong>
                        <div class="flex items-center mt-1">
                            @for ($i = 1; $i <= 5; $i++) <i class="fas fa-star {{ ($i <= $review->rating ) ? "text-amber-500" : 'text-gray-400';}}"></i> @endfor
                                <span class="ml-2 text-sm text-gray-600"></span>
                        </div>
                    </div>
                    <span class="text-xs text-gray-400">{{$review->updated_at->diffForHumans();}}</span>

                    <p class="pt-1 text-sm">
                        <span class="font-bold ">{{$review->title}}</span>
                        <h4>{{$review->review}}</h4>
                    </p>
                </div>
            </div>
            @endforeach
        </div>
