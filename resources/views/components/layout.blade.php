<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="{{ $meta_robots ?? 'index, follow' }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="favicon.svg" />
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png" />

    <!-- fonty -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cactus+Classical+Serif&family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


    <title>Fullstack test</title>


    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite([ 'resources/js/app.js'])
    @endif
</head>
<body class="bg-cookie-misty-rose">
<x-layout.header class="w-full bg-cookie-celeste"></x-layout.header>

<main>
    {{ $slot }}
    <x-layout.container class="bg-cookie-verdigris w-full scroll-mt-[8rem] lg:scroll-mt-[6rem] border-t-2" id="footer">
        <div class="xl:w-1200 lg:w-960 w-full lg:px-0 px-6 m-auto">
            <x-layout.footer id="footer" class="w-full"></x-layout.footer>
        </div>
    </x-layout.container>

</main>
</body>
</html>
