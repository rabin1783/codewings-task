<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <!-- Meta data -->
    <meta charset="UTF-8">

    <meta name="baseurl" content="{{ url('/') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="Task CodeWings" name="description">
    <meta content="Task" name="author">
    <meta name="keywords" content="Task">

    <!-- Title -->
    <title>Task Codewings @yield('title')</title>

    <!--Bootstrap css -->
    <link href="{{ asset('assets/backend/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Style css -->
    <link href="{{ asset('assets/backend/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/css/skin-modes.css') }}" rel="stylesheet" />

    <!-- Animate css -->
    <link href="{{ asset('assets/backend/css/animated.css') }}" rel="stylesheet" />

    <!--Sidemenu css -->
    <link href="{{ asset('assets/backend/css/sidemenu.css') }}" rel="stylesheet">

    <!-- Toastr Alert -->
    <link rel="stylesheet" href="{{ asset('assets/backend/css/toastr.min.css') }}">

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="{{ asset('assets/backend/css/sweet-alert.min.css') }}">

    @yield('css')
    </head>

    <body class="app sidebar-mini light-mode gradient-header color-menu ">

        <!-- PAGE -->
        <div class="page">
            <div class="page-main">

                @if(auth()->user())
                    <!--aside open-->
                    @include('admin.inc.sidebar')
                    <!--aside closed-->

                    <!--app header-->
                    @include('admin.inc.header')
                    <!--/app header-->
                @endif

                <!--app-content open-->
                @yield('content')
                <!-- CONTAINER END -->
            </div>

            @include('admin.inc.footer')

        </div>

        <!-- Jquery js-->
        <script src="{{ asset('assets/backend/plugins/jquery/jquery.min.js') }}"></script>

        <!-- Bootstrap5 js-->
        <script src="{{('assets/backend/plugins/bootstrap/popper.min.js')}}"></script>
        <script src="{{ asset('assets/backend/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

        
        <!--Sidemenu js-->
        <script src="{{ asset('assets/backend/plugins/sidemenu/sidemenu.js') }}"></script>

        <!-- Toastr js-->
        <script src="{{ asset('assets/backend/js/toastr.min.js') }}"></script>

        <link id="theme" href="https://accounting.bowcms.com/assets/backend/colors/color1.css" rel="stylesheet" type="text/css" />

        <script src="{{ asset('assets/backend/js/sweet-alert.min.js')}}"></script>

        <script src="{{ asset('assets/backend/js/custom.min.js') }}"></script>


        <script>
            @if (Session::has('success'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.success("{{ session('success') }}");
            @endif

            @if (Session::has('error'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.error("{{ session('error') }}");
            @endif

            @if (Session::has('info'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.info("{{ session('info') }}");
            @endif

            @if (Session::has('warning'))
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.warning("{{ session('warning') }}");
            @endif

            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
        @yield('js')

    </body>

</html>
