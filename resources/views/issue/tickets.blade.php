@extends('issue.master')

@section('content')
    {{-- @dd($priority->toArray()) --}}

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div
            class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
            <div>
                <h1 class="text-2xl font-bold dark:text-white">Browse Tickets</h1>
            </div>
            <div class="relative">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" id="table-search-users"
                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for tickets">
            </div>
            <a href="/tickets/create"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 flex items-center gap-1">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 12h14m-7 7V5" />
                </svg>
                Add Ticket
            </a>
        </div>

    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    User
                </th>
                <th scope="col" class="px-6 py-3">
                    Assigned Technician
                </th>
                <th scope="col" class="px-6 py-3">
                    Priority
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $loop->index + 1 }}
                    </th>
                    <td class="px-6 py-4">
                        <a href="/tickets/{{ $ticket->id }}">
                            <div class="flex items-center gap-4">
                                <div class="font-medium dark:text-white space-y-1">
                                    <div>{{ $ticket->title }}</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">{{ $ticket->user->name }}</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">
                                        Created {{ $ticket->created_at->diffForHumans() }}</div>
                                </div>
                            </div>
                        </a>
                    </td>
                    <td class="px-6 py-4 capitalize ">
                        @empty($ticket->agent->name)
                            Not Assigned Yet
                        @endempty

                        @isset($ticket->agent->name)
                            <div class="font-bold dark:text-gray-300">
                                {{ $ticket->agent->name }}
                            </div>
                        @endisset
                    </td>
                    <td class="px-6 py-4 uppercase">
                        <x-badge :input="$ticket->priority" />
                    </td>
                    <td class="px-6 py-4 uppercase">
                        <x-status :status="$ticket->status" />
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-5">
        {{ $tickets->links() }}
    </div>
    </div>
@endsection
