@if(session()->has('failed_message'))
<p x-data="{show:true}" x-show="show" x-init="setTimeout(() => show = false, 10000)" class="my-2 p-2 bg-red-100 text-red-600 border border-red-600 rounded">{{session()->get('failed_message')}}</p>
@endif