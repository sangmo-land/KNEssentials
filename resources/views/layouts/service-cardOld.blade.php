@props([
'icon',
'title',
'description',
'link' => null,
'cardtype' => null,
])

<div
    class="p-8 bg-white shadow-xl rounded-2xl text-center w-full max-w-sm mx-auto transform transition duration-500 hover:scale-105 hover:shadow-2xl">

    <div class="h-48 flex items-center justify-center mb-6">
        <img src="{{ asset('storage/'.$icon) }}" alt="{{ $title }}"
            class="w-full h-full object-cover transition duration-500 hover:rotate-6">
    </div>

    <h3 class="text-3xl font-bold text-gray-800 mb-4">{{ $title }}</h3>
    <p class="text-gray-700 text-xl leading-relaxed font-medium">
        {{ $description }}
    </p>

    <!-- Conditionally render the link if the card type is a product item -->
    @if($cardtype === 'product-item' && $link)
    <a href="{{ $link }}"
        class="mt-6 inline-block bg-blue-600 text-white px-6 py-3 rounded-full font-semibold hover:bg-blue-500 transition">
        View Details
    </a>
    @endif
</div>