@extends('layouts.app')

@section('content')
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div
                    class="bg-white border border-gray-200 rounded shadow-2xs overflow-hidden dark:bg-neutral-800 dark:border-neutral-700">
                    <!-- Header -->
                    <div
                        class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                                Edit role
                            </h2>
                        </div>

                        <div>
                            <div class="inline-flex gap-x-2">


                                <a href="{{ route('app.roles.destroy', $role) }}" data-turbo-method="delete"
                                    data-turbo-confirm="Are you sure?">
                                    <x-secondary-button class="gap-x-2">
                                        <x-lucide-trash class="shrink-0 size-4" />
                                        Delete role
                                    </x-secondary-button>
                                </a>
                            </div>
                        </div>
                    </div>


                    <div class="px-6 py-8 max-w-2xl">
                        <form action="{{ route('app.roles.update', $role) }}" method="post">
                            @csrf
                            @method('PATCH')

                            <div class="mb-3">
                                <x-form.label>Name</x-form>
                                    <x-form.input name="name" type="text" :value="$role->name" class="w-full" />
                            </div>

                            <div class="mb-3">
                                <x-button type="submit">Update role</x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
