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
                            //$download_user_id = $download->users->where('id',$user_id);
                        @endphp
                    </ul>
                    {{-- start --}}
                    <div class="flex flex-col text-left">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="relative px-6 py-3">
                                                    <input type="checkbox" class="form-checkbox">
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    File Name
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Link
                                                </th>
                                                {{-- <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Action
                                                </th> --}}
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($downloads as $download)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                       {{--  @foreach ($download->users as $user)
                                                        <div>{{$user_id." ".$user->id}}</div> 
                                                        
                                                       

                                                        @endforeach --}}
                                                        {{-- {{$select=$download->users->where('id',$user_id)->get("download_id",$download->id)}} --}}
                                                        
                                                        @if(count($download->users->where('id',$user_id))!=0/* $download->id == $select */)
                                                            <input type="checkbox" class="form-checkbox" checked>
                                                   
                                                        @else
                                                            <input type="checkbox" class="form-checkbox">
                                                        @endif
                                                        
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">{{ $download->name }}</div>
                                                    <div class="text-sm text-gray-500">{{ $download->desc }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-500">{{ $download->link }}</div>
                                                </td>
                                                {{-- <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                    <a href="#" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Edit</a>
                                                </td> --}}
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end --}}
                    {{-- <div class="fixed z-10 top-0 w-full h-full flex bg-black bg-opacity-60">
                        <div class="extraOutline p-4 bg-white w-max bg-whtie m-auto rounded-lg">
                          <div class="file_upload p-5 relative border-4 border-dotted border-gray-300 rounded-lg" style="width:450px;">
                              <svg class="text-indigo-500 w-24 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" /></svg>
                              <div class="input_field flex flex-col w-max mx-auto text-center">
                                  <label>
                                      <input class="text-sm cursor-pointer w-36 hidden" type="file" multiple>
                                      <div class="text bg-indigo-600 text-white border border-gray-300 rounded font-semibold cursor-pointer p-1 px-3 hover:bg-indigo-500">Select</div>
                                  </label>
                                  
                                  <div class="title text-indigo-500 uppercase">or drop files here</div>    
                              </div>      
                              <div class="close_btn absolute -top-10 -right-10 bg-white p-4 cursor-pointer hover:bg-gray-100 py-2 text-gray-600 rounded-full">X</div>
                          </div>      
                        </div>
                      </div> --}}
                    {{-- <table class="table-auto w-full">
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
                    </table> --}}
                    {{-- {{ $users->links() }} --}}
                    <!-- This will display paginator if records exceeds paging size -->

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
