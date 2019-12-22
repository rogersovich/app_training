<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/dist/images/owl-foresight.png') }}">
    <title>@yield('title')</title>
    @yield('custom-css')
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('/dist/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/dist/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/dist/css/loading-bar.css') }}" rel="stylesheet">

</head>
<body class="skin-default-dark fixed-layout" style="background:#f5f6fa;">

    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elegant admin</p>
        </div>
    </div>

    <div id="main-wrapper">

        @include('admin.element.navbar')

        @include('admin.element.sidebar')

        @section('content')

        @show

        {{-- @include('admin.element.footer') --}}

    </div>


    {{-- all jquery --}}
    <script src="{{ asset('/dist/js/jquery-3.4.1.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('/dist/js/popper.min.js') }}"></script>
    <script src="{{ asset('/dist/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('/dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('/dist/js/sidebarmenu.js') }}"></script>
    <!--stickey kit -->
    <script src="{{ asset('/dist/js/sticky-kit.min.js') }}"></script>
    <script src="{{ asset('/dist/js/jquery.sparkline.min.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('dist/js/custom.min.js') }}"></script>
    <script src="{{ asset('dist/js/loading-bar.js') }}"></script>
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}

    @yield('scripts')

</body>
</html>

