        <h3 class="mb-4 text-2xl font-bold text-center text-gray-900">Reviews From Our Costumers</h3>
        <div class="space-y-6">
            @foreach($destination->reviews as $review)
            <div class="flex">
                <div class="w-full leading-relaxed rounded-lg shadow sm:px-6 sm:py-4">
                    <div class="flex flex-row items-center mb-2 gap-x-4">
                        <img class="object-cover w-12 h-12 mt-2 rounded-full" src="{{$review->user->getMedia('avatar')[0]->getUrl()}}" alt="">
                        <div class="flex flex-col">
                            <div class="flex items-baseline gap-2 text-sm">
                                <strong>{{$review->user->name}}</strong>
                                <div class="flex items-center mt-1 mb-1">
                                    @for ($i = 1; $i <= 5; $i++) <i class="fas fa-star {{ ($i <= $review->rating ) ? "text-amber-500" : 'text-gray-400';}}"></i> @endfor
                                        <span class="ml-2 text-sm text-gray-600"></span>
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
        </div>
