<x-main>

<section class="container mx-auto py-12 px-6">
<div class="max-w-4xl mx-auto text-center ">
    <h2 class="text-3xl font-bold text-black mb-6">All {{ $category->name }} Products</h2>
    <p class="text-3xl text-black leading-relaxed">
        Discover our complete collection of {{ $category->name }}.
    </p>
</div>

@if ($products->count() > 0)
<div class="mt-12 grid md:grid-cols-3 gap-8">
    @foreach ($products as $product)
    <x-service-card icon="{{ $product->image }}" title="{{ $product->name }}" description="{{ $product->description }}"
        link="{{ route('products.show', $product->id) }}" cardtype="product-item" />
    @endforeach
</div>
@else
<p class="text-gray-500">No products available in this category.</p>
@endif

<div class="mt-4 text-center">
    <a href="{{ route('products.index') }}"
        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
        Back to Categories
    </a>
</div>
</section>

</x-main>