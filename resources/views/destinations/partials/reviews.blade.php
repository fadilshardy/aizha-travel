        <h3 class="mb-4 text-lg font-semibold text-gray-900">Reviews</h3>
        <div class="space-y-4">
            @foreach($destination->reviews as $review)
            <div class="flex">
                <div class="flex-shrink-0 mr-3">
                    <img class="w-8 h-8 mt-2 rounded-full sm:w-10 sm:h-10" src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80" alt="">
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
