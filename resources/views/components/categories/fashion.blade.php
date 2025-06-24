{{-- resources/views/components/categories/fashion.blade.php --}}
@props(['category'])

@php
use Illuminate\Support\Facades\File;

$fashionImages = collect(File::files(public_path('storage/categories/fashion')))
->filter(fn($file) => in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png', 'webp']))
->sortBy(fn($file) => $file->getFilename())
->values()
->map(fn($file) => 'categories/fashion/' . $file->getFilename());
@endphp



<!-- 1. Enhanced Hero Section with Parallax Effect -->
<!-- Enhanced Hero Section with Personal Story -->
<section class="relative overflow-hidden bg-gradient-to-br from-pink-100 to-purple-100 py-24">
    <div class="absolute inset-0 z-0">
        <!-- Decorative elements -->
        <div
            class="absolute top-20 left-10 w-16 h-16 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob">
        </div>
        <div
            class="absolute top-40 right-20 w-24 h-24 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob animation-delay-2000">
        </div>
        <div
            class="absolute bottom-20 left-1/4 w-20 h-20 bg-rose-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob animation-delay-4000">
        </div>
    </div>

    <div class="container mx-auto px-4 max-w-4xl relative z-10">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6 text-pink-900 drop-shadow-lg prose-xl">
                ✨ Luxury {{ $category->name }} Collection
            </h1>
            <div class="prose-xl text-left bg-white/80 backdrop-blur-sm p-8 rounded-2xl shadow-xl text-black">
                {!! $category->description !!}
                <div class="mt-6 text-2xl space-y-8 tracking-wide leading-relaxed">
                    <p>✨ As a former Miss Cameroon USA runner-up, I've walked the runway of cultural celebration and
                        beauty excellence. That transformative journey taught me that true elegance comes from honoring
                        our heritage while embracing contemporary expression.</p>

                    <p>💅 My passion for manicure and pedicure services stems from this same philosophy: Every detail
                        matters. Just as our intricate Toghu patterns tell stories from Cameroon's Northwest,
                        well-crafted nails become wearable art that speaks to personal identity.</p>

                    <p>👑 My mission is to create spaces where African heritage and modern glamour converge. Whether
                        through vibrant fashion pieces or rejuvenating beauty services, I strive to help you feel like
                        royalty - because everyone deserves to experience that crown-worthy confidence.</p>
                </div>
                <div class="mt-8 flex justify-center">
                    <button
                        @click="window.scrollTo({top: document.querySelector('#gallery').offsetTop, behavior: 'smooth'})"
                        class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-3 px-8 rounded-full transform transition-all hover:scale-105 shadow-lg hover:shadow-xl">
                        Explore Collection
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. Dynamic Testimonials -->
<section class="bg-white py-20">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold text-pink-900 mb-16 relative inline-block">
            💬 Glowing Reviews
            <span
                class="absolute -bottom-2 left-0 right-0 h-1 bg-gradient-to-r from-pink-400 to-purple-400 rounded-full"></span>
        </h2>

        <div x-data="{
            active: 0,
            testimonials: [
                { 
                    name: 'Sarah B.', 
                    text: 'The Toghu fabric I bought was absolutely stunning! I wore it to a wedding and got so many compliments.',
                    avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=200&q=80'
                },
                { 
                    name: 'Laura M.', 
                    text: 'Their manicure service is top-notch. I felt like royalty the entire time! The attention to detail was incredible.',
                    avatar: 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=200&q=80'
                },
                { 
                    name: 'Estelle N.', 
                    text: 'The Miss Cameroon USA journey inspires me. I love supporting women-led businesses like this one!',
                    avatar: 'https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=200&q=80'
                }
            ],
            init() {
                setInterval(() => {
                    this.active = (this.active + 1) % this.testimonials.length;
                }, 5000);
            }
        }" class="relative max-w-4xl mx-auto">
            <!-- Testimonial Card -->
            <div
                class="bg-gradient-to-br from-pink-50 to-purple-50 rounded-3xl p-10 shadow-xl border border-pink-100 transition-all duration-500">
                <div class="flex flex-col items-center">
                    <img :src="testimonials[active].avatar" :alt="testimonials[active].name"
                        class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-lg mb-6">

                    <div class="text-xl italic text-pink-800 leading-relaxed mb-6 min-h-[120px] transition-opacity duration-300"
                        x-text="testimonials[active].text">
                    </div>

                    <div class="font-bold text-pink-900 text-xl" x-text="testimonials[active].name">
                    </div>

                    <div class="flex justify-center mt-6 space-x-2">
                        <template x-for="(t, i) in testimonials" :key="i">
                            <button @click="active = i" :class="i === active ? 'w-8 bg-pink-600' : 'w-3 bg-pink-200'"
                                class="h-3 rounded-full transition-all duration-300">
                            </button>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- 3. Interactive Fashion Gallery -->
{{--<section id="gallery" class="bg-gradient-to-b from-pink-50 to-white py-20">
    <div x-data="{
            open: false,
            activeImage: 0,
            images: @json($fashionImages),
            openGallery(index) {
                this.activeImage = index;
                this.open = true;
            },
            closeGallery() {
                this.open = false;
            },
            nextImage() {
                this.activeImage = (this.activeImage + 1) % this.images.length;
            },
            prevImage() {
                this.activeImage = (this.activeImage - 1 + this.images.length) % this.images.length;
            }
        }" x-bind:class="{ 'overflow-hidden': open }" class="max-w-6xl mx-auto px-4 relative">
        <h2 class="text-4xl font-bold text-pink-900 text-center mb-16 relative inline-block">
            ✨ Style Gallery
            <span
                class="absolute -bottom-2 left-0 right-0 h-1 bg-gradient-to-r from-pink-400 to-purple-400 rounded-full"></span>
        </h2>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <template x-for="(image, index) in images" :key="index">
                <div class="relative overflow-hidden rounded-2xl shadow-lg group cursor-pointer transform transition-all duration-500 hover:scale-[1.03] hover:shadow-2xl"
                    @click="openGallery(index)">
                    <img :src="'{{ asset('storage') }}/' + image" alt="Fashion design"
                        class="w-full h-80 object-cover transition-transform duration-700 group-hover:scale-110">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-6">
                        <span class="text-white font-medium text-lg">View Details</span>
                    </div>
                </div>
            </template>
        </div>

        <!-- Lightbox Modal -->
        <div x-show="open" x-cloak @keydown.window.escape="closeGallery"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/90 backdrop-blur-md">
            <!-- Close Button -->
            <button @click="closeGallery"
                class="absolute top-6 right-6 text-white text-4xl z-10 hover:text-pink-400 transition-colors">
                &times;
            </button>

            <!-- Navigation Arrows -->
            <button @click="prevImage"
                class="absolute left-6 top-1/2 -translate-y-1/2 text-white text-4xl z-10 hover:text-pink-400 transition-colors">
                &larr;
            </button>

            <button @click="nextImage"
                class="absolute right-6 top-1/2 -translate-y-1/2 text-white text-4xl z-10 hover:text-pink-400 transition-colors">
                &rarr;
            </button>

            <!-- Modal Image -->
            <div class="relative max-w-4xl w-full max-h-[90vh]">
                <img :src="'{{ asset('storage') }}/' + images[activeImage]" alt="Fashion design"
                    class="max-w-full max-h-[90vh] object-contain rounded-lg"
                    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
            </div>
        </div>
    </div>
</section>--}}
<!-- 4. Promotional Banner -->
<section class="py-16 bg-gradient-to-r from-pink-600 to-purple-600 text-white">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <div class="mb-8 md:mb-0">
                <h3 class="text-3xl font-bold mb-2">Limited Time Offer</h3>
                <p class="text-lg opacity-90">Get 20% off your first order with code: GLAM20</p>
            </div>
            <button
                class="bg-white text-pink-700 font-bold py-3 px-8 rounded-full transform transition-all hover:scale-105 shadow-lg hover:shadow-xl">
                Shop Now
            </button>
        </div>
    </div>
</section>

<!-- 5. Newsletter with Animation -->
<section class="bg-pink-50 py-20">
    <div class="max-w-2xl mx-auto text-center px-4">
        <h2 class="text-4xl font-bold text-pink-900 mb-4">✨ Join Our Style Tribe</h2>
        <p class="text-pink-700 mb-8 text-lg">Subscribe for exclusive fashion updates, promotions & VIP event access</p>

        <div x-data="{ submitted: false, email: '' }">
            <form @submit.prevent="if(email) submitted = true"
                class="flex flex-col sm:flex-row gap-4 justify-center max-w-lg mx-auto">
                <input type="email" x-model="email" placeholder="Your best email"
                    class="px-6 py-4 rounded-full border-2 border-pink-300 focus:outline-none focus:border-pink-500 w-full shadow-sm">
                <button type="submit"
                    class="bg-gradient-to-r from-pink-600 to-purple-600 text-white font-bold px-8 py-4 rounded-full shadow-lg transform transition-all hover:scale-105 hover:shadow-xl">
                    Subscribe
                </button>
            </form>

            <div x-show="submitted" x-cloak x-transition
                class="mt-8 bg-white rounded-xl p-6 shadow-lg max-w-md mx-auto">
                <div class="text-green-600 text-5xl mb-4">✓</div>
                <h3 class="text-xl font-bold text-pink-900 mb-2">You're on the list!</h3>
                <p class="text-pink-700">Check your inbox for our exclusive welcome gift</p>
            </div>
        </div>
    </div>
</section>

<!-- 6. Enhanced Floating Buttons -->
<div class="fixed bottom-6 right-6 flex flex-col gap-4 z-50">
    <a href="https://wa.me/237678626645" target="_blank"
        class="relative bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-lg transition transform hover:scale-110 group">
        <svg class="w-6 h-6 fill-current" viewBox="0 0 32 32">
            <path
                d="M16 0C7.2 0 0 7.2 0 16c0 2.8 0.8 5.4 2.1 7.7L0 32l8.5-2.2C11 31.2 13.4 32 16 32c8.8 0 16-7.2 16-16S24.8 0 16 0z" />
        </svg>
        <span
            class="absolute -left-2 -top-2 bg-pink-500 text-white text-xs font-bold px-2 py-1 rounded-full animate-ping opacity-75 group-hover:animate-none">!</span>
    </a>

    <a href="https://instagram.com/yourhandle" target="_blank"
        class="relative bg-gradient-to-br from-pink-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 text-white p-4 rounded-full shadow-lg transition transform hover:scale-110">
        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
            <path
                d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12 6.477 2 12 2zm0 2a8 8 0 100 16 8 8 0 000-16zm4.5 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM12 7a5 5 0 110 10 5 5 0 010-10z" />
        </svg>
    </a>
</div>

<!-- Custom Animations -->
<style>
    @keyframes blob {
        0% {
            transform: translate(0px, 0px) scale(1);
        }

        33% {
            transform: translate(30px, -50px) scale(1.1);
        }

        66% {
            transform: translate(-20px, 20px) scale(0.9);
        }

        100% {
            transform: translate(0px, 0px) scale(1);
        }
    }

    .animate-blob {
        animation: blob 7s infinite;
    }

    .animation-delay-2000 {
        animation-delay: 2s;
    }

    .animation-delay-4000 {
        animation-delay: 4s;
    }
</style>