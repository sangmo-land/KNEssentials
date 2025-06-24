<!-- Load YouTube Iframe API -->
<script src="https://www.youtube.com/iframe_api"></script>

<div x-data="videoCarousel({ trackCount: {{ count($tracks) }} })" x-init="initPlayers()"
    x-on:touchstart="handleTouchStart($event)" x-on:touchend="handleTouchEnd($event)"
    class="flex flex-col items-center justify-center bg-gray-800 w-full max-w-full overflow-hidden">

    <!-- Main Video Section -->
    <div class="relative w-full aspect-video px-2 py-4 sm:px-4 sm:py-6 max-w-full sm:max-w-6xl">
        @foreach($tracks as $index => $track)
        <div x-show="currentIndex === {{ $index }}" x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="absolute inset-0 flex flex-col">
            <div class="flex-1 relative rounded-xl overflow-hidden shadow-lg ring-2 ring-green-400/20">
                <iframe width="100%" height="100%"
                    src="https://www.youtube.com/embed/{{ $track->youtube_id }}?modestbranding=1&rel=0&enablejsapi=1"
                    id="video-{{ $index }}" title="{{ $track->title }} video" class="absolute inset-0 w-full h-full"
                    frameborder="0"
                    allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen @load="registerPlayer({{ $index }})">
                </iframe>
            </div>

            <!-- Track Info -->
            <div class="mt-4 text-white flex justify-between items-center">
                <h2 class="text-xl md:text-2xl font-semibold">{{ $track->title }}</h2>
                @auth
                @if(Auth::user()->is_admin)
                <div class="flex space-x-3">
                    <a href="{{ route('tracks.edit', $track) }}"
                        class="text-blue-400 hover:text-blue-300 transition">Edit</a>
                    <form method="POST" action="{{ route('tracks.destroy', $track) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-400 hover:text-red-300 transition"
                            onclick="return confirm('Delete this track?')">Delete</button>
                    </form>
                </div>
                @endif
                @endauth
            </div>
        </div>
        @endforeach
    </div>

    
    <!-- Collapse toggle on mobile -->
    <div class="md:hidden w-full max-w-full sm:max-w-6xl px-2 sm:px-4 mt-2">
        <button @click="thumbnailsOpen = !thumbnailsOpen" class="text-sm text-gold-400 underline">
            <span x-text="thumbnailsOpen ? 'Hide Thumbnails' : 'Show Thumbnails'"></span>
        </button>
    </div>


    <!-- Thumbnail Carousel -->
    <div class="w-full max-w-full sm:max-w-6xl px-2 sm:px-4 py-2 sm:py-4 transition-all duration-300"
        x-show="thumbnailsOpen || window.innerWidth >= 768" x-transition>
        <div class="flex items-center justify-between mb-2 md:flex-row flex-col md:space-y-0 space-y-2">
            <h3 class="text-xl font-semibold text-gold-600">More Recordings</h3>
            <div class="flex space-x-3 md:space-x-3 md:flex-row flex-col md:space-y-0 space-y-2">
                <button @click="prev()" class="text-gold-500 hover:text-gold-300 p-1 flex items-center space-x-1">
                    <svg class="w-6 h-6 transform md:rotate-0 rotate-90" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span class="md:hidden text-sm">Up</span>
                </button>
                <button @click="next()" class="text-gold-500 hover:text-gold-300 p-1 flex items-center space-x-1">
                    <svg class="w-6 h-6 transform md:rotate-0 rotate-90" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="md:hidden text-sm">Down</span>
                </button>
            </div>
        </div>

        <!-- Thumbnails -->
        <div class="relative w-full overflow-hidden">
            <div class="flex overflow-x-auto no-scrollbar md:overflow-visible md:flex-row flex-nowrap"
                :style="window.innerWidth >= 768 ? 'transform: translateX(-' + scrollIndex * 208 + 'px)' : ''">
                @foreach($tracks as $index => $track)
                <div x-ref="thumb{{ $index }}"
                    class="flex-shrink-0 md:w-48 md:mr-4 w-full md:mb-0 mb-2 cursor-pointer rounded-lg bg-gray-900 p-2"
                    :class="currentIndex === {{ $index }} ? 'ring-2 ring-gold-500 scale-105' : 'ring-1 ring-gray-700 hover:ring-gold-400'"
                    @click="goTo({{ $index }})">
                    <div class="relative aspect-video rounded overflow-hidden mb-2">
                        <img src="https://img.youtube.com/vi/{{ $track->youtube_id }}/mqdefault.jpg"
                            alt="{{ $track->title }} thumbnail" class="h-full w-full object-cover">
                        <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
                            <svg class="w-8 h-8 text-white opacity-90" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <h4 class="text-sm font-medium text-white truncate">{{ $track->title }}</h4>
                    <p class="text-xs text-gray-400 truncate">{{ $track->artist->name }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Hide scrollbars utility -->
<style>
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>

<!-- Alpine Video Carousel Script -->
<script>
    function videoCarousel({ trackCount }) {
    return {
        currentIndex: 0,
        scrollIndex: 0,
        trackCount,
        players: {},
        thumbnailsOpen: false,
        touchStartX: 0,
        touchEndX: 0,

        next() {
            if (this.scrollIndex < this.trackCount - 1) this.scrollIndex++;
        },
        prev() {
            if (this.scrollIndex > 0) this.scrollIndex--;
        },
        goTo(index) {
            this.stopCurrentVideo();
            this.currentIndex = index;
        },
        stopCurrentVideo() {
            const player = this.players[this.currentIndex];
            if (player && typeof player.pauseVideo === 'function') {
                player.pauseVideo();
            }
        },
        registerPlayer(index) {
            const iframe = document.getElementById(`video-${index}`);
            if (iframe && !this.players[index]) {
                this.players[index] = new YT.Player(iframe);
            }
        },
        initPlayers() {
            if (window.YT && YT.Player) {
                for (let i = 0; i < this.trackCount; i++) {
                    this.registerPlayer(i);
                }
            } else {
                window.onYouTubeIframeAPIReady = () => {
                    for (let i = 0; i < this.trackCount; i++) {
                        this.registerPlayer(i);
                    }
                }
            }
        },
        handleTouchStart(e) {
            this.touchStartX = e.changedTouches[0].screenX;
        },
        handleTouchEnd(e) {
            this.touchEndX = e.changedTouches[0].screenX;
            this.handleSwipe();
        },
        handleSwipe() {
            const diff = this.touchStartX - this.touchEndX;
            if (Math.abs(diff) > 50) {
                if (diff > 0) {
                    this.goTo((this.currentIndex + 1) % this.trackCount);
                } else {
                    this.goTo((this.currentIndex - 1 + this.trackCount) % this.trackCount);
                }
            }
        }
    }
}
</script>