<x-main>
    <section class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 text-black">
                        <!-- Added text-black here -->
                        <div class="mb-4">
                            <h3 class="text-lg font-semibold text-black">{{ $category->name }}</h3>
                            <p class="text-sm text-black mt-2">Created at:
                                {{ $category->created_at->format('m/d/Y H:i') }}</p>
                        </div>

                        <div class="flex items-center">
                            <a href="{{ route('categories.edit', $category->id) }}"
                                class="bg-indigo-500 hover:bg-indigo-700 text-black font-bold py-2 px-4 rounded mr-2">Edit</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4 rounded">Delete</button>
                            </form>
                        </div>

                        <div class="mt-6">
                            <a href="{{ route('categories.index') }}" class="text-black hover:text-black-900">Back to
                                Categories</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-main>