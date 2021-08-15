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
    <body class="hold-transition light-skin sidebar-mini theme-primary fixed">
        <div class="wrapper">

            @extends('layouts.navbar')

            @extends('layouts.sidebar')

            @yield('content')

        </div>
        <!-- Vendor JS -->
        <script src="{{ asset('theme/main/js/vendors.min.js') }}"></script>

        <script src="{{ asset('theme/assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
        <script src="{{ asset('theme/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>	
        <script src="{{ asset('theme/assets/vendor_components/progressbar.js-master/dist/progressbar.js') }}"></script>
        <script src="{{ asset('theme/assets/vendor_components/chart.js-master/Chart.min.js') }}"></script>
        <script src="{{ asset('theme/assets/vendor_components/zingchart_branded_version/zingchart.min.js') }}"></script>	
        <script src="{{ asset('theme/assets/vendor_components/datatable/datatables.min.js') }}"></script>
        
        <!-- Lotus Admin App -->
        <script src="{{ asset('theme/main/js/template.js') }}"></script>
        <script src="{{ asset('theme/main/js/pages/dashboard.js') }}"></script>
        <script src="{{ asset('theme/main/js/pages/data-table.js') }}"></script>

    </body>
</html>
