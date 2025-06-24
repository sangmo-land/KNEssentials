@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Create New Track</h1>

    <form action="{{ route('tracks.store') }}" method="POST">
        @csrf

        <div class="bg-white rounded-lg shadow-md p-6 space-y-6">
            <!-- Track Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Track Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error('title')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Album Selection -->
            <div>
                <label for="album_id" class="block text-sm font-medium text-gray-700">Album</label>
                <select name="album_id" id="album_id"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Select an Album</option>
                    @foreach($albums as $album)
                    <option value="{{ $album->id }}" {{ old('album_id')==$album->id ? 'selected' : '' }}>
                        {{ $album->artist->name }} - {{ $album->title }}
                    </option>
                    @endforeach
                </select>
                @error('album_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Track Details -->
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label for="track_number" class="block text-sm font-medium text-gray-700">Track Number</label>
                    <input type="number" name="track_number" id="track_number" value="{{ old('track_number') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @error('track_number')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="duration" class="block text-sm font-medium text-gray-700">Duration (seconds)</label>
                    <input type="number" name="duration" id="duration" value="{{ old('duration') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @error('duration')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600">
                    Create Track
                </button>
            </div>
        </div>
    </form>
</div>
@endsection