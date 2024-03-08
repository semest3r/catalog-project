<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subcriber') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto px-4 space-y-4">
            <div class="bg-white overflow-auto shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900">
                    <h1 class="text-xl font-semibold">Create Subscriber</h1>
                    <form action="{{route('subscriber.store')}}" method="post" class="mt-4 space-y-4">
                        @csrf
                        @method('POST')
                        <div class="space-y-1">
                            <label for="email" class="text-sm font-medium">Email</label>
                            <input type="email" class="w-full rounded-lg" name="email" id="email" placeholder="Email..." required>
                            @error('email')
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