@extends('issue.master')

@section('content')
    {{-- @dd($ticket->toArray()) --}}
    <div class="relative overflow-x-auto">
        <a href="/tickets"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-6 h-6 text-gray-800 dark:text-white mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h14M5 12l4-4m-4 4 4 4" />
            </svg>
            Back
        </a>
        <div>
            <h1 class="text-2xl my-5 font-bold dark:text-white">Tickets Details</h1>
        </div>
        <div class="space-y-3">
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
                    SUBJECT : {{ $ticket->title }}
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
                <form action="{{ route('tickets.update', ['id' => $ticket->id]) }}" method="POST"
                    class="flex flex-col items-end space-y-3">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="agent"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-end">Assigned
                            User</label>
                        <select id="agent" name="agent_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($agents as $agent)
                                <option {{ $ticket->agent_id == $agent->id ? 'selected' : '' }} value="{{ $agent->id }}">
                                    {{ $agent->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="status"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-end">Status
                        </label>
                        <select id="status" name="status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($status as $item)
                                <option {{ $ticket->status->value === $item ? 'selected' : '' }}
                                    value="{{ $item }}">
                                    {{ $item }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
                </form>
            </div>

            <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div id="accordion-collapse" data-accordion="collapse">
                    <h2 id="accordion-collapse-heading-1">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                            data-accordion-target="#accordion-collapse-body-1" aria-expanded="true"
                            aria-controls="accordion-collapse-body-1">
                            <span>Comment Section</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                            <div id="text-box" class="overflow-auto p-3">
                                <div class="flex items-start gap-2.5 my-3">
                                    <img class="w-8 h-8 rounded-full" src="https://avatar.iran.liara.run/public/37"
                                        alt="Jese image">
                                    <div class="flex flex-col gap-1 w-full max-w-[320px]">
                                        <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                            <span class="text-sm font-semibold text-gray-900 dark:text-white">Bonnie
                                                Green</span>
                                            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">11:46</span>
                                        </div>
                                        <div
                                            class="flex flex-col leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                                            <p class="text-sm font-normal text-gray-900 dark:text-white"> That's awesome. I
                                                think our
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
                                            <span class="text-sm font-semibold text-gray-900 dark:text-white">Bonnie
                                                Green</span>
                                        </div>
                                        <div
                                            class="leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                                            <p class="text-sm font-normal text-gray-900 dark:text-white"> That's awesome. I
                                                think our
                                                users
                                                will
                                                really appreciate the improvements.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start gap-2.5 my-3">
                                    <img class="w-8 h-8 rounded-full" src="https://avatar.iran.liara.run/public/37"
                                        alt="Jese image">
                                    <div class="flex flex-col gap-1 w-full max-w-[320px]">
                                        <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                            <span class="text-sm font-semibold text-gray-900 dark:text-white">Bonnie
                                                Green</span>
                                            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">11:46</span>
                                        </div>
                                        <div
                                            class="flex flex-col leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                                            <p class="text-sm font-normal text-gray-900 dark:text-white"> That's awesome. I
                                                think our
                                                users
                                                will
                                                really appreciate the improvements.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <input type="text" id="first_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Wriet comment" required />
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
