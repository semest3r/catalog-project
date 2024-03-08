<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subscriber') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto px-4 space-y-4">
            <div class="bg-white overflow-auto shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900">
                    <h1 class="text-xl font-semibold">Edit Subscriber</h1>
                    <form action="{{route('subscriber.update', ['id'=>$subscriber->id])}}" method="post" class="mt-4 space-y-4">
                        @csrf
                        @method('PATCH')
                        <div class="space-y-1">
                            <p class="text-sm font-medium">Email</p>
                            <p class="form-input text-zinc-500 bg-zinc-100 border border-zinc-500 rounded-lg">{{$subscriber->email}}</p>
                        </div>
                        <div class="space-y-1">
                            <label for="code" class="text-sm font-medium">Status</label>
                            <Select class="form-select w-full rounded" name="unsubscribe">
                                <option value="subscribe" @if($subscriber->status) selected (@endif)>Subscribe</option>
                                <option value="unsubscribe" @if(!$subscriber->status) selected (@endif)>Unsubscribe</option>
                            </Select>
                            @error('unsubscribe')
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