@extends('issue.master')

@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <a href="/users"
            class="text-white mb-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-6 h-6 text-gray-800 dark:text-white mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h14M5 12l4-4m-4 4 4 4" />
            </svg>
            Back
        </a>
        <div>
            <h1 class="text-2xl font-bold dark:text-white mb-3">Create User</h1>
        </div>
        <form class="max-w-md" action="/users/create" method="POST">
            @csrf
            <div class="relative z-0 w-full mb-5 group">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter your name
                </label>
                <input type="text" id="name" aria-describedby="helper-text-explanation" name="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="">
                @error('name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter your email
                </label>
                <input type="email" id="email" aria-describedby="helper-text-explanation" name="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="">
                @error('email')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter your
                    password
                </label>
                <input type="password" id="password" aria-describedby="helper-text-explanation" name="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="">
                @error('password')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <label for="position" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter your
                    position
                </label>
                <input type="text" id="position" aria-describedby="helper-text-explanation" name="position"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="">
                @error('position')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select user role
                </label>
                <select id="countries" name="role"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->value }}">{{ ucfirst($role->value) }}</option>
                    @endforeach
                </select>
                @error('role')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
@endsection
