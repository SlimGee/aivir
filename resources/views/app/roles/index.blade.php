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
                                Roles
                            </h2>
                            <p class="text-sm text-gray-600 dark:text-neutral-400">
                                Define roles for this system
                            </p>
                        </div>

                        <div>
                            <div class="inline-flex gap-x-2">

                                <a href="{{ route('app.roles.create') }}">
                                    <x-button class="gap-2">
                                        <x-lucide-plus class="shrink-0 size-4" />
                                        Add new role
                                    </x-button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Header -->

                    <!-- Table -->
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                        <thead class="bg-gray-50 dark:bg-neutral-800">
                            <tr>
                                <th scope="col" class="ps-6 py-3 text-start">
                                    <label for="hs-at-with-checkboxes-main" class="flex">
                                        <input type="checkbox"
                                            class="shrink-0 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                            id="hs-at-with-checkboxes-main">
                                        <span class="sr-only">Checkbox</span>
                                    </label>
                                </th>

                                <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                            Name
                                        </span>
                                    </div>
                                </th>


                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                            Created
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-end"></th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                            @foreach ($roles as $role)
                                <tr>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="ps-6 py-3">
                                            <label for="hs-at-with-checkboxes-1" class="flex">
                                                <input type="checkbox"
                                                    class="shrink-0 border-gray-300 rounded-sm text-blue-600 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                    id="hs-at-with-checkboxes-1">
                                                <span class="sr-only">Checkbox</span>
                                            </label>
                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                                            <div class="flex items-center gap-x-3">
                                                <div class="grow">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{ Str::title($role->name) }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span class="text-sm text-gray-500 dark:text-neutral-500">
                                                {{ $role->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-1.5">
                                            <a class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline focus:outline-hidden focus:underline font-medium dark:text-blue-500"
                                                href="{{ route('app.roles.edit', $role) }}">
                                                Edit
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table -->

                    <!-- Footer -->
                    <div
                        class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-neutral-700">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-neutral-400">
                                <span class="font-semibold text-gray-800 dark:text-neutral-200">{{ $roles->count() }}</span>
                                results
                            </p>
                        </div>

                        <div>
                            {{ $roles->links() }}
                        </div>
                    </div>
                    <!-- End Footer -->
                </div>
            </div>
        </div>
    </div>
@endsection
