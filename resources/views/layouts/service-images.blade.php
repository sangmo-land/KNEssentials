@props(['imageTop','imageBottom', 'number']) {{-- Assuming $number is passed as a prop --}}
<div class="flex flex-col items-center space-y-4 ">
    <div class="relative">
        <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-white p-3 rounded-full shadow-lg">
            <svg class="w-10 h-10 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12h6m2 0a2 2 0 100-4H7a2 2 0 100 4h10m2 0a2 2 0 010 4H7a2 2 0 010-4h10m2 0a2 2 0 100-4H7a2 2 0 100 4h10" />
            </svg>
        </div>
    </div>
    <div class="flex space-x-4">
        @if($number % 2 !== 0)
        <img src="{{ $imageTop }}" alt="Service Image 1" class="rounded-lg shadow-lg w-full flex-[2] max-h-64 object-cover">
        <x-image class="flex-1 max-h-64" />
        @else
        <x-image class="flex-1 max-h-64" />
        <img src="{{ $imageTop }}" alt="Service Image 1" class="rounded-lg shadow-lg w-full flex-[2] max-h-64 object-cover">
        @endif
    </div>
    
    <div class="flex space-x-4">
        @if($number % 2 !== 0)
        <x-image class="flex-1 max-h-64" />
            <img src="{{ $imageBottom }}" alt="Service Image 1" class="rounded-lg shadow-lg w-full flex-[2] max-h-64 object-cover">
        @else
         <img src="{{ $imageBottom }}" alt="Service Image 1" class="rounded-lg shadow-lg w-full flex-[2] max-h-64 object-cover">
        <x-image class="flex-1 max-h-64" />
        @endif
    </div>
</div>




