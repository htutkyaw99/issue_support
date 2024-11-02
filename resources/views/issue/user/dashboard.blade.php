<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Issue Hunter</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        document.documentElement.classList.add('dark');
    </script>
</head>

<body class="dark:bg-gray-900">
    @include('issue.user.nav')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="mt-20">
            <h1 class="text-2xl font-bold dark:text-white mb-3">Create User</h1>
        </div>
    </div>
</body>

</html>
