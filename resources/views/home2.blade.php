<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrimeServe - Integrated Lifestyle Solutions</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-50">
   
    <!-- Hero Section -->
    <section class="pt-24 pb-12 bg-gradient-to-r from-indigo-500 to-purple-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-8"
                    x-data="{ texts: ['Nourishing Body', 'Soul', 'Style', 'Wellness'], active: 0 }"
                    x-init="setInterval(() => active = (active + 1) % texts.length, 2000)">
                    <span class="block">Your Complete Lifestyle Solution</span>
                    <span class="text-orange-300" x-text="texts[active]"></span>
                </h1>

                <!-- Service Grid -->
                <div class="grid md:grid-cols-4 gap-6 mt-12">
                    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                        <i class="fas fa-utensils text-orange-400 text-3xl mb-4"></i>
                        <h3 class="text-xl font-semibold mb-2">Food Delivery</h3>
                        <p class="text-gray-600">30-minutes delivery guarantee</p>
                        <button class="mt-4 text-indigo-600 hover:text-indigo-700 font-medium">Order Food →</button>
                    </div>

                    <!-- Repeat similar blocks for other services -->
                </div>
            </div>
        </div>
    </section>

    <!-- Promotional Slider -->
    <section class="py-12" x-data="{ activeSlide: 0 }">
        <div class="max-w-7xl mx-auto px-4">
            <div class="relative overflow-hidden rounded-xl">
                <div class="flex transition-transform duration-300 ease-in-out"
                    :style="`transform: translateX(-${activeSlide * 100}%)`">
                    <!-- Slides -->
                    <div class="w-full flex-shrink-0 bg-orange-100 p-8 md:p-12">
                        <div class="max-w-3xl mx-auto text-center">
                            <span class="bg-orange-400 text-white px-4 py-1 rounded-full text-sm">Food Special</span>
                            <h2 class="text-3xl font-bold mt-4 mb-6">50% Off First Order</h2>
                            <p class="text-gray-600 mb-6">Use code: FRESH50</p>
                            <button class="bg-indigo-600 text-white px-8 py-3 rounded-full hover:bg-indigo-700">
                                Claim Offer
                            </button>
                        </div>
                    </div>

                    <!-- Add more slides following same pattern -->
                </div>

                <!-- Slider Controls -->
                <button class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-white p-3 rounded-full shadow"
                    @click="activeSlide = activeSlide === 0 ? 3 : activeSlide - 1">
                    ←
                </button>
                <button class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-white p-3 rounded-full shadow"
                    @click="activeSlide = (activeSlide + 1) % 4">
                    →
                </button>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">What Our Clients Say</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6" x-data="{ activeTestimonial: 0 }">
                <!-- Testimonial Cards -->
                <div class="bg-white p-6 rounded-lg shadow-md" x-show="activeTestimonial === 0"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform translate-y-4"
                    x-transition:enter-end="opacity-100 transform translate-y-0">
                    <div class="flex items-center mb-4">
                        <img class="h-12 w-12 rounded-full" src="user1.jpg" alt="Client">
                        <div class="ml-4">
                            <h4 class="font-semibold">John D.</h4>
                            <div class="flex text-yellow-400 text-sm">
                                ★★★★★
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600">"The fastest food delivery in town! Never disappoints."</p>
                    <span class="inline-block mt-4 px-2 py-1 bg-indigo-100 text-indigo-600 text-sm rounded">Food
                        Delivery</span>
                </div>

                <!-- Add more testimonials -->
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">Latest Updates</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <img src="blog1.jpg" alt="Health Tips" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <span class="text-indigo-600 text-sm font-medium">Health Care</span>
                        <h3 class="text-xl font-semibold mt-2 mb-3">5 Daily Wellness Habits</h3>
                        <p class="text-gray-600">Discover simple routines for better health...</p>
                        <div class="mt-4 flex items-center text-sm text-gray-500">
                            <span>5 min read</span>
                        </div>
                    </div>
                </article>

                <!-- Add more blog posts -->
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-indigo-400">About Us</a></li>
                        <!-- Add more links -->
                    </ul>
                </div>

                <!-- Newsletter -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Newsletter</h3>
                    <form x-data="{ email: '' }" @submit.prevent="window.location = `/subscribe?email=${email}`"
                        class="flex gap-2">
                        <input type="email" x-model="email" required class="flex-1 rounded-lg px-4 py-2 text-gray-900"
                            placeholder="Enter your email">
                        <button type="submit" class="bg-indigo-600 px-4 py-2 rounded-lg hover:bg-indigo-700">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <div class="flex justify-center space-x-6 mb-4">
                    <a href="#" class="hover:text-indigo-400"><i class="fab fa-facebook"></i></a>
                    <!-- Add other social icons -->
                </div>
                <p class="text-sm text-gray-400">&copy; 2023 PrimeServe. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>