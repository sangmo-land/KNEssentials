@php
$type = $type ?? 'default';
$logoColor = $type === 'footer' ? 'white' : 'black';
$hoverColor = $type === 'footer' ? 'white' : 'gray-900';
@endphp

<a href="#" @class(['group inline-flex items-center transition-transform hover:scale-105', '-ml-8'=> $type ===
    'footer'])>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" class="h-16 w-16 relative">
        <!-- Gradient definition -->
        <defs>
            <linearGradient id="logoGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" style="stop-color:#4F46E5; stop-opacity:1" />
                <stop offset="100%" style="stop-color:#EC4899; stop-opacity:1" />
            </linearGradient>
        </defs>
    
        <!-- Animated circle -->
        <circle cx="50" cy="50" r="48" stroke="url(#logoGradient)" stroke-width="3" fill="none"
            class="transition-all duration-300 group-hover:stroke-[2.5]" style="stroke-dasharray: 300; stroke-dashoffset: 1000;
                           animation: draw 2s linear forwards, spin 20s linear infinite reverse;
                           transform-origin: center;" />
    
        <!-- Inner text with shadow -->
        <text x="50%" y="50%" text-anchor="middle" dy=".3em" style="font-size: 42px;
                     fill: {{ $logoColor }};
                     filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
                     font-weight: 700;
                     letter-spacing: -0.05em;">
            KN
        </text>
    </svg>    

    <!-- Text logo with gradient -->
    <span class="ml-3 text-3xl font-extrabold bg-gradient-to-r from-indigo-600 to-pink-500 bg-clip-text text-transparent
                 transition-all group-hover:tracking-wide">
        Essentials
    </span>
</a>

@push('styles')
<style>
    @keyframes draw {
        to {
            stroke-dashoffset: 0;
        }
    }

    @keyframes spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }
</style>
@endpush