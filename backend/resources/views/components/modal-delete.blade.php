@props([
  'delete_url'
  ])

<div x-data="{ showModal: false }" @keydown.window.escape="showModal = false">
  <button @click="showModal = !showModal" class="px-2 py-1 cursor-pointer bg-red-500 hover:bg-red-600 text-white rounded">Delete</button>
  <div x-cloak x-transition.opacity x-show="showModal" class="fixed inset-0 bg-black/50"></div>
  <div x-cloak x-transition x-show="showModal" class="fixed inset-0 z-50 grid place-content-center">
    <div @click.away="showModal = false" class="w-[400px] bg-white p-4 rounded">
      <form action="{{$delete_url}}" method="post" class="space-y-4">
        @method('DELETE')
        @csrf
        <h1 class="text-center text-xl font-semibold">Confirmation Delete</h1>
        <p class="text-center">Are you sure want to Delete this Data?</p>
        <p class="text-center font-medium">**Deleted Data cannot be recovered</p>
        <div class="flex justify-center gap-4">
          <button type="submit" class="p-2 bg-red-500 hover:bg-red-600 text-white font-medium rounded">Confirm</button>
          <button type="button" @click="showModal = false" class="p-2 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>