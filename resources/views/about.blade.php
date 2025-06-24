
<x-main>
<!-- About Content -->
<section class="container mx-auto py-12 px-6">
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Our Mission</h2>
        <p class="text-3xl text-gray-600 leading-relaxed ">
            Welcome to <span class="font-semibold text-blue-600">KNEssentials</span>, where passion meets purpose.
            We are committed to **spreading faith, supporting families, and sharing African culture** through:
        </p>
    </div>

    <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 text-center">
       
        
            @foreach($categories as $category)
            <x-service-cardOld icon="{{$category->image}}" title="{{ $category->name }}"
                description="{{ $category->description }}" />
            @endforeach  </div>  
      
    </div>
</section>

<!-- Call to Action -->
<section class="bg-blue-600 text-white text-center py-12 mt-12">
    <h2 class="text-3xl font-bold">Join Us in Making an Impact</h2>
    <p class="mt-4 text-lg">Support our mission and be a part of something greater.</p>
    <a href="/contact"
        class="mt-6 inline-block bg-white text-blue-600 px-6 py-3 rounded-full font-semibold hover:bg-gray-200">Get in
        Touch</a>
</section>

</x-main>