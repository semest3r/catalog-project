<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto px-4 space-y-4">
            <div class="bg-white overflow-auto shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900">
                    <h1 class="text-xl font-semibold">Create Product</h1>
                    @error('errors')
                    <p class="p-2 w-full bg-red-100 text-sm text-red-500 font-medium rounded-lg">{{$message}}</p>
                    @enderror
                    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data" class="mt-4 space-y-4">
                        @csrf
                        @method('POST')
                        <div class="space-y-1">
                            <label for="name" class="text-sm font-medium">Product Name</label>
                            <input type="text" class="w-full rounded-lg" name="name" id="name" placeholder="Name..." value="{{old('name') ?? ''}}">
                            @error('name')
                            <p class="text-sm text-red-500 font-medium">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="space-y-1">
                            <label for="code" class="text-sm font-medium">Product Code</label>
                            <input type="text" class="w-full rounded-lg" name="code" id="code" placeholder="Code..." value="{{old('code') ?? ''}}">
                            @error('code')
                            <p class="text-sm text-red-500 font-medium">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="space-y-1">
                            <label for="description" class="text-sm font-medium">Description</label>
                            <textarea class="form-textarea w-full rounded-lg" name="description" id="description" placeholder="Description...">{{old('description') ?? ''}}</textarea>
                            @error('description')
                            <p class="text-sm text-red-500 font-medium">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="space-y-1">
                            <label for="category" class="text-sm font-medium">Category</label>
                            <select class="form-multiselect w-full rounded-lg" name="category[]" id="category" multiple>
                                <option selected disabled>~~~ Select Category ~~~</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" @if(old('category')==$category->id) selected @endif>{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <p class="text-sm text-red-500 font-medium">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="space-y-1">
                            <label for="content_management" class="text-sm font-medium">Content Management</label>
                            <select class="form-multiselect w-full rounded-lg" name="content_management[]" id="content_management" multiple>
                                <option selected disabled>~~~ Select Content Management ~~~</option>
                                @foreach($content_management as $cm)
                                <option value="{{$cm->id}}" @if(old('content_management')==$cm->id) selected @endif>{{$cm->name}}</option>
                                @endforeach
                            </select>
                            @error('content_management')
                            <p class="text-sm text-red-500 font-medium">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="space-y-1">
                            <label for="upload_image" class="text-sm font-medium">Product Image</label>
                            <input type="file" class="form-input w-full rounded-lg" name="upload_image" id="upload_image">
                            @error('upload_image')
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