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
                                Call histroy
                            </h2>
                        </div>

                        <div>
                            <div class="inline-flex gap-x-2">

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

                                <th scope="col" class="px-4 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                            Date
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                            Caller
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                            Duration
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                            Status
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                            Agent
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                            Recording
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-end"></th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                            @foreach ($calls as $call)
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
                                        <div class="px-4 py-3">
                                            <div class="flex items-center gap-x-3">
                                                <div class="grow">
                                                    <span
                                                        class="block text-xs font-semibold text-gray-800 dark:text-neutral-200">
                                                        {{ $call->created_at->format('d M Y H:m') }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="h-px  size-px whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span class="block text-xs font-semibold text-gray-800 dark:text-neutral-200">
                                                {{ $call->number }}
                                            </span>
                                        </div>
                                    </td>

                                    <td class="h-px  whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span class="block text-xs font-semibold text-gray-800 dark:text-neutral-200">
                                                {{ gmdate('H:i:s', $call->duration) }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            @if ($call->type == 'incoming')
                                                <span
                                                    class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-semibold bg-teal-100 text-teal-800 rounded dark:bg-teal-500/10 dark:text-teal-500">
                                                    {{ $call->type }}
                                                </span>
                                            @elseif($call->type == 'missed')
                                                <span
                                                    class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-semibold bg-red-100 text-teal-800 rounded dark:bg-teal-500/10 dark:text-teal-500">
                                                    {{ $call->type }}
                                                </span>
                                            @else
                                                <span
                                                    class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-semibold bg-orange-100 text-teal-800 rounded dark:bg-teal-500/10 dark:text-teal-500">
                                                    {{ $call->type }}
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <div class="flex items-center gap-x-3">
                                                <span
                                                    class="block text-xs font-semibold text-gray-800 dark:text-neutral-200">
                                                    {{ $call->user->name }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-3 w-full">
                                            <media-controller audio class="bg-white rounded">
                                                <audio slot="media"
                                                    src="https://stream.mux.com/O4h5z00885HEucNNa1rV02wZapcGp01FXXoJd35AHmGX7g/audio.m4a"
                                                    crossorigin></audio>
                                                <media-control-bar class="bg-white rounded">
                                                    <media-play-button class="px-4"></media-play-button>
                                                    <media-time-display></media-time-display>
                                                    <media-time-range></media-time-range>
                                                    <media-duration-display class="px-4"></media-duration-display>
                                                </media-control-bar>
                                            </media-controller>
                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-1.5">
                                            <a class="font-semibold text-xs text-blue-600"
                                                href="{{ route('app.calls.show', $call) }}">
                                                Details
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
                                <span class="font-semibold text-gray-800 dark:text-neutral-200">{{ $calls->count() }}</span>
                                results
                            </p>
                        </div>

                        <div class="space-x-4">
                            {{ $calls->links() }}
                        </div>
                    </div>
                    <!-- End Footer -->
                </div>
            </div>
        </div>
    </div>
@endsection
