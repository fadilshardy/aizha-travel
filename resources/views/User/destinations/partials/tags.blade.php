              <div class="flex flex-wrap items-center gap-2">
                  @foreach($tags as $tag)
                  <a href="{{route('user.destination.tag', $tag->name)}}" class="px-3 py-1 text-sm transition border border-gray-200 rounded-sm hover:bg-teal-500 hover:text-white">
                      {{$tag->name}} ({{$tag->destinations_count}})
                  </a>
                  @endforeach

              </div>
