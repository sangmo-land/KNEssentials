<x-main>
    <section class="container mx-auto py-12 px-6">
    <div class="container mx-auto py-16 px-6 grid md:grid-cols-2 gap-12 items-center">
        {{-- Left Section --}}
        <x-service-images :imageTop="$imageTop" :imageBottom="$imageBottom" number="1"/>

        {{-- Right Section --}}
        <x-service-details :title="$title" :description="$description" :features="$features" :buttonText="$buttonText"
            :buttonLink="$buttonLink" />
    </div>
    <div class="container mx-auto py-16 px-6 grid md:grid-cols-2 gap-12 items-center">

        {{-- Right Section --}}
        <x-service-details :title="$title" :description="$description" :features="$features" :buttonText="$buttonText"
            :buttonLink="$buttonLink" />
        {{-- Left Section --}}
        <x-service-images :imageTop="$imageTop" :imageBottom="$imageBottom" number="2"/>

    </div>

    <div class="container mx-auto py-16 px-6 grid md:grid-cols-2 gap-12 items-center">
    
        {{-- Left Section --}}
        <x-service-images :imageTop="$imageTop" :imageBottom="$imageBottom" number="2" />
        {{-- Right Section --}}
        <x-service-details :title="$title" :description="$description" :features="$features" :buttonText="$buttonText"
            :buttonLink="$buttonLink" />
        
    
    </div>
    </section>
</x-main>