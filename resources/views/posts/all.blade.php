<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Posts') }}
        </h2>
    </x-slot>

    <div class="py-8 flex justify-center">
        <div class="w-full max-w-[600px]">
            @if($posts->count())
                <div class="flex flex-col gap-6">
                    @foreach($posts as $post)
                        <div id="post-{{ $post->id }}" class="w-[700px] bg-white shadow-md rounded-lg p-6 flex flex-col justify-between">
                            
                            @include('posts.post_data')
                            <br>
                            @auth
                                @php
                                    $liked = $post->isLikedBy(auth()->user());
                                    $unliked = $post->isUnlikedBy(auth()->user());
                                @endphp

                                 <div class="flex justify-between items-center mt-4">
                                {{-- Like / Unlike --}}

                                @include('posts.like_unlike')

                                @include('posts.edit_del')
                            </div>
                            @endauth
                        </div>
                    @endforeach
                </div>

                <div class="mt-6">
                    {{ $posts->links() }}
                </div>
            @else
                <p class="text-gray-500 text-center">No posts found.</p>
            @endif
        </div>
    </div>
</x-app-layout>
