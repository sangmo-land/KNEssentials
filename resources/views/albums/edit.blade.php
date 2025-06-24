<x-main>
<div class="container mx-auto px-4 py-8 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-bold mb-6">{{ isset($album) ? 'Edit' : 'Create' }} Album</h1>

    <form action="{{ isset($album) ? route('albums.update', $album) : route('albums.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @isset($album) @method('PUT') @endisset

        <div class="bg-white rounded-lg shadow-md p-6 space-y-6">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Album Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $album->title ?? '') }}"
                    class="text-black mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error('title')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <div>
                <label for="artist_id" class="block text-sm font-medium text-gray-700">Artist</label>
                <select name="artist_id" id="artist_id"
                    class="text-black mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @foreach($artists as $artist)
                    <option value="{{ $artist->id }}" {{ old('artist_id', $album->artist_id ?? '') == $artist->id ?
                        'selected' : '' }}>
                        {{ $artist->first_name }} {{ $artist->last_name }}
                    </option>
                    @endforeach
                </select>
                @error('artist_id')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label for="release_date" class="block text-sm font-medium text-gray-700">Release Date</label>
                    <input type="date" name="release_date" id="release_date"
                    value="{{ old('release_date', isset($album) ? \Carbon\Carbon::parse($album->release_date)->format('M d, Y') : '') }}"
                        class="text-black mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @error('release_date')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                
            </div>

            <div>
                <label for="cover_art" class="block text-sm font-medium text-gray-700">Cover Art</label>
                <input type="file" name="cover_art" id="cover_art"
                    class="text-black mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error('cover_art')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                @if(isset($album) && $album->cover_art)
                <div class="mt-2">
                    <span class="text-sm text-gray-500">Current cover art:</span>
                    <img src="{{ asset('storage/' . $album->cover_art) }}" class="h-20 w-20 object-cover rounded mt-1"
                        alt="Current cover art">
                </div>
                @endif
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600">
                    {{ isset($album) ? 'Update' : 'Create' }} Album
                </button>
            </div>
        </div>
    </form>
</div>
</x-main>