<x-main>

    <div class="container mx-auto px-4 py-8 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Track List</h1>
            <a href="{{ route('tracks.create') }}" class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600">
                Add New Track
            </a>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <!-- Mobile Card View -->
            <div class="sm:hidden">
                <div class="px-4 py-2 space-y-4">
                    @foreach($tracks as $track)
                    <div class="border rounded-lg p-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <div class="font-medium text-gray-900">{{ $track->title }}</div>
                                <div class="text-sm text-gray-600">{{ $track->track_number }} ·
                                    {{ gmdate('i:s', $track->duration) }}</div>
                            </div>
                            <div class="flex space-x-2">
                                <a href="{{ route('tracks.edit', $track) }}"
                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <form action="{{ route('tracks.destroy', $track) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </div>
                        </div>
                        <div class="mt-2 text-sm">
                            @if($track->album)
                            <div class="text-gray-700">
                                Album: <a href="{{ route('albums.show', $track->album) }}"
                                    class="text-blue-600 hover:underline">{{ $track->album->title }}</a>
                            </div>
                            @else
                            <span class="text-gray-500 italic">No album</span>
                            @endif
                            
                            <div class="text-gray-700">
                                Artist:
                                {{  $track->artist->first_name  }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Desktop Table View -->
            <div class="hidden sm:block overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">#</th>
                            <th class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Track
                            </th>
                            <th class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Artist
                            </th>
                            <th class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Album
                            </th>
                            <th class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Duration
                            </th>
                            <th class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($tracks as $track)
                        <tr>
                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-gray-900">{{ $track->track_number }}
                            </td>
                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-gray-900">{{ $track->title }}</td>
                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-gray-700">
                                {{  $track->artist->first_name }}
                            </td>
                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-gray-700">
                                @if($track->album)
                                <a href="{{ route('albums.show', $track->album) }}"
                                    class="text-blue-600 hover:underline">
                                    {{ $track->album->title }}
                                </a>
                                @else
                                <span class="text-gray-500 italic">No album</span>
                                @endif
                            </td>
                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-gray-700">
                                {{ gmdate('i:s', $track->duration) }}</td>
                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap">
                                <div class="flex flex-col sm:flex-row gap-2">
                                    <a href="{{ route('tracks.edit', $track) }}"
                                        class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="{{ route('tracks.destroy', $track) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-4">
            {{ $tracks->links() }}
        </div>
    </div>

    </x-main>