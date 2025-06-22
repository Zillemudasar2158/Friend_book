<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Posts') }}
            </h2>
            <a href="{{ route('posts.create') }}"
               class="bg-slate-700 text-sm rounded-md text-white px-3 py-2">
               Create Post  +
            </a>
        </div>
    </x-slot>
<x-message />
    <div class="py-8 flex justify-center">
        
        <div class="w-full max-w-[600px]">
            @include('posts.search')
            @if($user && $user->posts->count())
                <div class="flex flex-col gap-6">
                    @foreach($user->posts as $post)
                        <div id="post-{{ $post->id }}" class="w-[700px] bg-white shadow-md rounded-lg p-6 flex flex-col justify-between">
                            
                            @include('posts.post_data')

                            <div class="flex justify-between items-center mt-4">
                                {{-- Like / Unlike --}}

                                @include('posts.like_unlike')

                                @include('posts.edit_del')
                            </div>

                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center text-gray-500 mt-10">
                    No posts found.
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
