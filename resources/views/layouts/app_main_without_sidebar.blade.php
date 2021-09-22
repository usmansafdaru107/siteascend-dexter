
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <meta charset="utf-8" />
        <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- App favicon -->
        <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}">

        <!-- jquery.vectormap css -->
        <link href="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Toast CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/toastr/build/toastr.min.css') }}">
        <!-- Sweet Alert-->
        <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/style_dexter.css') }}" rel="stylesheet" type="text/css">
        @yield('css_styles')

        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" />


    </head>

    <body data-sidebar="dark" data-layout="horizontal" data-layout-size="boxed">

        <!-- Loader -->
        <!-- <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <i class="ri-loader-line spin-icon"></i>
                </div>
            </div>
        </div> -->

        <div id="layout-wrapper">

            @extends('layouts.navbar')

            @yield('content')

            @extends('layouts.footer')


        </div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>


        <!-- apexcharts -->
        <!-- <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script> -->

        <!-- jquery.vectormap map -->
        <script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}"></script>

        <!-- Required datatable js -->
        <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Responsive examples -->
        <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

        <!-- toastr plugin -->
        <script src="{{ asset('assets/libs/toastr/build/toastr.min.js') }}"></script>
        <!-- Sweet Alerts js -->
        <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
        @yield('js_scripts')

        <!-- App js -->
        <script src="{{ asset('assets/js/app.js') }}" defer></script>
        <script>
            $(document).ready(function(){
                setTimeout(() => {
                    $("#message_success").hide('slow');
                }, 5000);
                setTimeout(() => {
                    $("#message_error").hide('slow');
                }, 5000);
            });
        </script>

    </body>

</html>
