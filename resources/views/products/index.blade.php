<x-main>
    <section class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <!-- Animated Success Message -->
        @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform -translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-2"
            class="bg-emerald-50 border-l-4 border-emerald-400 p-4 mb-6 rounded-lg shadow-lg max-w-4xl mx-auto"
            x-init="setTimeout(() => show = false, 3000)">
            <div class="flex items-center">
                <svg class="h-5 w-5 text-emerald-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                </svg>
                <p class="ml-3 text-sm text-emerald-600 font-medium">{{ session('success') }}</p>
            </div>
        </div>
        @endif

        @foreach ($categories as $category)
        <div class="max-w-7xl mx-auto mb-16" x-data="{ isLoading: false }">
            <!-- Category Header with Hover Effect -->
            <div class="max-w-2xl mx-auto text-center group mb-12">
                <h2 class="text-4xl font-extrabold text-gray-900 mb-4 relative inline-block">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-600">
                        {{ $category->name }}
                    </span>
                    <span
                        class="absolute -bottom-2 left-0 w-full h-1 bg-gradient-to-r from-blue-400 to-purple-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                </h2>
                <p
                    class="mt-4 text-xl text-gray-600 leading-relaxed opacity-90 hover:opacity-100 transition-opacity duration-200">
                    Discover our uplifting and inspiring gospel music to feed your soul.
                </p>
            </div>

            @if ($productsByCategory[$category->id]['products']->count() > 0)
            <!-- Product Grid with Hover Effects -->
            @foreach ($productsByCategory[$category->id]['products'] as $product)
            <div class="flex flex-col md:flex-row gap-6 p-6 border rounded-xl mb-8 hover:shadow-lg transition-all group">
                <!-- Image Section (Left) -->
                <div class="md:w-2/5 relative overflow-hidden rounded-xl">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                            class="w-full h-48 md:h-64 object-cover transform transition-transform duration-300 group-hover:scale-105">
                    
                </div>
            
                <!-- Product Details (Middle) -->
                <div class="md:w-2/5 flex flex-col justify-between py-2">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">
                            <a href="{{ route('products.show', $product->id) }}" class="hover:text-blue-600 transition-colors">
                                {{ $product->name }}
                            </a>
                        </h2>
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            {{ $product->description }}
                        </p>
                        <div class="flex items-center gap-4 mb-4">
                            <span class="text-xl font-bold text-blue-600">
                                ${{ number_format($product->price, 2) }}
                            </span>
                            <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-sm">
                                {{ $product->category->name }}
                            </span>
                        </div>
                    </div>
                    <a href="{{ route('products.show', $product->id) }}"
                        class="self-start px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                        View Details
                    </a>
                </div>
            
                <!-- Reviews Section (Right) -->
                <div class="md:w-1/5 border-l md:border-gray-200 md:pl-6 pt-4 md:pt-0">
                    <h3 class="text-sm font-semibold text-gray-700 mb-3">Recent Reviews</h3>
                    <div x-data="{
                        currentPair: 0,
                        direction: 'right',
                        reviews: {{ json_encode($product->reviews->map(function($review) {
                            return [
                                'id' => $review->id,
                                'user' => $review->user->name,
                                'rating' => $review->rating,
                                'comment' => $review->comment,
                            ];
                        })) }},
                        get pairs() {
                            return this.reviews.reduce((acc, val, i) => {
                                if (i % 2 === 0) acc.push([val]);
                                else acc[acc.length-1].push(val);
                                return acc;
                            }, []);
                        },
                        init() {
                            if (this.pairs.length > 1) {
                                setInterval(() => {
                                    this.currentPair = (this.currentPair + 1) % this.pairs.length;
                                    const firstId = this.pairs[this.currentPair][0].id;
                                    this.direction = firstId % 2 === 0 ? 'left' : 'right';
                                }, 3000);
                            }
                        }
                    }" class="relative h-40 overflow-hidden">
                        <template x-for="(pair, index) in pairs" :key="index">
                            <div class="absolute inset-0 transform transition-transform duration-500 ease-in-out" :class="{
                                    'translate-x-0': currentPair === index,
                                    'translate-x-full': direction === 'left' && currentPair !== index,
                                    '-translate-x-full': direction === 'right' && currentPair !== index
                                }">
                                <template x-for="review in pair" :key="review.id">
                                    <div class="pb-4">
                                        <div class="flex items-center gap-2 mb-1">
                                            <span class="text-sm font-medium text-gray-700" x-text="review.user"></span>
                                            <div class="flex items-center text-yellow-400">
                                                <template x-for="i in 5">
                                                    <svg class="w-3 h-3 fill-current"
                                                        :class="i <= review.rating ? 'text-yellow-400' : 'text-gray-300'"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                                    </svg>
                                                </template>
                                            </div>
                                        </div>
                                        <p class="text-sm text-gray-600 line-clamp-2" x-text="review.comment"></p>
                                    </div>
                                </template>
                            </div>
                        </template>
                
                        <template x-if="reviews.length === 0">
                            <p class="text-sm text-gray-400">No reviews yet</p>
                        </template>
                    </div>
                </div>
                
                
            </div>
            @endforeach

            @if ($productsByCategory[$category->id]['total'] > 3)
            <!-- Animated Show All Button -->
            <div class="mt-8 text-center">
                <a href="{{ route('categories.products.show_all', $category) }}" @click="isLoading = true"
                    class="inline-flex items-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                    <span x-show="!isLoading">Show All {{ $category->name }} Products</span>
                    <span x-show="isLoading" class="flex items-center">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        Loading...
                    </span>
                    <span
                        class="ml-2 bg-white/20 px-3 py-1 rounded-full text-sm">{{ $productsByCategory[$category->id]['total'] }}+</span>
                </a>
            </div>
            @endif

            @else
            <!-- Empty State -->
            <div class="text-center py-12">
                <svg class="mx-auto h-24 w-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="mt-4 text-xl text-gray-500 font-medium">No products available in this category.</p>
            </div>
            @endif

            <!-- Section Divider -->
            @if(!$loop->last)
            <div
                class="mt-16 mb-20 border-b border-gray-200 opacity-50 hover:opacity-100 transition-opacity duration-300 mx-auto w-3/4">
            </div>
            @endif
        </div>
        @endforeach
    </section>

    <!-- Include Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</x-main>