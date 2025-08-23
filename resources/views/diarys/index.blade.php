<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Diaries
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto p-6 bg-white rounded shadow mt-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold">Diary List</h2>
            <a href="{{ route('diarys.create') }}" 
               class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                + Add Diary
            </a>
        </div>

        {{-- Success message --}}
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full border border-gray-200 rounded">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2 text-left">ID</th>
                    <th class="border px-4 py-2 text-left">Title</th>
                    <th class="border px-4 py-2 text-left">Content</th>
                    <th class="border px-4 py-2 text-left">Date</th>
                    <th class="border px-4 py-2 text-left">Category</th>
                    <th class="border px-4 py-2 text-left">Tag</th>
                    <th class="border px-4 py-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($diaries as $diary)
                    <tr>
                        <td class="border px-4 py-2">{{ $diary->id }}</td>
                        <td class="border px-4 py-2">{{ $diary->title }}</td>
                        <td class="border px-4 py-2 truncate max-w-xs">
                            {{ $diary->content }}
                        </td>
                        <td class="border px-4 py-2">
                           {{ $diary->date }}
                        </td>
                        <td class="border px-4 py-2">
                            {{ $diary->category?->name ?? 'N/A' }}
                        </td>
                        <td class="border px-4 py-2">
                            {{ $diary->tag?->name ?? 'N/A' }}
                        </td>
                        <td class="border px-4 py-2 text-center">
                            <a href="{{ route('diarys.edit', $diary->id) }}" 
                               class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">
                                Edit
                            </a>
                            <form action="{{ route('diarys.destroy', $diary->id) }}" 
                                  method="POST" 
                                  class="inline-block"
                                  onsubmit="return confirm('Are you sure you want to delete this diary?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="border px-4 py-2 text-center text-gray-500">
                            No diaries found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
