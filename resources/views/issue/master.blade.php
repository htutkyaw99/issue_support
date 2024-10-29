<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Issue Tracker</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }

        if (document.getElementById("pagination-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#pagination-table", {
                paging: true,
                perPage: 5,
                perPageSelect: [5, 10, 15, 20, 25],
                sortable: false
            });
        }
    </script>
</head>

<body class="dark:bg-gray-900">
    <nav>
        @include('issue.components.nav')
    </nav>
    {{-- <div class="antialiased bg-gray-50 dark:bg-gray-900"> --}}
    <aside>
        @include('issue.components.aside')
    </aside>

    <div class="p-4 sm:ml-64 mt-14">
        @yield('content')
    </div>

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>

</html>
