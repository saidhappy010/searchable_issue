<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') . ' | ' . request()->segment(2) }}
        {{ request()->segment(3) && (request()->segment(2) == 'establishments' || request()->segment(2) == 'users') ? ' | ' . request()->segment(4) : request()->segment(3) }}
    </title>


    <!-- Fonts -->
    {{-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}
    {{-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap"
        rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('nahmi Logo White.svg') }}">
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />


    <!-- Styles -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @livewireStyles
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- Scripts -->
    @livewireScripts
    <script src="{{ mix('js/app.js') }}" defer></script>

    @stack('scripts')
</head>

<body class="antialiased" dir="{{ App::isLocale('ar') ? 'rtl' : 'ltr' }}">

    <div class="min-h-screen bg-gray-100">
        {{-- @include('layouts.navigation')       --}}

        <!-- Page Heading -->

        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>

        <!-- Page Content -->
        <main>
            {{ $slot }}
            {{-- @yield('content') --}}
        </main>
    </div>

    <x-filament::notification-manager />

    <script>
        window.User = {
            id: {{ optional(auth()->user())->id }}
        }
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        FilePond.parse(document.body);
    </script>


    <script src="{{ asset('js/app.js') }}"></script>


</body>

</html>
