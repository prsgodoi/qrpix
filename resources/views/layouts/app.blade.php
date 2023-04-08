<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>PIX Util</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('_theme/assets/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('_theme/assets/vendor/css/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('_theme/assets/css/demo.css') }}" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('_theme/assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('_theme/assets/vendor/fonts/fontawesome.css') }}" />

    <!-- Styles -->
    @yield('css')
</head>
<body>

@yield('content')

@stack('scripts')
</body>
</html>