<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="bg-gray-100 max-h-screen "> <!-- Ajoutez pt-16 pour une marge en haut -->
    <div id="app">
        @include('layouts.nav')

        <main id="app" class="mt-32 mx-auto max-w-7xl px-4 sm:px-6 lg:px-10"> <!-- Ajoutez mt-16 pour l'espacement et center le contenu -->
            @yield('content')
        </main>

        @include('layouts.footer')
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
