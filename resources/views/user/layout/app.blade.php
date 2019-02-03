<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'bezahltesPraktikum') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        window.Laravel =; <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/indexUser.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    @include('user.inc.nav')
    <main class="py-4">
        <div class="container">
            @include('user.inc.messages')
            @yield('content')
        </div>
    </main>
</div>
</body>
</html>
