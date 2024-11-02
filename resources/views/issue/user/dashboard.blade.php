@extends('issue.user.master')

@section('content')
    <form action="{{ route('user.tickets.store') }}" method="POST" class="max-w-sm mt-20 mb-5">
        @csrf
        <div>
            <h1 class="text-2xl font-bold dark:text-white mb-3">Create Ticket</h1>
        </div>
        <div class="mb-5">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
            <input type="text" id="title" name="title"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Window installtion . . ." required />
        </div>
        <div class="mb-5">
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea id="message" rows="4" name="description"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Window need to reinstall blah blah . . ."></textarea>
        </div>
        <select id="priority" name="priority"
            class="bg-gray-50 mb-3 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @foreach ($priority as $item)
                <option value="{{ $item }}">{{ ucfirst($item) }}</option>
            @endforeach
        </select>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
    </form>
    <div>
        <div
            class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
            <div>
                <h1 class="text-2xl font-bold dark:text-white">Browse Tickets</h1>
            </div>
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
        @if ($tickets)
            <tbody>
                @foreach ($tickets as $ticket)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="{{ route('user.tickets', ['id' => $ticket->id]) }}">
                                <div class="flex items-center gap-4">
                                    <div class="font-medium dark:text-white space-y-2">
                                        <div>{{ $ticket->title }}</div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">
                                            {{ $ticket->user->name }}
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
        @endif
    </table>
    <div class="mt-5">
        {{ $tickets->links() }}
    </div>
@endsection
