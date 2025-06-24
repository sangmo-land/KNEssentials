{{-- resources/views/components/categories/healthcare.blade.php --}}
@props(['category'])

<section class="bg-gradient-to-br from-blue-50 to-indigo-50 py-16">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="text-center animate-fade-in">
            <h2 class="text-4xl font-bold mb-6 text-blue-800 transform transition duration-700 hover:scale-105">
                🧩 Understanding Autism: Our Advocacy Journey
            </h2>
            <div class="prose-lg text-left text-gray-700 space-y-6">
                <p class="animate-slide-in-left text-xl leading-relaxed">
                    Autism Spectrum Disorder (ASD) represents a neurodevelopmental journey that reshapes perspectives
                    and transforms lives. As parents of an autistic child, we've experienced firsthand both the unique
                    challenges and extraordinary beauty that neurodiversity brings to families and communities.
                </p>

                <div class="bg-white rounded-xl p-6 shadow-lg transition-all duration-500 hover:shadow-xl">
                    <h3 class="text-2xl font-semibold text-indigo-700 mb-3">Beyond the Diagnosis</h3>
                    <p class="text-xl">
                        Autism isn't a condition to be cured—it's a different way of experiencing the world.
                        Our autistic child has taught us that neurodiversity enriches society through:
                    </p>
                    <ul class="list-disc pl-6 mt-3 space-y-2 text-xl">
                        <li class="transition-transform duration-300 hover:translate-x-1">Unique perspectives on
                            problem-solving</li>
                        <li class="transition-transform duration-300 hover:translate-x-1">Extraordinary attention to
                            detail</li>
                        <li class="transition-transform duration-300 hover:translate-x-1">Authentic expressions of
                            emotion</li>
                        <li class="transition-transform duration-300 hover:translate-x-1">Deeply focused passions and
                            interests</li>
                    </ul>
                </div>

                <div class="mt-8 animate-slide-in-right">
                    <h3 class="text-2xl font-semibold text-indigo-700 mb-3">Our Holistic Approach</h3>
                    <p class="text-xl">
                        Through our journey, we've developed comprehensive healthcare strategies that honor the
                        whole individual:
                    </p>

                    <div class="grid md:grid-cols-2 gap-6 mt-6">
                        <div
                            class="bg-blue-50 border-l-4 border-indigo-500 p-4 transition-all duration-300 hover:bg-blue-100">
                            <h4 class="font-bold text-lg">Early Intervention Programs</h4>
                            <p>Evidence-based therapies tailored to developmental stages</p>
                        </div>
                        <div
                            class="bg-blue-50 border-l-4 border-indigo-500 p-4 transition-all duration-300 hover:bg-blue-100">
                            <h4 class="font-bold text-lg">Family Support Systems</h4>
                            <p>Counseling and resources for parents and siblings</p>
                        </div>
                        <div
                            class="bg-blue-50 border-l-4 border-indigo-500 p-4 transition-all duration-300 hover:bg-blue-100">
                            <h4 class="font-bold text-lg">Sensory Integration</h4>
                            <p>Creating environments that respect sensory needs</p>
                        </div>
                        <div
                            class="bg-blue-50 border-l-4 border-indigo-500 p-4 transition-all duration-300 hover:bg-blue-100">
                            <h4 class="font-bold text-lg">Transition Planning</h4>
                            <p>Life skills development for adolescence and adulthood</p>
                        </div>
                    </div>
                </div>

                <div class="mt-10 animate-fade-in">
                    <h3 class="text-2xl font-semibold text-indigo-700 mb-3">Changing the Narrative</h3>
                    <p class="text-xl">
                        We advocate for a paradigm shift from awareness to acceptance to appreciation.
                        The autistic community doesn't need fixing—it needs understanding accommodations,
                        educational adaptations, and workplaces that value neurodiversity as a strength.
                    </p>
                    <p class="mt-4 italic border-l-4 border-blue-300 pl-4 py-2 bg-blue-50">
                        "When you've met one person with autism, you've met one person with autism."
                        <span class="block text-right font-medium mt-2">- Dr. Stephen Shore</span>
                    </p>
                </div>

                <div class="mt-12">
                    <h3 class="text-2xl font-semibold text-center text-blue-800 mb-6">
                        Recommended Autism Resources
                    </h3>
                    <div class="flex flex-wrap justify-center gap-4">
                        <a href="https://autisticadvocacy.org"
                            class="px-5 py-3 bg-white text-indigo-700 rounded-lg shadow-md transition-all duration-300 hover:bg-indigo-700 hover:text-white hover:shadow-lg hover:-translate-y-1">
                            Autistic Self Advocacy Network
                        </a>
                        <a href="https://researchautism.org"
                            class="px-5 py-3 bg-white text-indigo-700 rounded-lg shadow-md transition-all duration-300 hover:bg-indigo-700 hover:text-white hover:shadow-lg hover:-translate-y-1">
                            Organization for Autism Research
                        </a>
                        <a href="https://autismspeaks.org"
                            class="px-5 py-3 bg-white text-indigo-700 rounded-lg shadow-md transition-all duration-300 hover:bg-indigo-700 hover:text-white hover:shadow-lg hover:-translate-y-1">
                            Autism Speaks Resource Guide
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
    .animate-fade-in {
        animation: fadeIn 1.2s ease-out;
    }

    .animate-slide-in-left {
        animation: slideInLeft 1s ease-out;
    }

    .animate-slide-in-right {
        animation: slideInRight 1s ease-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes slideInLeft {
        from {
            transform: translateX(-30px);
            opacity: 0;
        }

        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideInRight {
        from {
            transform: translateX(30px);
            opacity: 0;
        }

        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
</style>
@endpush