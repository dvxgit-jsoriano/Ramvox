<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Downloads') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <span class="text-2xl">Files:</span>
                    <ul class="py-4">
                        @php
                            $downloads = App\Models\Download::all();
                            $user_id = request()->id;
                        @endphp
                    </ul>
                    <div class="flex flex-col text-left">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="relative px-6 py-3 text-left">
                                                    <input type="checkbox" class="form-checkbox sr-only">
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    File Name
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Link
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($downloads as $download)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            {{-- if user with the specific download file (id) found --}}
                                                            @if (count($download->users->where('id', $user_id)) != 0)
                                                                <input type="checkbox"
                                                                    id={{ 'checkbox' . $download->id }}
                                                                    class="form-checkbox" checked
                                                                    onclick="AddDownload($(this).prop('id'));">
                                                            {{-- if user with the specific download file (id) not found --}}
                                                            @else
                                                                <input type="checkbox"
                                                                    id={{ 'checkbox' . $download->id }}
                                                                    class="form-checkbox"
                                                                    onclick="AddDownload($(this).prop('id'));">
                                                            @endif

                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $download->name }}</div>
                                                        <div class="text-sm text-gray-500">{{ $download->desc }}</div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-500">{{ $download->link }}</div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    function AddDownload($id) {
        let $status = $("#" + $id).is(":checked");
        $id = $id.replace("checkbox", "");
        if ($status) {
            $.ajax({
                type: "POST",
                url: "{{ url('addDownload') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "user_id": "{{ $user_id }}",
                    "download_id": $id
                }
            });
        } else {
            $.ajax({
                type: "POST",
                url: "{{ url('removeDownload') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "user_id": "{{ $user_id }}",
                    "download_id": $id
                }
            });
        }
    }
</script>
