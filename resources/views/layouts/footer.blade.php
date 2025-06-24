<footer class="relative bg-darkBlue opacity-95 text-white">
    <div class="container mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 mt-10">
        <div class="flex flex-col  justify-between items-center">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- Logo/Intro (always visible) -->
            <div>
                <div class="flex flex-col items-center gap-4 text-center">
                    <x-logo type="footer" />
                    <div>
                        <h4 class="font-bold text-2xl">The power of giving</h4>
                        <p class="text-lg leading-relaxed">Support a cause and make a <br />difference through charity.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Example collapsible / always expanded section -->
            <div x-data="{ open: false }" class="border-t sm:border-none pt-4 sm:pt-0">
                <!-- Heading (clickable only on small screens) -->
                <h4 class="font-bold text-2xl flex items-center justify-between cursor-pointer sm:cursor-default"
                    @click="open = !open">
                    Ways To Give
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 transform transition-transform block sm:hidden"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </h4>

                <!-- Content: visible on large screens, toggle on small screens -->
                <ul x-show="open" x-transition class="text-lg leading-relaxed mt-2 space-y-1 block sm:hidden">
                    <li>Fundraise</li>
                    <li>Planned Giving</li>
                    <li>Brand Partnership</li>
                    <li>Legacy Giving</li>
                </ul>
                <ul class="hidden sm:block text-lg leading-relaxed mt-2 space-y-1">
                    <li>Fundraise</li>
                    <li>Planned Giving</li>
                    <li>Brand Partnership</li>
                    <li>Legacy Giving</li>
                </ul>
            </div>

            <div x-data="{ open: false }" class="border-t sm:border-none pt-4 sm:pt-0">
                <h4 class="font-bold text-2xl flex items-center justify-between cursor-pointer sm:cursor-default"
                    @click="open = !open">
                    Contact Info
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 transform transition-transform block sm:hidden"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </h4>
                <address x-show="open" x-transition class="text-lg leading-relaxed mt-2 block sm:hidden">
                    1234 Thornridge Cir. Syracuse,<br>
                    Connecticut 56789<br>
                    (406) 555-0121<br>
                    <a href="mailto:mail@example.com" class="text-blue-400">KNessentials@gmail.com</a>
                </address>
                <address class="hidden sm:block text-lg leading-relaxed mt-2">
                    1234 Thornridge Cir. Syracuse,<br>
                    Connecticut 56789<br>
                    (406) 555-0121<br>
                    <a href="mailto:mail@example.com" class="text-blue-400">KNessentials@gmail.com</a>
                </address>
            </div>

            <div x-data="{ open: false }" class="border-t sm:border-none pt-4 sm:pt-0">
                <h4 class="font-bold text-2xl flex items-center justify-between cursor-pointer sm:cursor-default"
                    @click="open = !open">
                    About Us
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 transform transition-transform block sm:hidden"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </h4>
                <ul x-show="open" x-transition class="text-lg leading-relaxed mt-2 space-y-1 block sm:hidden">
                    <li>Our History</li>
                    <li>What We Believe</li>
                    <li>Our Programs</li>
                    <li>Partners</li>
                </ul>
                <ul class="hidden sm:block text-lg leading-relaxed mt-2 space-y-1">
                    <li>Our History</li>
                    <li>What We Believe</li>
                    <li>Our Programs</li>
                    <li>Partners</li>
                </ul>
            </div>

        </div>
        <!-- Social Media Links -->
        <div class="mt-4 flex gap-20">
            <a href="https://facebook.com" target="_blank" class="hover:text-blue-400 transition-colors">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                </svg>
            </a>
            <a href="https://twitter.com" target="_blank" class="hover:text-blue-400 transition-colors">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                </svg>
            </a>
            <a href="https://instagram.com" target="_blank" class="hover:text-blue-400 transition-colors">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z" />
                </svg>
            </a>
            <a href="https://linkedin.com" target="_blank" class="hover:text-blue-400 transition-colors">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                </svg>
            </a>
        </div>
        </div>
    </div>
</footer>



         
                    
              

   