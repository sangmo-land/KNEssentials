@props([
'title',
'image',
'description',
'features' => [],
'route',
'reverse' => false
])

<div x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false"
    class="relative overflow-hidden group">

    <div
        class="max-w-7xl mx-auto px-4 flex flex-col {{ $reverse ? 'md:flex-row-reverse' : 'md:flex-row' }} items-start gap-8">

        <!-- Image Container -->
        <div class="w-full md:w-[600px] md:h-[400px] relative rounded-3xl overflow-hidden transform transition-all duration-500"
            :class="hover ? 'scale-105' : 'scale-100'">
            <img src="{{ asset('storage/' . $image) }}" class="w-full h-full object-cover rounded-3xl shadow-xl"
                alt="{{ $title }}">
            <div class="absolute inset-0 pattern-dots pattern-gray-300 pattern-size-4 pattern-opacity-20"></div>
        </div>

        <!-- Text Content -->
        <div class="w-full md:w-[600px] min-h-[400px] space-y-6 text-left">
            <h3 class="text-3xl font-bold text-gray-900">{{ $title }}</h3>

            <p class="text-gray-800 text-lg leading-relaxed">
                {{ $description }}
            </p>

            @if(count($features))
            <p class="text-gray-700">
                <strong>Featured This Week:</strong>
            <ul class="list-disc list-inside mt-2 text-black">
                @foreach($features as $feature)
                <li>{{ $feature }}</li>
                @endforeach
            </ul>
            </p>
            @endif

            <div class="mt-4">
                <a href="{{ $route }}"
                    class="inline-flex items-center px-6 py-3 bg-purple-600 text-white rounded-full hover:bg-purple-700 transition-all font-semibold shadow-lg hover:shadow-purple-200">
                    {{ $title === 'Music' ? 'Listen Now' : 'View More' }}
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>