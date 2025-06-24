<x-main>
    <section class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
        @foreach ($categories as $category)
     
        <div class="max-w-7xl mx-auto mb-16" x-data="{ isLoading: false }">
            @if ($productsByCategory[$category->id]['products']->count() > 0)
            <!-- Product Grid with Hover Effects -->
            @foreach ($productsByCategory[$category->id]['products'] as $product)
            <div
                class="flex flex-col md:flex-row gap-6 p-6 border rounded-xl mb-8 hover:shadow-lg transition-all group">
                <x-service-card :title="$category->name" image="images/main1.jpg"
                    :route="route('category.show', $category)" :reverse="true" :features="[
                            'Ndolé Special - Bitterleaf stew with shrimp and groundnuts',
                            'Achu Soup Combo - Traditional cocoyam with yellow soup',
                            'Grilled Fish Platter - Served with bobolo and plantains'
                        ]" description="Cameroonian cuisine blends bold flavors and cultural heritage. Dishes like ndolé (bitterleaf stew with groundnuts) and
                            achu (cocoyam with yellow soup) highlight local ingredients. Street snacks include brochettes and puff-puff, while
                            mbongo tchobi (spicy stew) and fermented cassava (bobolo) emphasize communal meals" />
            </div>
            @endforeach
            @endif
        </div>
        @endforeach
    </section>

    <!-- Include Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</x-main>