<x-main>
    <!-- Gospel Music Products -->
    <section class="container mx-auto py-12 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Gospel Music Collection</h2>
            <p class="text-3xl text-gray-600 leading-relaxed ">
                Discover our uplifting and inspiring gospel music to feed your soul.
            </p>
        </div>

        <div class="mt-12 grid md:grid-cols-3 gap-8">
            <!-- Example Gospel Music Item -->
            <x-service-card icon="/images/gospel1.jpg" title="Amazing Grace"
                description="A soul-stirring rendition of the timeless hymn." link="/gospel-music/amazing-grace" cardtype="product-item"/>

            <x-service-card icon="/images/gospel2.jpg" title="Heavenly Voices"
                description="An album that brings peace and joy through harmonious voices."
                link="/gospel-music/heavenly-voices" cardtype="product-item"/>

            <x-service-card icon="/images/gospel3.jpg" title="Praise and Worship"
                description="A collection of powerful praise and worship songs."
                link="/gospel-music/praise-and-worship" cardtype="product-item"/>
        </div>
    </section>

    <!-- Autism Care Products -->
    <section class="container mx-auto py-12 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">
                <a href="{{ route('autism.index') }}" class="hover:text-blue-600">Autism Care Services</a>
            </h2>
            <p class="text-3xl text-gray-600 leading-relaxed ">
                Explore our specialized support and care for autistic children in a loving environment.
            </p>
        </div>

        <div class="mt-12 grid md:grid-cols-3 gap-8">
            <!-- Example Autism Care Item -->
            <x-service-card icon="/images/autism1.jpg" title="Therapeutic Sessions"
                description="Individualized therapy sessions tailored to each child’s needs."
                link="/autism-care/therapeutic-sessions" cardtype="product-item"/>

            <x-service-card icon="/images/autism2.jpg" title="Speech and Communication"
                description="Enhancing communication skills through structured programs."
                link="/autism-care/speech-communication" cardtype="product-item"/>

            <x-service-card icon="/images/autism3.jpg" title="Behavioral Therapy"
                description="Supporting children in managing challenging behaviors."
                link="/autism-care/behavioral-therapy" cardtype="product-item"/>
        </div>
    </section>

    <!-- African Food Delivery Products -->
    <section class="container mx-auto py-12 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">African Food Delivery</h2>
            <p class="text-3xl text-gray-600 leading-relaxed ">
                Savor the authentic flavors of Africa with every meal delivered to your door.
            </p>
        </div>

        <div class="mt-12 grid md:grid-cols-3 gap-8">
            <!-- Example African Food Item -->
            <x-service-card icon="/images/food1.jpg" title="Jollof Rice"
                description="A classic West African dish made with rice, tomatoes, and spices."
                link="/african-food/jollof-rice" cardtype="product-item"/>

            <x-service-card icon="/images/food2.jpg" title="Egusi Soup"
                description="A hearty and flavorful soup made from ground melon seeds."
                link="/african-food/egusi-soup" cardtype="product-item"/>

            <x-service-card icon="/images/food3.jpg" title="Suya Skewers"
                description="A popular Nigerian street food of spiced grilled meat."
                link="/african-food/suya-skewers" cardtype="product-item"/>
        </div>
    </section>

</x-main>