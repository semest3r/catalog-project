<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto px-4 space-y-4">
            <div class="bg-white overflow-auto shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900">
                    <h1 class="text-xl font-semibold">Create Category</h1>
                    <form action="{{route('category.store')}}" method="post" class="mt-4 space-y-4">
                        @csrf
                        @method('POST')
                        <div class="space-y-1">
                            <label for="name" class="text-sm font-medium">Category Name</label>
                            <input type="text" class="w-full rounded-lg" name="name" id="name" value="{{$category->name}}" placeholder="Name...">
                            @error('name')
                            <p class="text-sm text-red-500 font-medium">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="space-y-1">
                            <label for="code" class="text-sm font-medium">Category Code</label>
                            <input type="text" class="w-full rounded-lg" name="code" id="code" value="{{$category->code}}" placeholder="Code...">
                            @error('code')
                            <p class="text-sm text-red-500 font-medium">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="space-y-1">
                            <label for="group_category" class="text-sm font-medium">Group Category</label>
                            <select class="w-full rounded-lg" name="group_category" id="group_category">
                                @foreach($group_categories as $group_category)
                                <option value="{{$group_category->id}}" @if($group_category->id === $category->group_category_id) selected @endif>{{$group_category->name}}</option>
                                @endforeach
                            </select>
                            @error('group_category_id')
                            <p class="text-sm text-red-500 font-medium">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="px-6 py-2 text-white font-medium bg-blue-500 hover:bg-blue-600 rounded-lg">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>