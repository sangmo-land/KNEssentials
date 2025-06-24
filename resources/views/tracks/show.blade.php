<x-main>


<div class="container mx-auto px-4 py-8 sm:px-6 lg:px-8">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">{{ $track->title }}</h1> <!-- Changed to text-gray-900 -->
                <div class="mt-2 text-gray-800">
                    <!-- Changed to text-gray-800 -->
                    <span class="font-medium">Track {{ $track->track_number }}</span> •
                    <span>{{ gmdate('i:s', $track->duration) }}</span>
                </div>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('tracks.edit', $track) }}"
                    class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600">Edit</a>
                <!-- Changed to text-black -->
                <form action="{{ route('tracks.destroy', $track) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-black px-4 py-2 rounded hover:bg-red-600"
                        onclick="return confirm('Are you sure you want to delete this track?')">
                        Delete
                    </button>
                </form>
            </div>
        </div>

        <div class="border-t border-gray-200 pt-6">
            <h2 class="text-xl font-semibold mb-4 text-gray-900">Album Information</h2>
            <!-- Changed to text-gray-900 -->
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <p class="text-gray-800"><span class="font-medium">Album:</span> <!-- Changed to text-gray-800 -->
                        @if ($track->album)
                        <a href="{{ route('albums.show', $track->album) }}" class="text-blue-600 hover:underline">
                            <!-- Darkened to text-blue-600 -->
                            {{ $track->album->title }}
                        </a>
                        @endif
                    </p>
                    <p class="text-gray-800"><span class="font-medium">Artist:</span> <!-- Changed to text-gray-800 -->
                        @if ($track->album)
                        <a href="{{ route('artists.show', $track->album->artist) }}"
                            class="text-blue-600 hover:underline text-black">
                            <!-- Darkened to text-blue-600 -->
                            {{ $track->album->artist->first_name }} {{ $track->album->artist->last_name }}
                        </a>
                        @else
                            @if($defaultArtist)
                            <a href="{{ route('artists.show', $defaultArtist) }}" class="text-blue-600 hover:underline text-black">
                                {{ $defaultArtist->first_name }} {{ $defaultArtist->last_name }}
                            </a>
                            @else
                            <span class="text-gray-500">No artist found</span>
                            @endif
                        @endif
                    </p>
                </div>
                <div>
                    <p class="text-gray-800">
                        <!-- Changed to text-gray-800 -->
                        <span class="font-medium">Release Date:</span>
                       @if ($track->album)
                        {{ \Carbon\Carbon::parse($track->album->release_date)->format('M d, Y') }}              
                        @endif
                    </p>
                    <p class="text-gray-800">
                        <!-- Changed to text-gray-800 -->
                        <span class="font-medium">Total Tracks:</span>
                        @if ($track->album)
                        {{ $track->album->tracks_count }}
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</x-main>