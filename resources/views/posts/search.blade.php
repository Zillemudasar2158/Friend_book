<div class="my-4">
    <form method="GET" action="{{ route('search') }}" class="flex flex-wrap items-center gap-3">
        	@if(request()->routeIs('posts') || request('type') == 'title1')
            <input type="hidden" name="type" value="title1">
                <p>Search my Post Title</p>
            @else
            <select name="type" class="border border-gray-300 shadow-sm rounded-lg px-4 py-1">
            <option value="title" {{ request('type') == 'title' ? 'selected' : '' }}>Search by post title</option>
            <option value="name" {{ request('type') == 'name' ? 'selected' : '' }}>Search by upload user</option>     
            @endif       
        </select>
        <input 
            type="text" 
            name="search" 
            value="{{ request('search') }}" 
            class="border border-gray-300 shadow-sm rounded-lg px-4 py-1" 
            placeholder="Search text"
        >
        <button class="bg-slate-700 text-sm rounded-sm text-white px-5 py-1 hover:bg-slate-800">
            Search
        </button>
    </form>
    @error('search')
        <p class="text-red-500 font-medium mt-2">{{ $message }}</p>
    @enderror
</div><br>
