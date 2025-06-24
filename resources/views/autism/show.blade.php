<x-main>
    <section class="container mx-auto py-12 px-6">
        <div class="max-w-2xl mx-auto text-center">
            <img src="{{ $service['image'] }}" alt="{{ $service['title'] }}"
                class="w-full h-64 object-cover rounded-xl mb-6">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">{{ $service['title'] }}</h2>
            <p class="text-xl text-gray-600 leading-relaxed mb-8">{{ $service['description'] }}</p>
            <a href="{{ route('autism.index') }}"
                class="inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Back to Autism
                Services</a>
        </div>
    </section>
</x-main>