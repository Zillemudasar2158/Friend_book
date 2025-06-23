<div>
    @php
        $search = request('search');
        $type = request('type');
    

        $title = $post->title;
        if ($type === 'title' && !empty($search) || $type === 'title1' && !empty($search)) 
        {
            $highlightedTitle = str_ireplace($search, "<span class='bg-green-900 text-white font-bold'>{$search}</span>", $title);
        } else {
            $highlightedTitle = $title;
        }
    @endphp

    <h3 class="text-lg font-semibold text-gray-900 mb-3">{!! $highlightedTitle !!}</h3>


    
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
    @php
        $author = $post->user->name;
        if ($type === 'name' && !empty($search)) {
            $highlightedAuthor = str_ireplace($search, "<span class='bg-green-900 text-white font-bold'>{$search}</span>", $author);
        } else {
            $highlightedAuthor = $author;
        }
    @endphp

    <p class="text-sm text-gray-600">Upload By:<b> {!! $highlightedAuthor !!}</b></p>
        post upload: {{ \Carbon\Carbon::parse($post->created_at)->format('d M, Y') }}
    </div>
</div>