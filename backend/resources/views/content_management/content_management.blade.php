<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Content Management') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto px-4 space-y-4">
            <a href="{{route('content_management.create')}}" class="inline-block px-6 py-2 bg-white font-medium shadow-sm rounded-lg">Create</a>
            <div class="bg-white overflow-auto shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900">
                    <table class="table-auto w-full">
                        <thead class="border-b-2 border-gray-600">
                            <tr class="text-sm">
                                <th class="p-2 text-left">Name</th>
                                <th class="p-2 text-center">Code</th>
                                <th class="p-2 text-center">Created At</th>
                                <th class="p-2 text-center">Updated At</th>
                                <th class="p-2 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($content_management) < 1) <tr>
                                <td class="py-2 text-center font-medium" colspan="8">Data Empty</td>
                                </tr>
                                @else
                                @foreach($content_management as $index => $cm)
                                <tr class="even:bg-gray-100 text-sm">
                                    <td class="p-2">{{$cm->name}}</td>
                                    <td class="p-2 text-center">{{$cm->code}}</td>
                                    <td class="p-2 text-center">{{$cm->created_at ?? 'Empty'}}</td>
                                    <td class="p-2 text-center">{{$cm->updated_at ?? 'Empty'}}</td>
                                    <td class="p-2 text-right">
                                        <div class="flex justify-end items-center flex-nowrap gap-2">
                                            <a href="{{route('content_management.edit', ['id' => $cm->id])}}" class="px-2 py-1 cursor-pointer bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</a>
                                            <x-modal-delete delete_url="{{route('content_management.delete', ['id' => $cm->id])}}"></x-modal-delete>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>