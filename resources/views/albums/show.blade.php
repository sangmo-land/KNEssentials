<x-main>
    <div class="container mx-auto px-4 py-8 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex flex-col sm:flex-row gap-6 items-start mb-6">
                <!-- Album Cover Art Section -->
                <div class="w-full sm:w-48 flex-shrink-0">
                    <img src="{{ asset('storage/' . $album->cover_art) }}" alt="{{ $album->title }} Cover Art"
                        class="w-full h-48 object-cover rounded-lg shadow-md border border-gray-200">
                </div>

                <!-- Title and Actions Section -->
                <div class="flex-1 w-full">
                    <div class="flex justify-between items-start">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-800">{{ $album->title }}</h1>
                            <div class="mt-2 text-gray-600">
                                <span class="font-medium">Album</span> •
                                <span>{{ $album->genre }}</span>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('albums.edit', $album) }}"
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</a>
                            <form action="{{ route('albums.destroy', $album) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
                                    onclick="return confirm('Are you sure you want to delete this album?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Artist Info -->
                    <div class="mt-4">
                        <p class="text-gray-600">
                            <span class="font-medium">Artist:</span>
                            <a href="{{ route('artists.show', $album->artist) }}" class="text-blue-500 hover:underline">
                                {{ $album->artist->first_name }} {{ $album->artist->last_name }}
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Album Details -->
            <div class="border-t border-gray-200 pt-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-gray-600">
                            <span class="font-medium">Release Date:</span>
                            {{ \Carbon\Carbon::parse($album->release_date)->format('M d, Y') }}
                        </p>
                    </div>
                    <div>
                        <p class="text-gray-600">
                            <span class="font-medium">Total Tracks:</span>
                            {{ $album->tracks_count }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tracks Listing -->
            <div class="border-t border-gray-200 pt-6 mt-6">
                <h2 class="text-xl font-semibold mb-4">Tracks</h2>
                <div class="space-y-4">
                    @foreach($album->tracks as $track)
                    <div
                        class="flex justify-between items-center p-3 bg-gray-50 rounded hover:bg-gray-100 transition-colors">
                        <div>
                            <span class="font-medium text-black">{{ $track->title }}</span>
                            <span class="text-gray-500 ml-2">({{ gmdate('i:s', $track->duration) }})</span>
                        </div>
                        <span class="text-gray-500">Track {{ $track->track_number }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </x-main>