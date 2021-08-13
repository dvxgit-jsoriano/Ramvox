<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex place-content-center p-2 bg-white border-b border-gray-200">

                    <!-- User Management Edit -->
                    <div class="w-full md:w-1/2 py-2">

                        <h4 class="text-center my-2">Edit A User</h4>

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

                        <form action="{{ url('usermanagement-update', ['id' => $user->id]) }}" method="post" class="bg-white shadow-md rounded px-4 pb-4 mb-4">
                            @method('PUT')
                            {{ csrf_field() }}

                            <!-- Name -->
                            <div>
                                <x-label for="name" :value="__('Name')" />

                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user->name }}" required autofocus />
                            </div>

                            <!-- Username -->
                            <div class="mt-4">
                                <x-label for="username" :value="__('Username')" />

                                <x-input id="username" class="block mt-1 w-full" type="text" name="username" value="{{ $user->username }}" required />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-label for="email" :value="__('Email')" />

                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email }}" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-label for="password" :value="__('Password')" />

                                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required/>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-4">
                                    {{ __('Save') }}
                                </x-button>

                                <button type="reset" class="ml-4 px-4 py-1 rounded-md border-2">
                                    {{ __('Cancel') }}
                                </button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
