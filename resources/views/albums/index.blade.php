@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Track List</h1>
        <a href="{{ route('tracks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Add New Track
        </a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Track</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Artist</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Album</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Duration</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($tracks as $track)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $track->track_number }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $track->title }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $track->album && $track->album->artist ? $track->album->artist->first_name : 'N/A' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($track->album)
                        <a href="{{ route('albums.show', $track->album) }}" class="text-blue-500 hover:underline">
                            {{ $track->album->title }}
                        </a>
                        @else
                        <span class="text-gray-500 italic">No album</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ gmdate('i:s', $track->duration) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap flex gap-2">
                        <a href="{{ route('tracks.edit', $track) }}"
                            class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <form action="{{ route('tracks.destroy', $track) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $tracks->links() }}
    </div>
</div>
@endsection