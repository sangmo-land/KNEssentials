{{-- resources/views/components/service-card.blade.php --}}
@props(['service', 'theme'])

<article
    class="bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
    <div class="relative h-48 bg-gray-100">
        <img src="{{ $service->getFirstMediaUrl('cover') }}" alt="{{ $service->title }}"
            class="w-full h-full object-cover">
        <span
            class="absolute top-4 right-4 {{ $theme['badge_color'] }} text-white px-4 py-2 rounded-full text-sm font-medium">
            {{ $service->category->name }}
        </span>
    </div>
    <div class="p-6">
        <h3 class="text-xl font-bold mb-2">{{ $service->title }}</h3>
        <p class="text-gray-600 mb-4">{{ $service->excerpt }}</p>
        <x-primary-button :color="$theme['button_color']" href="{{ route('services.show', $service) }}">
            View Details
        </x-primary-button>
    </div>
</article>