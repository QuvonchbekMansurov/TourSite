<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="/assets/assets/css/app.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/assets/css/style.css">
    <link rel="stylesheet" href="/assets/assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="/assets/assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='/assets/assets/img/favicon.ico' />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <!-- General JS Scripts -->
  <script src="/assets/assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="/assets/assets/bundles/apexcharts/apexcharts.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="/assets/assets/js/page/index.js"></script>
  <!-- Template JS File -->
  <script src="/assets/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="/assets/assets/js/custom.js"></script>
</body>

</html>
