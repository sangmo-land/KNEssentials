<div class="space-y-6">
    <h2 class="text-3xl font-bold text-gray-800">{{ $title }}</h2>
    <p class="text-gray-600">{{ $description }}</p>

    <ul class="space-y-3">
        @foreach ($features as $feature)
        <li class="flex items-center">
            <svg class="w-6 h-6 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <span class="text-black">{{ $feature }}</span>
        </li>
        @endforeach
    </ul>

    <a href="{{ $buttonLink }}"
        class="inline-block bg-red-500 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-red-600">
        {{ $buttonText }}
    </a>
</div>