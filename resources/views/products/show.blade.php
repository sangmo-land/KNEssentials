<x-main>




<section class="container mx-auto py-12 px-6">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Product Details') }}
    </h2>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div x-data="{ showDeleteConfirmation: false }"
                class="relative p-4 sm:p-8 bg-white rounded-lg sm:rounded-2xl shadow-lg sm:shadow-2xl transform transition-all duration-300 hover:shadow-xl sm:hover:shadow-3xl hover:-translate-y-1 sm:hover:-translate-y-2 border border-gray-100 max-w-7xl mx-auto">
                <!-- Image Section -->
                <div class="flex  justify-center mb-4 sm:mb-8 group relative overflow-hidden rounded-lg sm:rounded-xl">
                    @if($product->image)
                    <div class="md:w-2/5 relative overflow-hidden rounded-xl">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                        class="h-48 sm:h-56 md:h-64 w-full object-cover transition-transform duration-500 group-hover:scale-105">
                        <!-- Price Badge -->
                        <div
                       
                            class="absolute top-2 right-2 sm:top-4 sm:right-4 bg-gradient-to-r from-purple-600 to-blue-500 text-white px-3 py-1 sm:px-4 sm:py-2 text-sm sm:text-base rounded-full shadow-md">
                            ${{ number_format($product->price, 2) }}
                        </div>
                    </div>
                    @else
                    <div
                        class="h-48 sm:h-56 md:h-64 w-full bg-gradient-to-r from-purple-100 to-blue-100 flex items-center justify-center">
                        <!-- ... same SVG placeholder ... -->
                    </div>
                    @endif
            
                   
                    
                </div>
            
                <!-- Product Details -->
                <div class="space-y-2 sm:space-y-4">
                    <h3 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-900 tracking-tight leading-tight">
                        {{ $product->name }}
                    </h3>
            
                    <p class="text-gray-600 text-sm sm:text-base md:text-lg leading-relaxed">
                        {{ $product->description }}
                    </p>
            
                    <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-2 space-y-2 sm:space-y-0">
                        <span
                            class="self-start bg-indigo-100 text-indigo-800 text-xs sm:text-sm font-medium px-2 py-1 sm:px-3 sm:py-1 rounded-full">
                            {{ $product->category->name }}
                        </span>
                        <span class="text-xs sm:text-sm text-gray-500">
                            Added {{ $product->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
            @auth
            @if(Auth::user()->is_admin)
                <!-- Action Buttons -->

                <div class="mt-6 sm:mt-8 flex flex-col sm:flex-row sm:space-x-4 space-y-4 sm:space-y-0">
                   <a href="{{ route('products.edit', $product->id) }}" class="order-2 sm:order-1 bg-gradient-to-r from-indigo-500 to-blue-600 hover:from-indigo-600 hover:to-blue-700 text-white font-semibold py-2 sm:py-3 px-4 sm:px-6 rounded-lg sm:rounded-xl transition-all duration-300 transform hover:scale-[1.02] shadow-md hover:shadow-lg text-sm sm:text-base
                          w-full sm:w-auto flex items-center justify-center">
                    <!-- Added these classes -->
                    ✏️ Edit Product
                </a>
            
                    <button @click="showDeleteConfirmation = true"
                        class="order-1 sm:order-2 bg-gradient-to-r from-red-500 to-pink-600 hover:from-red-600 hover:to-pink-700 text-white font-semibold py-2 sm:py-3 px-4 sm:px-6 rounded-lg sm:rounded-xl transition-all duration-300 transform hover:scale-[1.02] shadow-md hover:shadow-lg text-sm sm:text-base">
                        🗑️ Delete
                    </button>
                </div>
            
                <!-- Delete Confirmation Modal (Responsive) -->
                <div x-show="showDeleteConfirmation" x-cloak
                    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4"
                    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="bg-white rounded-xl sm:rounded-2xl p-4 sm:p-8 w-full max-w-xs sm:max-w-md">
                        <h3 class="text-lg sm:text-2xl font-bold text-gray-900 mb-2 sm:mb-4">Confirm Delete</h3>
                        <p class="text-sm sm:text-base text-gray-600 mb-4 sm:mb-6">Are you sure you want to delete this product?</p>
                        <div class="flex flex-col sm:flex-row justify-end space-y-2 sm:space-y-0 sm:space-x-4">
                            <button @click="showDeleteConfirmation = false"
                                class="px-4 sm:px-6 py-2 text-gray-600 hover:text-gray-800 text-sm sm:text-base">
                                Cancel
                            </button>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="w-full sm:w-auto">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-full sm:w-auto px-4 sm:px-6 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm sm:text-base">
                                    Confirm Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
            @endauth
                <!-- Back Link -->
                <div class="mt-4 sm:mt-6 md:mt-8">
                    <a href="{{ route('products.index') }}"
                        class="inline-flex items-center text-blue-600 hover:text-blue-800 text-sm sm:text-base">
                        <span class="mr-1 sm:mr-2">←</span>
                        <span class="border-b-2 border-transparent hover:border-blue-600">
                            Back to Products
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
</x-main>