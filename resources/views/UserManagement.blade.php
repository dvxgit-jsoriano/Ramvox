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
                    {{-- <ul class="py-4"> --}}
                    @php
                    $users = App\Models\User::all();
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
                    {{-- </ul> --}}
                    <a href="{{ url('usermanagement-create') }}" class="bg-green-500 hover:bg-green-700 text-white text-center py-2 px-4 rounded">
                        Add User
                    </a>
                    <div class="flex flex-col text-left mt-4">

                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="divide-y divide-gray-200 table-auto w-full">
                                        <thead class="bg-gray-50">
                                            <tr class="bg-green-800 text-white">
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                    Username
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                    Name
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                    Email Address
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                    Download List(s)
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                    Action(s)
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($users as $user)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $user->username }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $user->name }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $user->email }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-500">
                                                        <ul class="list-disc">
                                                            @foreach ($user->downloads as $download)
                                                            <li>{{ $download->name }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="px-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                        <a href="{{ route('downloads', $user->id) }}">Manage
                                                            Downloads
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- {{ $users->links() }} --}}
                                    <!-- This will display paginator if records exceeds paging size -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
