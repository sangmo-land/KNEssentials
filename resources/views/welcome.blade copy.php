<x-main>
    <div>
       
         <div class="bg-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col lg:flex-row gap-8">
                    <div class="flex flex-col flex-1">
                        <livewire:counter />
                        <h2 class="text-3xl font-extrabold text-gray-900">About Us</h2>
                        <p class="mt-4 text-lg text-gray-500 p-4">
                            <span class="text-6xl">Our journey of compassion and hope</span>
                        </p>
                        <div class="bg-lightblue-100 p-4 rounded-md text-black">
                            Join us on a journey towards compassion and hope. Through our non-profit organisation, we strive
                            to make a positive
                            impact on the world. Give back to your community and be a part of something greater than
                            yourself.
    
                            A transformational journey towards bringing hope and compassion to the world.
                        </div>
                        <a href="{{ url('/about') }}"
                            class="mt-4 px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-md shadow-md hover:bg-blue-700 transition duration-300 ease-in-out w-32 text-center">Read
                            More</a>
                    </div>
                    <div class="flex flex-row gap-4 flex-1">
                        <div class="flex flex-col flex-2 space-y-4">
                            <x-image width=300 />
                            <x-image width=300 height=300 />
                        </div>
                        <div class="flex flex-col flex-2 space-y-4">
                            <x-image width=300 height=300 />
                            <x-image width=300 />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Categories Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-10 text-black">What We Offer</h2>
            <div class="flex flex-col lg:flex-row gap-0">
              
                <div class="space-y-16 py-12">
                    
                    <!-- Food Service -->
                    <x-service-card title="Food Delivery" image="images/main1.jpg" route="food" :reverse="false" :features="[
                                'Ndolé Special - Bitterleaf stew with shrimp and groundnuts',
                                'Achu Soup Combo - Traditional cocoyam with yellow soup',
                                'Grilled Fish Platter - Served with bobolo and plantains'
                            ]"
                        description="Cameroonian cuisine blends bold flavors and cultural heritage. Dishes like ndolé (bitterleaf stew with groundnuts) and achu (cocoyam with yellow soup) highlight local ingredients. Street snacks include brochettes and puff-puff, while mbongo tchobi (spicy stew) and fermented cassava (bobolo) emphasize communal meals." />
                
                  <!-- Fashion Service -->
                <x-service-card title="Fashion" image="images/fashion.jpg" route="fashion" :reverse="true" :features="[
                            'New Arrivals: Traditional Kabba outfits',
                            'Limited Edition: Bamileke bead accessories',
                            'Custom Tailoring: Modern African fusion wear'
                        ]"
                    description="Discover contemporary African fashion that blends traditional craftsmanship with modern design. From vibrant Ankara prints to elegant hand-woven textiles, experience Cameroon's rich textile heritage." />
                
                   
                    <!-- Healthcare Service -->
                        <x-service-card title="Health Care" image="images/healthcare.jpg" route="healthcare" :reverse="false" :features="[
                                    'Traditional herbal consultations',
                                    'Modern medical checkup packages',
                                    'Wellness programs combining both approaches'
                                ]"
                            description="Integrating traditional Cameroonian healing practices with modern medicine. Our holistic approach to healthcare respects cultural traditions while embracing medical advancements." />

                   <!-- Music Service -->
                    <x-service-card title="Music" image="images/music.jpg" route="music" :reverse="true" :features="[
                                'Exclusive Bikutsi rhythm collections',
                                'Traditional Makossa instrumentals',
                                'Modern African fusion collaborations'
                            ]"
                        description="Experience the soul of Cameroon through its music. From traditional tribal rhythms to contemporary urban fusion, discover sounds that move both body and spirit." />
                    </div>

                </div>
            </div>
        </div>


        <!-- Accomplishments Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-0">
                <x-card header="The Special one" class="bg-white">
                    Our mission is to make a positive impact on the world by empowering individuals and communities through
                    various
                    initiatives and programs. We believe in the power of collective action and strive to create a better
                    future for
                    everyone.
                </x-card>
                <x-card header="Delicious meals for all" class="bg-white">
                    We provide delicious and nutritious meals to those in need, ensuring that everyone has access to healthy
                    food. Our programs are designed to support individuals and families, promoting well-being and community
                    growth.
                </x-card>
            </div>
        </div>
    
    
    </div>
</x-main>