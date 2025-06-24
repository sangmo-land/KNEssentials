<x-main>
    <section class="container mx-auto py-12 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Autism Care Services</h2>
            <p class="text-3xl text-gray-600 leading-relaxed">
                Explore our specialized support and care for autistic children.
            </p>
        </div>

        <div class="mt-12 grid md:grid-cols-3 gap-8">
            @foreach ($autismServices as $service)
            <div class="border rounded-xl p-4 shadow hover:shadow-lg transition">
                <img src="{{ $service['image'] }}" alt="{{ $service['title'] }}"
                    class="w-full h-48 object-cover rounded-md mb-4">
                <h3 class="text-xl font-semibold mb-2">{{ $service['title'] }}</h3>
                <p class="text-gray-600 mb-4">{{ $service['description'] }}</p>
                <a href="{{ route('autism.show', $service['id']) }}" class="text-blue-500 hover:underline">View More</a>
            </div>
            @endforeach
        </div>
    </section>
</x-main>