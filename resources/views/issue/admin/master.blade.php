<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Issue Tracker</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        document.documentElement.classList.add('dark');
    </script>
</head>

<body class="dark:bg-gray-900">
    <nav>
        @include('issue.admin.components.nav')
    </nav>
    {{-- <div class="antialiased bg-gray-50 dark:bg-gray-900"> --}}
    <aside>
        @include('issue.admin.components.aside')
    </aside>

    <div class="p-4 sm:ml-64 mt-14">
        @yield('content')
    </div>

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>

</html>
