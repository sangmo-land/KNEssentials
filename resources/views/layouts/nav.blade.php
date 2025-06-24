<nav x-data="{ scrolled: false, open: false }"
    x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 50 })"
    :class="scrolled ? 'bg-white shadow-md' : 'bg-transparent'"
    class="p-4 fixed top-0 w-full z-20 transition-colors duration-300 ease-in-out">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
       <x-logo/>

        <!-- Mobile hamburger menu -->
        <div class="sm:hidden">
            <button @click="open = !open" class="focus:outline-none">
                <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                    stroke="black">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                    stroke="black">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Slide-in mobile menu -->
            <div x-show="open" x-transition:enter="transition transform duration-300"
                x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transition transform duration-300" x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full" @click.away="open = false"
                class="fixed right-0 top-0 h-full w-3/4 bg-white shadow-2xl z-30 p-6 flex flex-col gap-4">
                <a href="/" class="text-black hover:text-blue-500 font-bold text-xl">Home</a>
                <a href="{{ route('about') }}" class="text-black hover:text-blue-500 font-bold text-xl">About</a>
                <a href="{{ route('services.index') }}" class="text-black hover:text-blue-500 font-bold text-xl">Services</a>
                <a href="{{ route('products.index') }}" class="text-black hover:text-blue-500 font-bold text-xl">Products</a>
                <a href="{{ route('contact') }}" class="text-black hover:text-blue-500 font-bold text-xl">Contact</a>
                @auth
                <div class="flex gap-4 justify-between items-center">
                    <a class="text-lg text-gray-900 underline font-bold" href="{{ url('/logout') }}">Logout</a>
                    <a class="text-lg text-gray-900 underline font-bold" href="{{ url('/admin') }}">Admin</a>
                    </div>
                @else
                <a href="{{ url('/login') }}" class="text-black hover:text-blue-500 text-lg mt-4">Login</a>
                @endauth
            </div>
        </div>

        <!-- Desktop links -->
        <div class="hidden sm:flex justify-between items-center space-x-12">
            <div class="space-x-4">
                <a href="/"
                    class="text-black hover:text-blue-500 font-bold text-xl transition duration-300 transform hover:scale-110">Home</a>
                <a href="{{ route('about') }}"
                    class="text-black hover:text-blue-500 font-bold text-xl transition duration-300 transform hover:scale-110">About</a>
                <a href="{{ route('services.index') }}"
                    class="text-black hover:text-blue-500 font-bold text-xl transition duration-300 transform hover:scale-110">Services</a>
                <a href="{{ route('products.index') }}"
                    class="text-black hover:text-blue-500 font-bold text-xl transition duration-300 transform hover:scale-110">Products</a>
                <a href="{{ route('contact') }}"
                    class="text-black hover:text-blue-500 font-bold text-xl transition duration-300 transform hover:scale-110">Contact</a>
            </div>
            <div class="flex justify-end p-4">
                @auth
                <div class="flex gap-4 justify-between items-center">
                <a class="text-lg text-gray-900 underline font-bold" href="{{ url('/logout') }}">Logout</a>
                <a class="text-lg text-gray-900 underline font-bold" href="{{ url('/admin') }}">Admin</a>
                </div>
                @else
                <div class="flex space-x-4 text-lg font-bold">
                    <a href="{{ url('/login') }}" class="text-gray-700 underline">Login</a>
                    <a href="{{ url('/register') }}" class="text-gray-700 underline">Register</a>
                </div>
                @endauth
            </div>
        </div>
    </div>
</nav>