<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="description" content="Portal -  Admin Panel">
    <meta name="author" content="Oromtic - Mohamed Adem">
    <meta name="keywords" content="">

    @include('layouts.css')

</head>

<body class="main-body leftmenu">
    <!-- Loader -->
    <div id="global-loader">
        <img src="{{ URL::asset('assets/img/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- End Loader -->

    <!-- Page -->
    <div class="page">

        @include('layouts.side-menu')
        @include('layouts.main-header')
        @include('layouts.mobile-header')

        <!-- Main Content-->
        <div class="main-content side-content pt-0">
            <div class="container-fluid">
                <div class="inner-body">

                    @yield('content')

                </div>
            </div>
        </div>
        <!-- End Main Content-->

        @include('layouts.footer')
        @yield('modal')
        @include('layouts.sidebar')

    </div>
    <!-- End Page -->

    @include('layouts.script')

</body>

</html>
