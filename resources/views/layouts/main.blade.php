<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, minimum-scale=1.0">
{{--    <link rel="stylesheet" href="{{ asset() }}">--}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" async></script>
    <title>Страница @yield('title')</title>
</head>
<body>

@yield('menu')
<main role="main" class="flex-shrink-0">
    <div class="container">
        @yield('content')
    </div>
</main>
</body>
</html>
