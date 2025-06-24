{{-- resources/views/components/categories/music.blade.php --}}
@props(['category'])

<section class="bg-purple-50 text-purple-900 py-16">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="text-center">
            <h2 class="text-3xl font-bold mb-6">🎵 About Our {{ $category->name }} Services</h2>
            <div class="prose-lg text-left">
                {!! $category->description !!}
                
            </div>
        </div>
    </div>
</section>