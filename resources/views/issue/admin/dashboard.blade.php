@extends('issue.admin.master')

@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div
            class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
            <div>
                <h1 class="text-2xl font-bold dark:text-white">Admin Dashboard</h1>
            </div>
        </div>
        <dl
            class="grid max-w-screen-xl grid-cols-2 gap-8 p-4 mx-auto text-gray-900 sm:grid-cols-3 xl:grid-cols-6 dark:text-white sm:p-8">
            <div class="flex flex-col items-center justify-center">
                <dt class="mb-2 text-3xl font-extrabold">73M+</dt>
                <dd class="text-gray-500 dark:text-gray-400">Users</dd>
            </div>
            <div class="flex flex-col items-center justify-center">
                <dt class="mb-2 text-3xl font-extrabold">73M+</dt>
                <dd class="text-gray-500 dark:text-gray-400">Tickets</dd>
            </div>
            <div class="flex flex-col items-center justify-center">
                <dt class="mb-2 text-3xl font-extrabold">73M+</dt>
                <dd class="text-gray-500 dark:text-gray-400">Assigned</dd>
            </div>
            <div class="flex flex-col items-center justify-center">
                <dt class="mb-2 text-3xl font-extrabold">73M+</dt>
                <dd class="text-gray-500 dark:text-gray-400">Unassigned</dd>
            </div>
            <div class="flex flex-col items-center justify-center">
                <dt class="mb-2 text-3xl font-extrabold">73M+</dt>
                <dd class="text-gray-500 dark:text-gray-400">Resolved</dd>
            </div>
            <div class="flex flex-col items-center justify-center">
                <dt class="mb-2 text-3xl font-extrabold">73M+</dt>
                <dd class="text-gray-500 dark:text-gray-400">Closed</dd>
            </div>
        </dl>
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
                @foreach ($tickets as $ticket)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="{{ route('tickets.show', ['id' => $ticket->id]) }}">
                                <div class="flex items-center gap-4">
                                    <div class="font-medium dark:text-white space-y-2">
                                        <div>{{ $ticket->title }}</div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">{{ $ticket->user->name }}
                                        </div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">
                                            Created {{ $ticket->created_at->diffForHumans() }}</div>
                                    </div>
                                </div>
                            </a>
                        </th>
                        <td class="px-6 py-4 capitalize">
                            {{ $ticket->agent->name ?? 'Unassigned' }}
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
