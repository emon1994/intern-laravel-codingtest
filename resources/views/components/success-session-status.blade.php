@props(['status'])

@if ($status)
    <div class="bg-teal-100 mt-4 p-4 text-green-600 border border-green-500 rounded" role="alert" style="border-color: #48bb78;">
        <div class="flex">
            <div class="py-1"><svg class="fill-current h-4 w-4 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
            <div class="ml-2">
                <p class="">{{ $status }}</p>
            </div>
        </div>
    </div>
@endif