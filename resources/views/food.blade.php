<x-main>

    <!-- Our Services Section -->
    <section class="py-16 px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-12">Our Food Services</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Catering Service -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="w-full h-48 bg-gray-200 rounded-lg mb-4"></div>
                    <h3 class="text-xl font-bold mb-2 text-black">Event Catering</h3>
                    <p class="text-gray-600 mb-4">Traditional Cameroonian catering for weddings, birthdays and corporate
                        events</p>
                    <ul class="list-disc pl-5 mb-4 text-gray-600">
                        <li>Ndolé Party Packages</li>
                        <li>Achu Soup Special</li>
                        <li>Grilled Fish & Bobolo</li>
                    </ul>
                    <button class="text-yellow-600 font-semibold">View Menu →</button>
                </div>

                <!-- Cooking Classes -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="w-full h-48 bg-gray-200 rounded-lg mb-4"></div>
                    <h3 class="text-xl font-bold mb-2 text-black ">Cooking Academy</h3>
                    <p class="text-gray-600 mb-4 ">Learn authentic Cameroonian cooking techniques from master chefs</p>
                    <div class="space-y-2">
                        <div class="flex items-center">
                            <span class="mr-2">🇨🇲</span>
                            <span class="text-black">Koki Beans Workshop</span>
                        </div>
                        <div class="flex items-center">
                            <span class="mr-2">🔥</span>
                            <span class="text-black">Pepper Soup Masterclass</span>
                        </div>
                    </div>
                </div>

                <!-- Meal Plans -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="w-full h-48 bg-gray-200 rounded-lg mb-4"></div>
                    <h3 class="text-xl font-bold mb-2 text-black">Weekly Meal Plans</h3>
                    <p class="text-gray-600 mb-4">Traditional home-style meals delivered weekly</p>
                    <div class="bg-green-50 p-4 rounded-lg">
                        <h4 class="font-semibold mb-2 text-black">This Week's Special:</h4>
                        <p class="text-black">Eru with Water Fufu + Grilled Fish</p>
                        <p class="text-sm text-gray-500">Bamenda-style preparation</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Signature Dishes Section -->
    <section class="bg-green-800 text-white py-16 px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-12">Cameroonian Signature Dishes</h2>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="flex items-center bg-white bg-opacity-10 p-6 rounded-lg">
                    <div class="w-32 h-32 bg-gray-300 rounded-full mr-6"></div>
                    <div>
                        <h3 class="text-xl font-bold mb-2">Ndolé</h3>
                        <p class="mb-2">National dish made with bitterleaf, nuts, and meat/fish</p>
                        <span class="text-sm bg-green-600 px-3 py-1 rounded-full">Littoral Region Specialty</span>
                    </div>
                </div>
                <div class="flex items-center bg-white bg-opacity-10 p-6 rounded-lg">
                    <div class="w-32 h-32 bg-gray-300 rounded-full mr-6"></div>
                    <div>
                        <h3 class="text-xl font-bold mb-2">Achu Soup</h3>
                        <p class="mb-2">Yellow soup with cocoyam paste, served with assorted meats</p>
                        <span class="text-sm bg-green-600 px-3 py-1 rounded-full">Northwest Tradition</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="py-16 px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-12">Authentic Ingredients</h2>
            <div class="grid md:grid-cols-4 gap-6 mb-12">
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <div class="h-40 bg-gray-200 rounded-lg mb-4"></div>
                    <h3 class="font-bold mb-2">Red Palm Oil</h3>
                    <p class="text-sm text-gray-600 mb-2">500ml - Pressed in Lebialem</p>
                    <p class="text-yellow-600 font-bold">$8.99</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <div class="h-40 bg-gray-200 rounded-lg mb-4"></div>
                    <h3 class="font-bold mb-2">Mbongo Spices</h3>
                    <p class="text-sm text-gray-600 mb-2">Traditional black spice mix</p>
                    <p class="text-yellow-600 font-bold">$6.50</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <div class="h-40 bg-gray-200 rounded-lg mb-4"></div>
                    <h3 class="font-bold mb-2">Garri</h3>
                    <p class="text-sm text-gray-600 mb-2">Premium cassava granules</p>
                    <p class="text-yellow-600 font-bold">$4.99/kg</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <div class="h-40 bg-gray-200 rounded-lg mb-4"></div>
                    <h3 class="font-bold mb-2">Plantain Chips</h3>
                    <p class="text-sm text-gray-600 mb-2">Ripe & Unripe options</p>
                    <p class="text-yellow-600 font-bold">$3.99</p>
                </div>
            </div>

            <div class="text-center">
                <a href="{{ route('products.index') }}"
                    class="inline-flex items-center px-8 py-3 bg-yellow-600 text-white rounded-full hover:bg-yellow-700 transition-all font-semibold text-lg">
                    View All Food Products
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Chef Section -->
    <section class="bg-gray-100 py-16 px-4">
        <div class="max-w-4xl mx-auto text-center">
            <div class="w-32 h-32 bg-gray-400 rounded-full mx-auto mb-6"></div>
            <h3 class="text-2xl font-bold mb-4">Meet Chef Armand</h3>
            <p class="text-gray-600 max-w-2xl mx-auto">
                "Born and raised in Douala, I've dedicated my life to preserving and sharing authentic Cameroonian
                flavors. From the coastal mbanga soup to the northern millet fufu, every dish tells our story."
            </p>
        </div>
    </section>

</x-main>