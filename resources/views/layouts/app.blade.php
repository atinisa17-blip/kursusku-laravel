<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'KursusKu')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('partials.navbar')

    <main class="container py-4">
        @yield('content')
    </main>

    @stack('scripts')
</body>

</html>
@vite(['resources/css/app.css', 'resources/js/app.js'])