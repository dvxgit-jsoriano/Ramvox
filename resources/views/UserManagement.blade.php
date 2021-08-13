<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (session('status'))
                <div class="alert-class bg-blue-100 border border-blue-400 text-blue-900 px-4 py-3 mb-2 rounded relative" role="alert">
                    <strong class="font-bold">Status: </strong>
                    <span class="block sm:inline">{{ session('status') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg onclick="closeAlert()" class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Close</title>
                            <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
                @endif

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
                    <a href="{{ url('usermanagement-create') }}" class="bg-green-500 hover:bg-green-700 text-white text-center py-2 px-4 rounded border border-green-900">
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
                                                <td class="px-6 py-4 whitespace-nowrap space-x-1">
                                                    <div class="hover:opacity-90 p-2 inline-flex text-sm leading-5 font-semibold rounded-md bg-blue-100 text-blue-700 border-blue-900 border">
                                                        <a href="{{ route('downloads', $user->id) }}">Manage Downloads</a>
                                                    </div>
                                                    <div class="p-2 inline-flex text-sm leading-5 font-semibold rounded-md bg-yellow-100 text-yellow-700 border-yellow-900 border">
                                                        <a href="{{ route('user-edit', $user->id) }}">Edit</a>
                                                    </div>
                                                    <div class="p-2 inline-flex text-sm leading-5 font-semibold rounded-md bg-red-800 text-gray-100 border-red-900 border">
                                                        <form action="{{ route('user-delete', $user->id) }}" method="POST">
                                                            @method('DELETE')
                                                            {{ csrf_field() }}
                                                            <button>Delete</button>
                                                        </form>
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
