<x-main>
    <div class="container mx-auto px-4 py-8 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold mb-6 text-gray-900">{{ isset($track) ? 'Edit' : 'Create' }} Track</h1>

        <form action="{{ isset($track) ? route('tracks.update', $track) : route('tracks.store') }}" method="POST">
            @csrf
            @isset($track) @method('PUT') @endisset

            <div class="bg-white rounded-lg shadow-md p-6 space-y-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Track Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $track->title ?? '') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-gray-900">
                    @error('title')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                <!-- Add YouTube ID Field Here -->
                <div>
                    <label for="youtube_id" class="block text-sm font-medium text-gray-700">YouTube Video ID</label>
                    <input type="text" name="youtube_id" id="youtube_id"
                        value="{{ old('youtube_id', $track->youtube_id ?? '') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-gray-900"
                        placeholder="Enter YouTube video ID (e.g., dQw4w9WgXcQ)">
                    @error('youtube_id')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                    <p class="mt-1 text-sm text-gray-500">Only the video ID from YouTube URL (the part after v=)</p>
                </div>

                <div>
                    <label for="album_id" class="block text-sm font-medium text-gray-700">Album</label>
                    <select name="album_id" id="album_id"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-gray-900">
                        <option value="" {{ is_null(old('album_id', $track->album_id ?? null)) ? 'selected' : '' }}>
                            No Album
                        </option>
                        @foreach($albums as $album)
                        <option value="{{ $album->id }}" {{ old('album_id', $track->album_id ?? '') == $album->id ?
                            'selected' : '' }}>
                            {{ $album->artist->name }} - {{ $album->title }}
                        </option>
                        @endforeach
                    </select>
                    @error('album_id')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="track_number" class="block text-sm font-medium text-gray-700">Track Number</label>
                        <input type="number" name="track_number" id="track_number"
                            value="{{ old('track_number', $track->track_number ?? '') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-gray-900">
                        @error('track_number')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                    </div>

                    <div>
                        <label for="duration" class="block text-sm font-medium text-gray-700">Duration (seconds)</label>
                        <input type="number" name="duration" id="duration"
                            value="{{ old('duration', $track->duration ?? '') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-gray-900">
                        @error('duration')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-indigo-500 text-black px-4 py-2 rounded hover:bg-indigo-600">
                        {{ isset($track) ? 'Update' : 'Create' }} Track
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-main>