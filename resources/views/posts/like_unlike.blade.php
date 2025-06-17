<div class="flex items-center gap-2" id="like-section-{{ $post->id }}">
    @php $liked = $post->isLikedBy(auth()->user()); @endphp

    @if(!$liked)
            <button class="like-btn bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700" data-id="{{ $post->id }}">
                        👍 Like
            </button>
    @else
            <button class="unlike-btn bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700" data-id="{{ $post->id }}">
                    👎 Unlike
            </button>
    @endif

            <div id="like-count-{{ $post->id }}">❤️  {{ $post->likes->count() }}</div>
</div>