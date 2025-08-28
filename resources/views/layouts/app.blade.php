<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NGO Connect - @yield('title', 'NGO Connect')</ti`tle>

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Add any custom styles here if required */
    </style>
</head>
<body class="antialiased">
    <!-- Content will be injected here by the extending view -->
    @yield('content')

    <!-- Include JavaScript files if needed -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
</body>
</html>