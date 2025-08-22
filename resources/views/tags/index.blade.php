<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tags
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto p-6 bg-white rounded shadow mt-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold">Tag List</h2>
            <a href="{{ route('tags.create') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                + Add Tag
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full border border-gray-200 rounded">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2 text-left">ID</th>
                    <th class="border px-4 py-2 text-left">Name</th>
                    <th class="border px-4 py-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tags as $tag)
                    <tr>
                        <td class="border px-4 py-2">{{ $tag->id }}</td>
                        <td class="border px-4 py-2">{{ $tag->name }}</td>
                        <td class="border px-4 py-2 text-center">
                            <a href="" class="px-3 py-1 bg-gray-700 text-white rounded hover:bg-gray-800">View</a>
                            <a href="{{ route('tags.edit', $tag->id) }}" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Edit</a>
                            <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this tag?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="border px-4 py-2 text-center text-gray-500">No tags found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
