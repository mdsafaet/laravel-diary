<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div>
        <h3 class="font-semibold text-lg text-gray-800">All Diaries</h3>
        <ul class="list-disc pl-5">
                <div class="mt-4">
            <a href="{{ route('diarys.create') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                + Add Diary
            </a>
        </div>

        <div class="mt-4">
            <a href="{{ route('diarys.show', auth()->user()->id) }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                View Your Diaries
            </a>
        </div>
    </div>



</x-app-layout>
