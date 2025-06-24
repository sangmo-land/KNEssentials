@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">{{ $track->title }}</h1>
                <div class="mt-2 text-gray-600">
                    <span class="font-medium">Track {{ $track->track_number }}</span> •
                    <span>{{ gmdate('i:s', $track->duration) }}</span>
                </div>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('tracks.edit', $track) }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</a>
                <form action="{{ route('tracks.destroy', $track) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
                        onclick="return confirm('Are you sure you want to delete this track?')">
                        Delete
                    </button>
                </form>
            </div>
        </div>

        <div class="border-t border-gray-200 pt-6">
            <h2 class="text-xl font-semibold mb-4">Album Information</h2>
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <p class="text-gray-600"><span class="font-medium">Album:</span>
                        <a href="{{ route('albums.show', $track->album) }}" class="text-blue-500 hover:underline">
                            {{ $track->album->title }}
                        </a>
                    </p>
                    <p class="text-gray-600"><span class="font-medium">Artist:</span>
                        <a href="{{ route('artists.show', $track->album->artist) }}"
                            class="text-blue-500 hover:underline">
                            {{ $track->album->artist->name }}
                        </a>
                    </p>
                </div>
                <div>
                    <p class="text-gray-600">
                        <span class="font-medium">Release Date:</span>
                        {{ $track->album->release_date->format('M d, Y') }}
                    </p>
                    <p class="text-gray-600">
                        <span class="font-medium">Total Tracks:</span>
                        {{ $track->album->tracks_count }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection