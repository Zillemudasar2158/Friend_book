@if(auth()->user()->is($post->user))
    {{-- Edit / Delete --}}
    <div class="flex items-center gap-2">
        <a href="{{ route('posts.edit', $post->id) }}"
           class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 text-sm rounded-md">
            Edit
        </a>
        <button 
            type="button"
            class="delete-btn bg-red-600 hover:bg-red-700 text-white px-3 py-1 text-sm rounded-md" 
            data-id="{{ $post->id }}">
            Delete
        </button>
    </div>
@endif
