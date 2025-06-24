{{-- resources/views/components/services-grid.blade.php --}}
@props(['services', 'theme'])

<section class="container mx-auto px-4 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($services as $service)
        <x-service-card :service="$service" :theme="$theme" />
        @endforeach
    </div>
</section>