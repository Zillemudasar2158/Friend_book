<div>
    <h3 class="text-lg font-semibold text-gray-900 mb-3">{{ $post->title }}</h3>
    <hr class="mb-3">

    @if($post->image)
        <div class="flex justify-center">
            <img src="{{ $post->image }}" alt="Post Image" class="w-full max-w-[450px] h-[250px] object-cover rounded mb-4">
        </div>
    @endif

   <p>
        {{ Str::limit($post->body, 250) }}
        @if(Str::length($post->body) > 250)
        <a href="{{ route('posts.show', $post->id) }}" target="_blank" 
           class="text-blue-600 text-sm hover:underline">
            <b>   Read More →</b>
        </a>
    @endif
    </p>
    <br><hr>
    <div class="text-xs text-gray-500">
        upload by: <span class="font-medium">{{ $post->user->name }}</span><br>
        post upload: {{ \Carbon\Carbon::parse($post->created_at)->format('d M, Y') }}
    </div>
</div>