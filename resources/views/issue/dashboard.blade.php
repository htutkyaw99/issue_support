@extends('issue.master')

@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex items-center justify-between my-2">
            <div
                class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
                <div>
                    <h1 class="text-2xl font-bold dark:text-white">Dashboard</h1>
                </div>
            </div>
            @if (Auth::user()->role->value == 'user')
                <a href="/tickets/create"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 flex items-center gap-1">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14m-7 7V5" />
                    </svg>
                    Add Ticket
                </a>
            @endif
        </div>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Subject
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
            @foreach ($issues as $issue)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a href="/tickets/{{ $issue->id }}">
                            <div class="flex items-center gap-4">
                                <div class="font-medium dark:text-white space-y-2">
                                    <div>{{ $issue->title }}</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">{{ $issue->user->name }}</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">
                                        Created {{ $issue->created_at->diffForHumans() }}</div>
                                </div>
                            </div>
                        </a>
                    </th>
                    <td class="px-6 py-4 capitalize">
                        {{ $issue->agent->name ?? 'Unassigned' }}
                    </td>
                    <td class="px-6 py-4 uppercase">
                        <x-badge :input="$issue->priority" />
                    </td>
                    <td class="px-6 py-4 uppercase">
                        <x-status :status="$issue->status" />
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-5">
        {{ $issues->links() }}
    </div>
    </div>
@endsection
