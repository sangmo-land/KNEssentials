@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-white mb-8">Music Library</h1>

    <div class="space-y-6">
        @foreach($tracks as $track)
        <div class="bg-gray-800 rounded-lg p-6 hover:bg-gray-700 transition-colors duration-200">
            <div class="flex items-center gap-6">
                <!-- Thumbnail -->
                <img src="{{ $track->album->cover_art }}" alt="{{ $track->album->title }} cover"
                    class="w-24 h-24 rounded-lg object-cover shadow-lg">

                <!-- Track Info -->
                <div class="flex-1">
                    <div class="flex items-center gap-4 mb-2">
                        <h2 class="text-2xl font-semibold text-white">{{ $track->title }}</h2>
                        <span class="text-gray-400">{{ gmdate('i:s', $track->duration) }}</span>
                    </div>

                    <div class="text-gray-300 space-y-1">
                        <p>
                            <span class="font-medium">{{ $track->album->artist->name }}</span>
                            • {{ $track->album->title }}
                        </p>
                        <p class="text-sm">
                            Track {{ $track->track_number }} •
                            Released {{ $track->album->release_date->format('M d, Y') }} •
                            {{ $track->album->genre ?? 'Various' }}
                        </p>
                    </div>
                </div>

                <!-- Play Button -->
                <button class="p-3 rounded-full bg-green-500 hover:bg-green-400 transition-colors">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8 5v14l11-7z" />
                    </svg>
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection