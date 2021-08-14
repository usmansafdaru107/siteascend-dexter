<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('theme/images/favicon.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    <!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('theme/main/css/vendors_css.css') }}">
	  
    <!-- Style-->  
    <link rel="stylesheet" href="{{ asset('theme/main/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/main/css/skin_color.css') }}">
</head>
    <body class="hold-transition theme-primary bg-gradient-primary">

        @yield('content')

        <!-- Vendor JS -->
        <script src="{{ asset('theme/main/js/vendors.min.js') }}"></script>

    </body>
</html>
