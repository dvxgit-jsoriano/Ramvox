<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <span class="text-2xl">Users:</span>
                    <ul class="py-4">
                        @php
                        $users=App\Models\User::all();
                        @endphp
                        {{-- @foreach ($users as $user)
                        <li>
                            <a href="{{ route('download', $user->id) }}" class="py-2 font-bold text-blue-800 hover:text-blue-500">{{ $user->name ?: '' }} </a>
                            <input id="fileupload" type="file" name="files[]" data-url="server/php/" multiple>
                            @foreach ($user->downloads as $download)
                        <li><a href="{{ route('download', $download->id) }}" class="py-2 font-bold text-blue-800 hover:text-blue-500">{{ $download->name ?: '' }} </a> - {{ $download->desc }}</li>
                        @endforeach
                        </li>
                        @endforeach --}}
                    </ul>

                    <table class="table-auto w-full">
                        <thead>
                            <tr class="bg-green-800 text-white">
                                <th>Username</th>
                                <th>Name</th>
                                <th>Email Address</th>
                                <th>Download List(s)</th>
                                <th>Action(s)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <ul class="list-disc">
                                        @foreach ($user->downloads as $download)
                                        <li>{{ $download->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td><a href="{{ route('download', $user->id) }}">Manage Downloads</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                   {{--  {{ $users->links() }} --}} <!-- This will display paginator if records exceeds paging size -->

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
