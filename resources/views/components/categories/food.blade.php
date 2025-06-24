{{-- resources/views/components/categories/food.blade.php --}}
@props(['category'])

@php
use Illuminate\Support\Facades\File;

$foodImages = collect(File::files(public_path('storage/categories/foods')))
->filter(fn($file) => in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png', 'webp']))
->sortBy(fn($file) => $file->getFilename())
->values()
->map(fn($file) => 'categories/foods/' . $file->getFilename());
$foodImagesProd = $foodImages->take(3); // Limit to 6 images for the grid
@endphp

<!-- Hero Section with Animation -->
<section class="bg-gradient-to-r from-red-50 to-amber-50 py-16 relative overflow-hidden">
    <!-- Floating elements -->
    <div
        class="absolute top-10 left-1/4 w-24 h-24 bg-red-200/20 rounded-full mix-blend-multiply filter blur-xl animate-float">
    </div>
    <div
        class="absolute top-40 right-1/3 w-32 h-32 bg-amber-200/20 rounded-full mix-blend-multiply filter blur-xl animate-float animation-delay-2000">
    </div>
    <div
        class="absolute bottom-20 left-1/3 w-28 h-28 bg-orange-200/20 rounded-full mix-blend-multiply filter blur-xl animate-float animation-delay-4000">
    </div>

    <div class="container mx-auto px-4 max-w-4xl relative z-10">
        <div class="text-center">
            <h2 class="text-4xl font-bold mb-6 text-red-800 animate-fade-in-down">
                🍴 About Our {{ $category->name }} Services
            </h2>
            <div class="prose-lg text-left bg-white/80 backdrop-blur-sm p-8 rounded-2xl shadow-lg animate-fade-in-up text-black">
                {!! $category->description !!}
            </div>
        </div>
    </div>
</section>

<!-- Food Services Section -->
<section class="py-16 bg-gradient-to-b from-amber-50 to-amber-100 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
        <!-- Text Content -->
        <div class="relative z-10">
            <h2 class="text-4xl font-bold text-gray-900 mb-4 animate-fade-in-down">
                Authentic Cameroonian Food Delivery
            </h2>
            <p class="text-lg text-gray-700 leading-relaxed mb-6 animate-fade-in-up" style="animation-delay: 0.2s">
                Discover the rich taste of Cameroon right here in the US! We offer authentic home-style Cameroonian
                dishes prepared with love and tradition.
                Whether you miss home or are curious to explore, our meals bring Africa to your plate.
            </p>
            <h4 class="text-lg font-semibold text-gray-800 animate-fade-in-up" style="animation-delay: 0.4s">Featured
                This Week:</h4>
            <ul class="list-disc list-inside text-black mt-2 space-y-1 animate-fade-in-up"
                style="animation-delay: 0.6s">
                <li class="flex items-center">
                    <span>Ndolé with Plantains</span>
                    <span
                        class="text-xs bg-green-200 text-green-800 font-medium px-2 py-1 rounded-full ml-2 transform transition-transform hover:scale-105">Popular</span>
                </li>
                <li class="flex items-center">
                    <span>Jollof Rice & Grilled Chicken</span>
                    <span
                        class="text-xs bg-red-200 text-red-800 font-medium px-2 py-1 rounded-full ml-2 transform transition-transform hover:scale-105">Spicy</span>
                </li>
                <li class="flex items-center">
                    <span>Hot Pepper Stew</span>
                    <span
                        class="text-xs bg-yellow-200 text-yellow-800 font-medium px-2 py-1 rounded-full ml-2 transform transition-transform hover:scale-105">New</span>
                </li>
            </ul>
            <a href=""
                class="mt-6 inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white rounded-full hover:from-green-700 hover:to-emerald-700 transition-all shadow-md hover:shadow-lg transform hover:-translate-y-1 animate-fade-in-up"
                style="animation-delay: 0.8s">
                Explore Menu
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>

        <!-- Image Grid -->
        <div class="relative z-10">
            <div class="grid grid-cols-2 gap-4">
                @foreach($foodImages as $index => $img)
                <div class="overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300">
                    <img src="{{ asset('storage/' . $img) }}" alt="Cameroonian Dish"
                        class="object-cover w-full h-40 md:h-48 transform transition-transform duration-500 hover:scale-110"
                        style="animation-delay: {{ $index * 0.1 }}s" x-data="{}"
                        x-init="setTimeout(() => $el.classList.add('animate-fade-in-up'), {{ $index * 100 }})">
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Decorative elements -->
    <div class="absolute -bottom-20 -right-20 w-80 h-80 bg-red-200/10 rounded-full"></div>
</section>

<!-- Testimonials Carousel -->
<section class="py-16 bg-white relative overflow-hidden">
    <div class="max-w-5xl mx-auto px-6 relative z-10">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-8 animate-fade-in-down">What Our Customers Say</h2>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach([['name' => 'Lisa M.', 'comment' => 'The Ndolé brought back memories of home!'], ['name' =>
                'James K.', 'comment' => 'Authentic and full of flavor, just like my mom made it.'], ['name' => 'Cynthia
                B.', 'comment' => 'The Jollof rice was spicy and amazing!']] as $index => $review)
                <div class="swiper-slide p-6 bg-gradient-to-br from-white to-amber-50 rounded-xl shadow-lg border border-amber-100 transform transition-all hover:scale-[1.02] animate-fade-in-up"
                    style="animation-delay: {{ $index * 0.2 }}s">
                    <div class="flex items-start">
                        <div class="text-amber-500 text-3xl mr-3">"</div>
                        <p class="text-gray-800 italic">"{{ $review['comment'] }}"</p>
                    </div>
                    <p class="mt-4 text-right text-sm font-semibold text-gray-700">- {{ $review['name'] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Custom pagination -->
        <div class="flex justify-center mt-8 space-x-2">
            @foreach([1,2,3] as $dot)
            <div class="w-3 h-3 rounded-full bg-amber-300 animate-pulse" style="animation-delay: {{ $dot * 0.2 }}s">
            </div>
            @endforeach
        </div>
    </div>

    <!-- Decorative elements -->
    <div class="absolute -top-20 -left-20 w-64 h-64 bg-amber-100/30 rounded-full"></div>
    <div class="absolute bottom-10 right-10 w-32 h-32 bg-red-100/20 rounded-full"></div>
</section>

<!-- Delivery Zones -->
<section class="py-16 bg-gradient-to-r from-amber-100 to-amber-200 relative overflow-hidden">
    <div class="max-w-6xl mx-auto px-6 text-center relative z-10">
        <h2 class="text-3xl font-bold text-gray-900 mb-4 animate-fade-in-down">We Currently Deliver In</h2>
        <p class="text-gray-700 mb-8 animate-fade-in-up" style="animation-delay: 0.2s">Explore our current delivery
            zones. More cities coming soon!</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 text-lg font-medium text-gray-800">
            <div class="bg-white p-6 rounded-xl shadow-lg transform transition-all hover:-translate-y-1 hover:shadow-xl animate-fade-in-up"
                style="animation-delay: 0.4s">
                <div class="text-amber-600 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                Washington, DC
            </div>
            <div class="bg-white p-6 rounded-xl shadow-lg transform transition-all hover:-translate-y-1 hover:shadow-xl animate-fade-in-up"
                style="animation-delay: 0.6s">
                <div class="text-amber-600 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                Maryland (PG & Montgomery)
            </div>
            <div class="bg-white p-6 rounded-xl shadow-lg transform transition-all hover:-translate-y-1 hover:shadow-xl animate-fade-in-up"
                style="animation-delay: 0.8s">
                <div class="text-amber-600 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                Northern Virginia
            </div>
        </div>
    </div>

    <!-- Decorative elements -->
    <div class="absolute top-0 right-0 w-48 h-48 bg-red-100/20 rounded-full"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-amber-100/30 rounded-full"></div>
</section>

<!-- Food Products Preview Section -->
<section class="py-20 bg-gradient-to-b from-white to-amber-50 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 text-center relative z-10">
        <h2 class="text-3xl font-bold text-gray-900 mb-4 animate-fade-in-down">
            Explore Our Food Products
        </h2>
        <p class="text-gray-700 max-w-xl mx-auto mb-8 animate-fade-in-up" style="animation-delay: 0.2s">
            Looking for original ingredients or ready-to-cook items? We provide a selection of food products from
            Cameroon — including spices, sauces, frozen meals, and more.
        </p>

        <!-- Sample Products -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-10">
            @foreach($foodImagesProd as $index => $product)
            <div class="bg-white border border-amber-100 rounded-xl p-4 shadow hover:shadow-xl transition relative overflow-hidden group animate-fade-in-up"
                style="animation-delay: {{ $index * 0.2 }}s">
                <div class="overflow-hidden rounded-lg mb-4">
                    <img src="{{ asset('storage/' . $product) }}" alt=""
                        class="w-full h-48 object-cover transform transition-transform duration-500 group-hover:scale-110">
                </div>
                <h3
                    class="text-lg font-semibold text-gray-800 transform transition-transform group-hover:translate-x-2">
                    {{ pathinfo($product, PATHINFO_FILENAME) }}
                </h3>
                <span
                    class="absolute top-3 right-3 text-xs bg-gradient-to-r from-purple-500 to-indigo-600 text-white font-semibold px-2 py-1 rounded-full shadow-md transform transition-transform group-hover:scale-110">New</span>
            </div>
            @endforeach
        </div>

        <a href="{{ route('products.index') }}"
            class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 text-white rounded-full hover:from-purple-700 hover:to-indigo-700 transition-all font-semibold shadow-md hover:shadow-lg transform hover:-translate-y-1 animate-fade-in-up"
            style="animation-delay: 0.8s">
            Visit Our Product Store
            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
        </a>
    </div>

    <!-- Decorative elements -->
    <div class="absolute top-20 right-20 w-48 h-48 bg-purple-100/20 rounded-full"></div>
    <div class="absolute bottom-10 left-10 w-32 h-32 bg-amber-100/30 rounded-full"></div>
</section>

<!-- Instagram Style Food Gallery -->
{{--<section class="py-16 bg-gradient-to-b from-amber-50 to-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 text-center relative z-10">
        <h2 class="text-3xl font-bold text-gray-900 mb-6 animate-fade-in-down">From Our Kitchen to Instagram</h2>
        <p class="text-gray-700 max-w-xl mx-auto mb-8 animate-fade-in-up" style="animation-delay: 0.2s">
            Follow us on Instagram @CameroonEats and tag your favorite dishes!
        </p>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            @foreach(['insta1.jpg', 'insta2.jpg', 'insta3.jpg', 'insta4.jpg', 'insta5.jpg', 'insta6.jpg'] as $index =>
            $insta)
            <div class="overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 relative group animate-fade-in-up"
                style="animation-delay: {{ $index * 0.1 }}s">
                <img src="{{ asset('storage/instagram/' . $insta) }}" alt="Instagram food post"
                    class="object-cover w-full h-40 transform transition-transform duration-500 group-hover:scale-110">
                <div
                    class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                    <div class="text-white text-center p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto mb-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        <span class="font-bold">@CameroonEats</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Instagram follow button -->
        <a href="#"
            class="mt-10 inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-pink-500 to-rose-600 text-white rounded-full hover:from-pink-600 hover:to-rose-700 transition-all font-medium shadow-md hover:shadow-lg transform hover:-translate-y-0.5 animate-fade-in-up"
            style="animation-delay: 0.8s">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
            </svg>
            Follow Us
        </a>
    </div>

    <!-- Decorative elements -->
    <div class="absolute -top-10 left-1/4 w-64 h-64 bg-amber-100/20 rounded-full"></div>
    <div class="absolute bottom-0 right-10 w-48 h-48 bg-pink-100/20 rounded-full"></div>
</section>--}}

<!-- Floating WhatsApp Button -->
<div class="fixed bottom-6 right-6 z-50">
    <a href="https://wa.me/678626645" target="_blank"
        class="bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-lg transition transform hover:scale-110 flex items-center animate-bounce"
        style="animation-delay: 1s">
        <svg class="w-6 h-6 fill-current" viewBox="0 0 32 32">
            <path
                d="M16 0C7.2 0 0 7.2 0 16c0 2.8 0.8 5.4 2.1 7.7L0 32l8.5-2.2C11 31.2 13.4 32 16 32c8.8 0 16-7.2 16-16S24.8 0 16 0z" />
        </svg>
    </a>
</div>

<style>
    @keyframes float {
        0% {
            transform: translateY(0) rotate(0deg);
        }

        50% {
            transform: translateY(-20px) rotate(5deg);
        }

        100% {
            transform: translateY(0) rotate(0deg);
        }
    }

    .animate-float {
        animation: float 8s ease-in-out infinite;
    }

    .animation-delay-2000 {
        animation-delay: 2s;
    }

    .animation-delay-4000 {
        animation-delay: 4s;
    }

    @keyframes fade-in-down {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in-down {
        animation: fade-in-down 0.8s ease-out forwards;
    }

    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in-up {
        animation: fade-in-up 0.8s ease-out forwards;
    }

    @keyframes pulse {
        0% {
            opacity: 0.5;
            transform: scale(1);
        }

        50% {
            opacity: 1;
            transform: scale(1.1);
        }

        100% {
            opacity: 0.5;
            transform: scale(1);
        }
    }

    .animate-pulse {
        animation: pulse 2s infinite ease-in-out;
    }
</style>