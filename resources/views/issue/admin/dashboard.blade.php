@extends('issue.admin.master')

@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div
            class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
            <div>
                <h1 class="text-2xl font-bold dark:text-white">Admin Dashboard</h1>
            </div>
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
@endsection
