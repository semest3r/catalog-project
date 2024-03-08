@if(session()->has('success_message'))
<p x-data="{show:true}" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="my-2 p-2 bg-green-100 text-green-600 border border-green-600 rounded">{{session()->get('success_message')}}</p>
@endif