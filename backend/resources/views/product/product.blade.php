<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto px-4 space-y-4">
            <a href="{{route('product.create')}}" class="inline-block px-6 py-2 bg-white font-medium shadow-sm rounded-lg">Create</a>
            <div class="bg-white overflow-auto shadow-sm sm:rounded-lg">
                <x-success-message />
                <x-failed-message />
                <div class="p-4 text-gray-900">
                    <table class="table-auto w-full">
                        <thead class="border-b-2 border-gray-600">
                            <tr class="text-sm">
                                <th class="pl-2 pr-8 py-2 text-left">Image</th>
                                <th class="pl-2 pr-8 py-2 text-left">Name</th>
                                <th class="px-8 py-2 text-center">Code</th>
                                <th class="px-8 py-2 text-center">Category</th>
                                <th class="px-8 py-2 text-center">Created At</th>
                                <th class="px-8 py-2 text-center">Updated At</th>
                                <th class="pl-8 pr-2  py-2 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($products) < 1) <tr>
                                <td class="py-2 text-center font-medium" colspan="8">Data Empty</td>
                                </tr>
                                @else
                                @foreach($products as $index => $product)
                                <tr class="even:bg-gray-100 text-sm">
                                    <td class="p-2"><img class="w-[4rem] h-[4rem]" src="{{$product->image_product->url}}" alt="{{$product->image_product->url}}"></td>
                                    <td class="p-2">{{$product->name}}</td>
                                    <td class="p-2 text-center">{{$product->code}}</td>
                                    <td class="p-2 text-center">
                                        <div class="flex flex-wrap justify-center gap-1">
                                            @foreach($product->category as $category)
                                            <span class="px-2 py-1 text-sm text-blue-500 font-medium bg-blue-100 rounded">{{$category->name}}</span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="p-2 text-center">{{$product->created_at ?? 'Empty'}}</td>
                                    <td class="p-2 text-center">{{$product->updated_at ?? 'Empty'}}</td>
                                    <td class="p-2 text-right">
                                        <div class="flex justify-end items-center flex-nowrap gap-2">
                                            <a href="{{route('product.edit', ['id' => $product->id])}}" class="px-2 py-1 cursor-pointer bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</a>
                                            <x-modal-delete delete_url="{{route('product.delete', ['id' => $product->id])}}"></x-modal-delete>
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