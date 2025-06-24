<x-main>
<section class="container mx-auto py-12 px-6">
 
  @php
  $theme = config('category_themes.'.$category->name, config('category_themes.default'));
 // dd($tracks)
  @endphp
  
  <x-hero :theme="$theme" :category="$category">
    <x-slot name="icon">
      <x-dynamic-icon :category="$category" class="w-16 h-16" />
    </x-slot>
  </x-hero>
  
  {{-- <x-services-grid :services="$services" :theme="$theme" /> --}}
  
  <x-category-description :category="$category" :theme="$theme" :tracks="$tracks" />
  

  

</section>
</x-main>