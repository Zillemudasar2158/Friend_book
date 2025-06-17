<x-app-layout>
    <x-slot name="header">
       <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Posts') }}
            </h2>
            <a href="{{ route('posts') }}"
               class="bg-slate-700 text-sm rounded-md text-white px-3 py-2">
                Back
            </a>
        </div>
    </x-slot>



    <div class="py-8">
            <x-message></x-message>

                <div class="flex flex-col gap-6">
                        <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6 h-auto flex flex-col justify-between">
                            
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-3">{{ $post->title }}</h3>
                                <hr class="mb-3">

                                @if($post->image)
                                    <img src="{{ asset($post->image) }}" class="w-full h-[300px] object-cover mb-4 rounded">
                                @endif

                               <p class="text-sm text-gray-700 h-auto relative mb-3">
                                    {{ $post->body }}
                                </p>
                                <div class="text-xs text-gray-500">
                                    Author: <span class="font-medium">{{ $post->user->name }}</span><br>
                                    Created: {{ \Carbon\Carbon::parse($post->created_at)->format('d M, Y') }}
                                </div>
                            </div>

                            <div class="flex justify-between items-center mt-4">
                                {{-- Like / Unlike --}}
                               
                                @include('posts.like_unlike')

                                @include('posts.edit_del')
                            </div>
                        </div>
                </div>
        </div>
</x-app-layout>
