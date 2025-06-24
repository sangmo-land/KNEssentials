<div class="relative w-full min-h-[60vh] flex overflow-hidden group">
    <!-- Image Container -->
    <div class="flex-1 relative overflow-hidden transition-all duration-500 hover:flex-[1.25]">
        <img src="{{ asset('images/main.jpg') }}" alt="Image 1"
            class="w-full h-full object-cover transform transition-transform duration-700 ease-out group-hover:scale-105">
        <div class="absolute inset-0 bg-gradient-to-r from-black/30 to-transparent"></div>
    </div>

    <div class="flex-1 relative overflow-hidden transition-all duration-500 hover:flex-[1.25]">
        <img src="{{ asset('images/main1.jpg') }}" alt="Image 2"
            class="w-full h-full object-cover transform transition-transform duration-700 ease-out group-hover:scale-105">
        <div class="absolute inset-0 bg-gradient-to-r from-black/30 to-transparent"></div>
    </div>

    <div class="flex-1 relative overflow-hidden transition-all duration-500 hover:flex-[1.25]">
        <img src="{{ asset('images/main2.jpg') }}" alt="Image 3"
            class="w-full h-full object-cover transform transition-transform duration-700 ease-out group-hover:scale-105">
        <div class="absolute inset-0 bg-gradient-to-r from-black/30 to-transparent"></div>
    </div>

    <!-- Centered Content -->
    <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
        <div class="text-center text-white px-4">
            <h1 class="text-4xl md:text-6xl font-bold mb-4 drop-shadow-2xl">
                Welcome to Our Site
            </h1>
            <p class="text-lg md:text-xl max-w-2xl mx-auto drop-shadow-md">
                Discover amazing experiences with our unique collection
            </p>
        </div>
        <!-- Anim Content Nourishing -->
        <div class="flex flex-col items-center">
           <section class="py-20 px-4">
            
                
                    <div class="container mx-auto text-center bg-gray-200 py-8 rounded-lg shadow-md">
                        <h1 class="text-5xl font-bold text-gray-800" x-data="{ 
                                currentWordIndex: 0,
                                words: ['Body', 'Soul', 'Style', 'Wellness'],
                                init() {
                                    setInterval(() => {
                                        this.currentWordIndex = (this.currentWordIndex + 1) % this.words.length;
                                    }, 3000);
                                }
                            }">
                            <!-- Nourishing with separate box on mobile -->
                            <span class="inline-block bg-white px-4 py-2 rounded-lg sm:bg-transparent sm:p-0">
                                Nourishing
                            </span>
                
                            <!-- Animated rotating words in separate box -->
                            <div class="relative mt-4 sm:mt-0 sm:inline-block sm:ml-2">
                                <div class="bg-white px-4 py-2 rounded-lg sm:bg-transparent sm:p-0">
                                    <template x-for="(word, index) in words" :key="index">
                                        <span x-show="currentWordIndex === index" x-transition:enter="transition ease-out duration-300"
                                            x-transition:enter-start="opacity-0 translate-y-2"
                                            x-transition:enter-end="opacity-100 translate-y-0"
                                            x-transition:leave="transition ease-in duration-300"
                                            x-transition:leave-start="opacity-100 translate-y-0"
                                            x-transition:leave-end="opacity-0 -translate-y-2"
                                            class="block sm:absolute left-0 text-center sm:text-left text-emerald-600">
                                            <span x-text="word"></span>
                                        </span>
                                    </template>
                                </div>
                            </div>
                        </h1>
                    </div>
                
            
        </section>
        </div>
        <!-- Include Alpine.js if not already included -->
    </div>
</div>
<div class=" w-full h-full flex flex-col items-center justify-center">
    <h1 class="text-black text-6xl font-bold ">Empowering change one step at a time</h1>
    <p class="text-black text-lg mt-4">Join us in making a difference by supporting our cause.</p>
    <a href="{{ url('/donate') }}"
        class="mt-6 px-6 py-3 bg-red-600 text-white text-lg font-semibold rounded-md shadow-md hover:bg-red-700 transition duration-300 ease-in-out">Donate
        Now</a>
</div>