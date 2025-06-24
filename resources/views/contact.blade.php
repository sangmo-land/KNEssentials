<x-main>

<section class="bg-gray-50 py-12">
    <!-- Hero Section -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold mb-4 text-black">Get In Touch With Us</h1>
        <p class="text-lg text-gray-600">Let’s talk about your project or inquiry. We’re happy to help.</p>
    </div>

    <!-- Contact Info Cards -->
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition text-black">
            <div class="flex items-center justify-center mb-4">
                <i class="fas fa-map-marker-alt text-4xl text-blue-500"></i>
            </div>
            <h3 class="text-xl font-semibold text-center mb-2">Office Address</h3>
            <p class="text-center text-gray-600">Douala, Bonamoussadi, Rue des écoles</p>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition text-black">
            <div class="flex items-center justify-center mb-4">
                <i class="fas fa-phone-alt text-4xl text-green-500"></i>
            </div>
            <h3 class="text-xl font-semibold text-center mb-2">Phone</h3>
            <p class="text-center text-gray-600"><a href="tel:+237123456789" class="hover:underline">+237 123 456
                    789</a></p>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition text-black">
            <div class="flex items-center justify-center mb-4">
                <i class="fas fa-envelope text-4xl text-red-500"></i>
            </div>
            <h3 class="text-xl font-semibold text-center mb-2">Email</h3>
            <p class="text-center text-gray-600"><a href="mailto:info@civiconnexus.com"
                    class="hover:underline">info@civiconnexus.com</a></p>
        </div>
    </div>

    <!-- Contact Form -->
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow">
        <form action="#" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-gray-700 mb-2">Full Name</label>
                <input type="text" name="name" required
                    class="w-full border-gray-300 rounded-xl shadow-sm focus:ring-blue-500 focus:border-blue-500" />
            </div>
            <div>
                <label class="block text-gray-700 mb-2">Email Address</label>
                <input type="email" name="email" required
                    class="w-full border-gray-300 rounded-xl shadow-sm focus:ring-blue-500 focus:border-blue-500" />
            </div>
            <div>
                <label class="block text-gray-700 mb-2">Subject</label>
                <select name="subject" required
                    class="w-full border-gray-300 rounded-xl shadow-sm focus:ring-blue-500 focus:border-blue-500 text-black">
                    <option value="">Select a subject</option>
                    <option>Project Inquiry</option>
                    <option>Partnership</option>
                    <option>Recruitment</option>
                    <option>Other</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-700 mb-2">Message</label>
                <textarea name="message" rows="5" required
                    class="w-full border-gray-300 rounded-xl shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>
            <div class="text-center">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded-xl shadow transition">Send
                    Message</button>
            </div>
        </form>
    </div>

    <!-- Google Map -->
    <div class="max-w-5xl mx-auto mt-16 rounded-2xl overflow-hidden shadow">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3979.758945472674!2d9.709511575044588!3d4.058342096067881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10610dc57e5518e9%3A0xf25e849bbf086a6e!2sBonamoussadi!5e0!3m2!1sen!2scm!4v1711452852713"
            width="100%" height="400" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</section>

</x-main>