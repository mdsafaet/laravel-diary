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

    {{-- Form --}}
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
            <input type="text" id="name" name="name"
                   value="{{ old('name') }}"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                   placeholder="Enter category name">
        </div>

        <button type="submit"
                class="px-4 py-2 bg-green-600 text-black rounded hover:bg-green-700">
            Save
        </button>
         <a href="{{ route('categories.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">Back</a>
    </form>
</div>

</x-app-layout>