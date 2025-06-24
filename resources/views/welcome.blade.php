<x-main>
    <section class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
        @foreach ($categories as $category)
        <div class="max-w-7xl mx-auto mb-16" x-data="{ isLoading: false }">
            @if ($productsByCategory[$category->id]['products']->count() > 0)
            <!-- Product Grid with Hover Effects -->
            @foreach ($productsByCategory[$category->id]['products'] as $product)
            <div
                class="flex flex-col md:flex-row gap-6 p-6 border rounded-xl mb-8 hover:shadow-lg transition-all group">
                <x-service-card :title="$category->name" :image="$category->image"
                    :route="route('services.show', $category)" :reverse="$category->id % 2 === 0"
                    :features="$category->features" :description="$category->description" />
            </div>
            @endforeach
            @endif
        </div>
        @endforeach
    </section>

    <!-- Include Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</x-main>