
<x-app-layout>
    <x-slot name="header">

    </x-slot>
<div class="max-w-lg mx-auto p-6 bg-white rounded shadow ">
    <h2 class="text-xl font-bold mb-4 center">Create Category</h2>


    {{-- Show success message --}}
@if (session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
        {{ session('success') }}
    </div>
@endif


    {{-- Show validation errors --}}
    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

   
    <form action="{{ route('diarys.update', $diary->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Title --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium">Title</label>
            <input type="text" name="title" class="w-full border rounded px-3 py-2"
                   value="{{ old('title', $diary->title) }}" required>
        </div>

        {{-- Content --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium">Content</label>
            <textarea name="content" rows="5" class="w-full border rounded px-3 py-2"
                      required>{{ old('content', $diary->content) }}</textarea>
        </div>

        {{-- Entry Date --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium">Entry Date</label>
            <input type="date" name="entry_date" class="w-full border rounded px-3 py-2"
                   value="{{ old('entry_date', $diary->date) }}" required>
        </div>

        {{-- Category --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium">Category</label>
            <select name="category_id" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ (string)old('category_id', $diary->category_id) === (string)$category->id ? 'selected':'' }}>
                        {{ $category->name }} (ID: {{ $category->id }})
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Tag --}}
        <div class="mb-6">
            <label class="block mb-1 font-medium">Tag</label>
            <select name="tag_id" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Select Tag --</option>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}"
                        {{ (string)old('tag_id', $diary->tag_id) === (string)$tag->id ? 'selected':'' }}>
                        {{ $tag->name }} (ID: {{ $tag->id }})
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Update
        </button>
    </form>

</div>

</x-app-layout>


























