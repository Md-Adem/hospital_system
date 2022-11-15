<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="description" content="Portal -  Admin Panel">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="admin laravel template, template laravel admin, laravel css template, best admin template for laravel, laravel blade admin template, template admin laravel, laravel admin template bootstrap 4, laravel bootstrap 4 admin template, laravel admin bootstrap 4, admin template bootstrap 4 laravel, bootstrap 4 laravel admin template, bootstrap 4 admin template laravel, laravel bootstrap 4 template, bootstrap blade template, laravel bootstrap admin template">

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
        <div class="main-content side-content pt-0 error-bg">
            <div class="container-fluid">
                <div class="inner-body">

                    @yield('content')

                </div>
            </div>
        </div>
        <!-- End Main Content-->

        @include('layouts.footer')
        @include('layouts.sidebar')

    </div>
    <!-- End Page -->

    @include('layouts.script')

</body>

</html>
