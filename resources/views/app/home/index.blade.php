@extends('layouts.app')

@section('content')
    <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
        <!-- Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
            <!-- Card -->
            <div class="flex flex-col bg-white border border-gray-200 rounded dark:bg-neutral-800 dark:border-neutral-700">
                <div class="p-4 md:p-5">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase text-gray-500 dark:text-neutral-500">
                            Incoming
                        </p>
                    </div>

                    <div class="mt-1 flex items-center gap-x-2">
                        <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
                            {{ Number::abbreviate($incomingCount) }}
                        </h3>
                    </div>
                </div>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="flex flex-col bg-white border border-gray-200  dark:bg-neutral-800 dark:border-neutral-700">
                <div class="p-4 md:p-5">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase text-gray-500 dark:text-neutral-500">
                            Outgoing
                        </p>
                    </div>

                    <div class="mt-1 flex items-center gap-x-2">
                        <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
                            {{ Number::abbreviate($outgoingCount) }}
                        </h3>
                    </div>
                </div>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="flex flex-col bg-white border border-gray-200 dark:bg-neutral-800 dark:border-neutral-700">
                <div class="p-4 md:p-5">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase text-gray-500 dark:text-neutral-500">
                            Missed
                        </p>
                    </div>

                    <div class="mt-1 flex items-center gap-x-2">
                        <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
                            {{ Number::abbreviate($missedCount) }}
                        </h3>
                    </div>
                </div>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="flex flex-col bg-white border border-gray-200  dark:bg-neutral-800 dark:border-neutral-700">
                <div class="p-4 md:p-5">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase text-gray-500 dark:text-neutral-500">
                            Avg Duration
                        </p>
                    </div>

                    <div class="mt-1 flex items-center gap-x-2">
                        <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
                            {{ gmdate('H:i:s', $avgDuration) }}
                        </h3>
                    </div>
                </div>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Grid -->

        <div class="grid lg:grid-cols-1 gap-4 sm:gap-6">
            <!-- Card -->
            <!-- End Card -->

            <!-- Card -->
            <div
                class="p-4 md:p-5 min-h-102.5 flex flex-col bg-white border border-gray-200 dark:bg-neutral-800 dark:border-neutral-700">
                <!-- Header -->
                <div class="flex flex-wrap justify-between items-center gap-2">
                    <div>
                        <h2 class="text-sm text-gray-500 dark:text-neutral-500">
                            Calls this month
                        </h2>
                        <p class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
                            {{ Number::abbreviate($callsGraph->sum()) }}
                        </p>
                    </div>
                </div>
                <!-- End Header -->

                <div data-controller="chart" data-chart-categories-value="{{ $callsGraph->keys()->toJson() }}"
                    data-chart-values-value="{{ $callsGraph->values()->toJson() }}"></div>
            </div>
            <!-- End Card -->
        </div>
    </div>
@endsection
