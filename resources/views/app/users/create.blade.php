@extends('layouts.app')

@section('content')
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div
                    class="bg-white border border-gray-200 rounded  overflow-hidden dark:bg-neutral-800 dark:border-neutral-700">
                    <!-- Header -->
                    <div
                        class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                                Create new user
                            </h2>
                        </div>

                        <div>
                            <div class="inline-flex gap-x-2">

                            </div>
                        </div>
                    </div>


                    <div class="px-6 py-8 max-w-2xl">
                        <form action="{{ route('app.users.store') }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <x-form.label>Name</x-form>
                                    <x-form.input name="name" type="text" class="w-full" />
                            </div>


                            <div class="mb-3">
                                <x-form.label>Email</x-form>
                                    <x-form.input name="email" type="email" class="w-full" />
                            </div>


                            <div class="mb-3" data-controller="choices">
                                <x-form.label>Roles</x-form>
                                    <select data-choices-target="element" multiple name="role_ids[]">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('role_ids.*')
                                        <p class=" text-sm text-red-400">
                                            {{ $message }}
                                        </p>
                                    @enderror
                            </div>


                            <div class="mb-3">
                                <x-form.label>Password</x-form>
                                    <x-form.input name="password" type="password" class="w-full" />
                                    <span class="text-sm text-gray-500 font-medium">Leave blank to keep old password</span>
                            </div>
                            <div class="mb-3">
                                <x-button type="submit">Create user</x-button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
