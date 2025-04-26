@extends('layouts.app')

@section('content')
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div
                    class="bg-white border border-gray-200 rounded overflow-hidden dark:bg-neutral-800 dark:border-neutral-700">

                    <div class="px-6 py-8 max-w-2xl">

                        <div>
                            <div class="px-4 sm:px-0">
                                <h3 class="text-base/7 font-semibold text-gray-900">Call Information</h3>
                                <p class="mt-1 max-w-2xl text-sm/6 text-gray-500">
                                    {{ $call->created_at->format('d M Y H:m') }}
                                </p>
                            </div>
                            <div class="mt-6 border-t border-gray-100">
                                <dl class="divide-y divide-gray-100">
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm/6 font-medium text-gray-900">Caller</dt>
                                        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                                            {{ $call->number }}
                                        </dd>
                                    </div>
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm/6 font-medium text-gray-900">Duration</dt>
                                        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                                            {{ gmdate('H:i:s', $call->duration) }}
                                        </dd>
                                    </div>
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm/6 font-medium text-gray-900">Agent</dt>
                                        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                                            {{ $call->user->name }}
                                        </dd>
                                    </div>
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm/6 font-medium text-gray-900">Recording</dt>
                                        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
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
                                        </dd>
                                    </div>
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm/6 font-medium text-gray-900">Type</dt>
                                        <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                                            {{ $call->type }}
                                        </dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
