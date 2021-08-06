<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="node_modules/blueimp-file-upload/js/vendor/jquery.ui.widget.js"></script>
<script src="node_modules/blueimp-file-upload/js/jquery.iframe-transport.js"></script>
<script src="node_modules/blueimp-file-upload/js/jquery.fileupload.js"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('File Manager') }}
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
                        @foreach ($users as $user)
                            <li>
                                <a href="{{ route('download', $user->id) }}" class="py-2 font-bold text-blue-800 hover:text-blue-500">{{ $user->name ?: '' }} </a>
                                <input id="fileupload" type="file" name="files[]" data-url="server/php/" multiple>
                                @foreach ($user->downloads as $download)
                                    <li><a href="{{ route('download', $download->id) }}" class="py-2 font-bold text-blue-800 hover:text-blue-500">{{ $download->name ?: '' }} </a> - {{ $download->desc }}</li>
                                @endforeach
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    $('#fileupload').fileupload();
</script>