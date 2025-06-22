<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-2xl font-bold text-gray-700 mb-4">Welcome to Mini Friend Book!</h3>
                
                <p class="text-gray-600 mb-4">
                    Mini Friend Book is a simple and interactive platform that allows users to connect, share posts, and engage with others. It's designed as a basic social networking tool built using Laravel framework for learning and showcasing practical skills.
                </p>

                <h4 class="text-xl font-semibold text-gray-800 mt-4 mb-2">Key Features:</h4>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    <li>User registration and login functionality</li>
                    <li>Create, view, update, and delete posts</li>
                    <li>Like and unlike posts</li>
                    <li>View all posts from other users</li>
                    <li>Role-based access (e.g., Admin, User)</li>
                    <li>Clean UI using Laravel Breeze or Jetstream</li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
