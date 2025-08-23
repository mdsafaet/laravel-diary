<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Diary Details
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto p-6 bg-white rounded shadow mt-6">

        <h2 class="text-2xl font-semibold mb-4">{{ $diary->title }}</h2>

        <p class="mb-2">
            <strong>Date:</strong> {{ $diary->date ? \Carbon\Carbon::parse($diary->date)->format('Y-m-d') : 'N/A' }}
        </p>

        <p class="mb-2">
            <strong>Category:</strong> {{ $diary->category?->name ?? 'N/A' }} (ID: {{ $diary->category_id }})
        </p>

        <p class="mb-4">
            <strong>Tag:</strong> {{ $diary->tag?->name ?? 'N/A' }} (ID: {{ $diary->tag_id }})
        </p>

        <div class="mb-6">
            <p class="whitespace-pre-line">{{ $diary->content }}</p>
        </div>

        <div class="flex gap-3">
            <a href="{{ route('diarys.edit', $diary->id) }}"
               class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                Edit
            </a>

            <a href="{{ route('diarys.index') }}"
               class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">
                Back
            </a>


            
        </div>
    </div>
</x-app-layout>
