@extends('issue.master')

@section('content')
    {{-- @dd($ticket->toArray()) --}}
    <div class="relative overflow-x-auto">
        <a href="/tickets"
            class="text-white mb-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-6 h-6 text-gray-800 dark:text-white mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h14M5 12l4-4m-4 4 4 4" />
            </svg>
            Back
        </a>
        <div class="grid grid-cols-2 gap-3">
            <div
                class="block h-fit p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <img class="w-10 h-10 rounded-full" src="https://avatar.iran.liara.run/public/37" alt="">
                        <div class="font-medium dark:text-white">
                            <div>{{ $ticket->user->name }}</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">{{ $ticket->created_at->format('Y-m-d') }}
                            </div>
                        </div>
                    </div>
                    @isset($ticket->agent_id)
                        <p class=" text-gray-500 dark:text-gray-400 capitalize">
                            {{ $ticket->agent->name }}
                        </p>
                    @endisset
                </div>
                <p class="mt-5 text-gray-500 font-bold dark:text-gray-300">
                    {{ $ticket->title }}
                </p>
                <p class="mt-5 text-gray-500 dark:text-gray-400">
                    {{ $ticket->description }}
                </p>
                <hr class="h-px mt-5 mb-3 bg-gray-200 border-0 dark:bg-gray-700">
                <div class="mt-3 flex items-center justify-between">
                    <x-status :status="$ticket->status" />
                    <x-badge :input="$ticket->priority" />
                </div>
                <hr class="h-px mt-3 mb-3 bg-gray-200 border-0 dark:bg-gray-700">
                <div class="flex items-center justify-end gap-3">
                    <form action="/tickets/{{ $ticket->id }}/assign" method="POST">
                        @csrf
                        @empty($ticket->agent_id)
                            <button type="submit"
                                class="focus:outline-none mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Assigned</button>
                        @endempty
                    </form>
                    <form action="/tickets/{{ $ticket->id }}/resolve" method="POST">
                        @csrf
                        @if ($ticket->status->value == 'resolved')
                        @else
                            <button type="submit"
                                class="focus:outline-none mt-5 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Resolved</button>
                        @endif
                    </form>
                </div>
            </div>

            {{-- chat box --}}
            <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div id="text-box" class="overflow-auto p-3">
                    <div class="flex items-start gap-2.5 my-3">
                        <img class="w-8 h-8 rounded-full" src="https://avatar.iran.liara.run/public/37" alt="Jese image">
                        <div class="flex flex-col gap-1 w-full max-w-[320px]">
                            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                <span class="text-sm font-semibold text-gray-900 dark:text-white">Bonnie Green</span>
                                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">11:46</span>
                            </div>
                            <div
                                class="flex flex-col leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                                <p class="text-sm font-normal text-gray-900 dark:text-white"> That's awesome. I think our
                                    users
                                    will
                                    really appreciate the improvements.</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-start justify-end my-3 gap-2.5">
                        <div class="flex flex-col items-end gap-1 w-full max-w-[320px]">
                            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">11:46</span>
                                <span class="text-sm font-semibold text-gray-900 dark:text-white">Bonnie Green</span>
                            </div>
                            <div
                                class="leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                                <p class="text-sm font-normal text-gray-900 dark:text-white"> That's awesome. I think our
                                    users
                                    will
                                    really appreciate the improvements.</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-start gap-2.5 my-3">
                        <img class="w-8 h-8 rounded-full" src="https://avatar.iran.liara.run/public/37" alt="Jese image">
                        <div class="flex flex-col gap-1 w-full max-w-[320px]">
                            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                <span class="text-sm font-semibold text-gray-900 dark:text-white">Bonnie Green</span>
                                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">11:46</span>
                            </div>
                            <div
                                class="flex flex-col leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                                <p class="text-sm font-normal text-gray-900 dark:text-white"> That's awesome. I think our
                                    users
                                    will
                                    really appreciate the improvements.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="h-px my-5 bg-gray-200 border-0 dark:bg-gray-700">
                <div>
                    <input type="text" id="first_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Wriet comment" required />
                </div>
            </div>
        </div>
    </div>
@endsection
