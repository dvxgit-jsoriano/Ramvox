<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <span class="text-2xl">File Downloads:</span>
                    <ul class="py-4">
                        @php
                            $user=App\Models\User::find(Auth::id());
                        @endphp
                        @foreach ($user->downloads as $download)
                            <li><a href="{{ route('download', $download->id) }}" class="py-2 font-bold text-blue-800 hover:text-blue-500">{{ $download->name ?: '' }} </a> - {{ $download->desc }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
