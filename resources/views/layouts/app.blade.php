<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('img/logo-nusa.png') }}" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/sweetalert/dist/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.toast.min.css') }}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Custom Script -->
    @stack('styles')

</head>

<body>
    <div id="toast-container"></div>
    <div id="progress-overlay" class="progress-overlay" style="display: none;">
        <div class="text-center spinner-border text-primary progress" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    @include('layouts.header')
    @include('layouts.sidebar')
    @yield('content')
    @include('layouts.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery.toast.min.js') }}"></script>
    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert/dist/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <!-- Template Main JS File -->
    @if(request()->segment(2) == 'admin-news' && request()->segment(3) == 'create' || request()->segment(3) == 'edit')
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    @endif
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- Custom Script -->
    @stack('scripts')
</body>

</html>