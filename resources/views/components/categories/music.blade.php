{{-- resources/views/music-landing.blade.php --}}
@php
use Illuminate\Support\Facades\File;
$carouselImages = File::glob(storage_path('app/public/carousel/*.{jpg,png,gif}'), GLOB_BRACE);
$carouselImages = array_map(fn($path) => basename($path), $carouselImages);
@endphp

<!-- Featured Performances -->
<section class="py-20 bg-black">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-serif mb-4 text-gold-600">Upcoming Performances</h2>
            <p class="text-gray-400 max-w-xl mx-auto">Experience music in its purest form</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach([1,2,3] as $performance)
            <div class="group relative overflow-hidden">
                <img src="https://images.unsplash.com/photo-1498038432885-c6f3f1b912ee?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                    class="w-full h-96 object-cover transform group-hover:scale-105 transition duration-500">
                <div
                    class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent p-6 flex flex-col justify-end">
                    <h3 class="text-xl font-semibold text-white mb-2">Chamber Night {{ $performance }}</h3>
                    <p class="text-gold-500">May 24, 2024</p>
                    <div class="mt-4 opacity-0 group-hover:opacity-100 transition duration-300">
                        <button class="text-white border border-white px-4 py-2 hover:bg-white/10">Reserve
                            Seats</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>



<!-- Exclusive Recordings -->
<section class="py-20 bg-gradient-to-br from-purple-900 to-black">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-serif mb-4 text-gold-600">Premium Recordings</h2>
            <p class="text-gray-400 max-w-xl mx-auto">Masterfully crafted audio experiences</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div class="space-y-6">
                <div
                    class="relative min-h-[650px] rounded-2xl bg-gray-900/70 backdrop-blur-md p-6 ring-1 ring-gray-700/50 hover:ring-green-500 shadow-lg transition-all duration-300 hover:scale-[1.02]">
                    <div class="flex flex-col items-center gap-6">
                        <!-- Video Embed -->
                        <x-video-carousel :tracks="$tracks" />
                    </div>
                </div>
                {{ $tracks->links() }}
            </div>

            @if(count($carouselImages))
            <div x-data="{
                    currentSlide: 0,
                    autoPlay: true,
                    touchStartX: 0,
                    touchEndX: 0,
                    handleSwipe() {
                        const delta = this.touchEndX - this.touchStartX;
                        if (Math.abs(delta) > 50) {
                            if (delta < 0) {
                                // Swipe left → next
                                this.currentSlide = (this.currentSlide + 1) % {{ count($carouselImages) }};
                            } else {
                                // Swipe right → previous
                                this.currentSlide = (this.currentSlide - 1 + {{ count($carouselImages) }}) % {{ count($carouselImages) }};
                            }
                        }
                    }
                }" x-init="() => {
                    setInterval(() => { 
                        if(autoPlay) currentSlide = (currentSlide + 1) % {{ count($carouselImages) }}
                    }, 5000)
                }" @mouseenter="autoPlay = false" @mouseleave="autoPlay = true"
                @touchstart="touchStartX = $event.changedTouches[0].screenX"
                @touchend="touchEndX = $event.changedTouches[0].screenX; handleSwipe()"
                class="relative overflow-hidden rounded-xl bg-black shadow-2xl ring-1 ring-gold-600/30 h-[50vh]">

                <div class="relative h-full">
                    @foreach($carouselImages as $index => $image)
                    <div x-show="currentSlide === {{ $index }}" x-transition:enter="transition ease-out duration-500"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0" class="absolute inset-0">
                        <img src="{{ asset('storage/carousel/'.$image) }}" alt="Premium feature {{ $index + 1 }}"
                            class="w-full h-full object-cover brightness-[0.75]">
                        <div class="absolute bottom-0 left-0 right-0 p-8 bg-gradient-to-t from-black">
                            <h4 class="text-xl font-semibold text-white mb-2">
                                Feature {{ $index + 1 }}
                            </h4>
                            <p class="text-gold-500 text-sm">Premium benefit description</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                @if(count($carouselImages) > 1)
                <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex space-x-2">
                    @foreach($carouselImages as $index => $image)
                    <button @click="currentSlide = {{ $index }}" class="w-3 h-3 rounded-full transition-colors"
                        :class="currentSlide === {{ $index }} ? 'bg-gold-600' : 'bg-white/20'"></button>
                    @endforeach
                </div>

                <button
                    @click="currentSlide = (currentSlide - 1 + {{ count($carouselImages) }}) % {{ count($carouselImages) }}"
                    class="absolute top-1/2 left-4 -translate-y-1/2 p-2 text-white/80 hover:text-white transition">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button @click="currentSlide = (currentSlide + 1) % {{ count($carouselImages) }}"
                    class="absolute top-1/2 right-4 -translate-y-1/2 p-2 text-white/80 hover:text-white transition">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                @endif
            </div>
            @else
            <div class="rounded-xl bg-gray-900 p-8 text-center h-[500px] flex items-center justify-center">
                <p class="text-gray-400">No carousel images found</p>
            </div>
            @endif
        </div>
    </div>
</section>



<!-- Newsletter CTA -->
<section class="py-20 bg-black border-t border-gold-600/30">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-serif text-gold-600 mb-6">Stay in Tune</h2>
        <p class="text-gray-400 mb-6">Subscribe for exclusive updates and early ticket access</p>
        <form method="POST"  class="max-w-xl mx-auto flex gap-4">
            @csrf
            <input type="email" name="email" required placeholder="Your email"
                class="flex-1 px-4 py-3 rounded bg-gray-800 text-white placeholder-gray-500 focus:ring-gold-600 ring-1 ring-gray-700">
            <button type="submit"
                class="bg-gold-600 hover:bg-gold-700 px-6 py-3 rounded text-white font-semibold transition">Subscribe</button>
        </form>
    </div>
</section>

<!-- Membership CTA -->
{{--<section class="bg-black py-20 border-t border-gold-600/30">
    <div class="container mx-auto px-6 text-center">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl font-serif mb-6 text-gold-600">Elevate Your Experience</h2>
            <p class="text-gray-400 mb-8">Join our exclusive membership for priority access and premium benefits</p>
            <div class="flex justify-center gap-6">
                <button class="bg-gold-600 hover:bg-gold-700 px-8 py-4 rounded-sm text-lg font-semibold transition-all">
                    Become a Member
                </button>
            </div>
        </div>
    </div>
</section>--}}

<!-- Floating Reserve Button -->
<a href="#"
    class="fixed bottom-6 right-6 bg-gold-600 hover:bg-gold-700 text-white px-6 py-3 rounded-full shadow-lg z-50 transition">
    Reserve Now
</a>