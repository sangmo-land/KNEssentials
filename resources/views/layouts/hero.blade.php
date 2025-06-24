{{-- resources/views/components/hero.blade.php --}}
@props(['theme', 'category'])

<div class="relative overflow-hidden">
    <div class="absolute inset-0 z-0">
        <!-- Animated floating elements -->
        <div
            class="absolute top-20 left-1/4 w-16 h-16 bg-pink-300/30 rounded-full mix-blend-multiply filter blur-xl animate-float">
        </div>
        <div
            class="absolute top-40 right-1/3 w-24 h-24 bg-purple-300/30 rounded-full mix-blend-multiply filter blur-xl animate-float animation-delay-2000">
        </div>
        <div
            class="absolute bottom-20 left-1/3 w-20 h-20 bg-rose-200/30 rounded-full mix-blend-multiply filter blur-xl animate-float animation-delay-4000">
        </div>
    </div>

    <section class="relative h-[500px] {{ $theme['bg_color'] }} overflow-hidden">
        <!-- Background image with parallax effect -->
        <div class="absolute inset-0 z-0 overflow-hidden" x-data="{ mouseX: 0, mouseY: 0 }" @mousemove="mouseX = ($event.clientX / window.innerWidth - 0.5) * 20; 
                        mouseY = ($event.clientY / window.innerHeight - 0.5) * 20;"
            :style="`transform: translate(${mouseX}px, ${mouseY}px)`">
            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}"
                class="w-full h-full object-cover object-top transform scale-110">
            <div class="absolute inset-0 bg-gradient-to-r from-black/30 via-transparent to-black/30"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
        </div>

        <!-- Glitter effect overlay -->
        <div
            class="absolute inset-0 z-10 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPgogIDxkZWZzPgogICAgPHBhdHRlcm4gaWQ9InBhdHRlcm4iIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAiIGhlaWdodD0iMTAwIj4KICAgICAgPHJlY3QgZmlsbD0ibm9uZSIgc3Ryb2tlPSJyZ2JhKDI1NSwyNTUsMjU1LDAuMDUpIiBzdHJva2Utd2lkdGg9IjAuNSIgeD0iMCIgeT0iMCIgd2lkdGg9IjEwMCIgaGVpZ2h0PSIxMDAiLz4KICAgICAgPHBhdGggZD0iTTAgMEgxMDBWMTAwSDBWMFoiIGZpbGw9Im5vbmUiLz4KICAgICAgPHBhdGggZD0iTTI1LDI1IEw3NSw3NSBNNzUsMjUgTDI1LDc1IiBzdHJva2U9InJnYmEoMjU1LDI1NSwyNTUsMC4xKSIgc3Ryb2tlLXdpZHRoPSIwLjUiLz4KICAgICAgPGNpcmNsZSBjeD0iNTAiIGN5PSI1MCIgcj0iNSIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwwLjA1KSIvPgogICAgPC9wYXR0ZXJuPgogIDwvZGVmcz4KICA8cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI3BhdHRlcm4pIi8+Cjwvc3ZnPg==')]">
        </div>

        <!-- SVG Cutout Overlay -->
        <div class="absolute inset-0 z-5">
            <svg class="w-full h-full" viewBox="0 0 1200 800" preserveAspectRatio="none">
                <defs>
                    <mask id="cutout-mask">
                        <rect width="100%" height="100%" fill="white" />
                        <!-- Cutout shape -->
                        <path d="M0,400 C150,300 350,500 600,350 C850,200 1050,450 1200,350 L1200,800 L0,800 Z"
                            fill="black" />
                    </mask>
                </defs>
                <rect width="100%" height="100%" mask="url(#cutout-mask)" fill="white" fill-opacity="0.1" />
            </svg>
        </div>

        <!-- Content container -->
        <div class="relative z-20 container mx-auto px-4 h-full flex items-center">
            <div class="text-center max-w-3xl mx-auto">
                <!-- Animated icon -->
                <div class="inline-block mb-6 animate-bounce" style="animation-delay: 0.5s">
                    {{ $icon }}
                </div>

                <!-- Animated heading -->
                <h1 class="text-5xl md:text-7xl font-bold mb-6 text-white tracking-tight leading-none"
                    x-data="{ text: '{{ $category->name }}', animatedText: '', index: 0 }" x-init="setTimeout(() => { 
                        let interval = setInterval(() => {
                            if (index < text.length) {
                                animatedText += text.charAt(index);
                                index++;
                            } else {
                                clearInterval(interval);
                            }
                        }, 60);
                    }, 300)">
                    <span class="text-white drop-shadow-lg" x-text="animatedText"></span>
                </h1>

                <!-- Excerpt with fade-in effect -->
                <p class="text-xl md:text-2xl text-white/90 max-w-2xl mx-auto mb-10 leading-relaxed opacity-0 animate-fade-in"
                    style="animation-delay: 1.5s">
                    {{ $category->excerpt }}
                </p>

                <!-- Animated button -->
                <a href="#category-content"
                    class="inline-block bg-gradient-to-r from-pink-600 to-purple-600 text-white font-bold py-4 px-10 rounded-full shadow-lg transform transition-all duration-500 hover:scale-105 hover:shadow-2xl opacity-0 animate-fade-in-up"
                    style="animation-delay: 2s">
                    Explore Collection
                    <span class="ml-2 opacity-0 group-hover:opacity-100 transition-opacity">→</span>
                </a>
            </div>
        </div>

        <!-- Sine Wave Scroll Indicators -->
        <div
            class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-20 flex items-center justify-center space-x-1">
            <div class="w-1.5 h-1.5 bg-white rounded-full animate-scroll-indicator" style="animation-delay: 0ms"></div>
            <div class="w-1.5 h-1.5 bg-white rounded-full animate-scroll-indicator" style="animation-delay: 200ms">
            </div>
            <div class="w-1.5 h-1.5 bg-white rounded-full animate-scroll-indicator" style="animation-delay: 400ms">
            </div>
            <div class="w-1.5 h-1.5 bg-white rounded-full animate-scroll-indicator" style="animation-delay: 600ms">
            </div>
            <div class="w-1.5 h-1.5 bg-white rounded-full animate-scroll-indicator" style="animation-delay: 800ms">
            </div>
        </div>
    </section>
</div>

<style>
    @keyframes float {
        0% {
            transform: translateY(0) rotate(0deg);
        }

        50% {
            transform: translateY(-20px) rotate(5deg);
        }

        100% {
            transform: translateY(0) rotate(0deg);
        }
    }

    .animate-float {
        animation: float 8s ease-in-out infinite;
    }

    .animation-delay-2000 {
        animation-delay: 2s;
    }

    .animation-delay-4000 {
        animation-delay: 4s;
    }

    @keyframes fade-in {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    .animate-fade-in {
        animation: fade-in 1.2s forwards;
    }

    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in-up {
        animation: fade-in-up 1s forwards;
    }

    @keyframes scroll-indicator {
        0% {
            transform: translateY(0);
            opacity: 0.3;
        }

        25% {
            transform: translateY(-8px);
            opacity: 1;
        }

        50% {
            transform: translateY(0);
            opacity: 0.3;
        }

        75% {
            transform: translateY(8px);
            opacity: 0.7;
        }

        100% {
            transform: translateY(0);
            opacity: 0.3;
        }
    }

    .animate-scroll-indicator {
        animation: scroll-indicator 1.5s infinite ease-in-out;
    }

    /* Additional cutout styling */
    .cutout-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 200px;
        background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1200 120' preserveAspectRatio='none'%3E%3Cpath d='M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z' opacity='.25' fill='white'/%3E%3Cpath d='M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z' opacity='.5' fill='white'/%3E%3Cpath d='M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z' fill='white'/%3E%3C/svg%3E");
        background-size: cover;
        background-position: center bottom;
        z-index: 5;
        pointer-events: none;
    }
</style>