<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="Founded on a commitment to excellence and trust, Nusa Advocates is a premier law firm based in Jakarta, Indonesia" name="description">
  <meta content="law firm,Nusa,law,Advocates,Nusa Advocates" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('img/logo-nusa.png') }}" rel="icon">
  <link href="{{ asset('img/logo-nusa.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  @stack('styles')
  
  <link href="{{ asset('vendor/vendor-view/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/vendor-view/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/vendor-view/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/vendor-view/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/vendor-view/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/vendor-view/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/vendor-view/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('css/style-view.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style-view-mobile.css') }}" rel="stylesheet">
</head>

<body>
  @include('layout-views.header')
  @yield('content')
  @include('layout-views.footer')

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('vendor/vendor-view/aos/aos.js') }}"></script>
  <script src="{{ asset('vendor/vendor-view/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/vendor-view/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('vendor/vendor-view/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('vendor/vendor-view/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/vendor-view/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('vendor/vendor-view/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->

  <script src="{{ asset('js/main-view.js') }}"></script>
  <script>
   function toggleLanguage() {
        var lang = document.getElementById('language-toggle').checked ? 'id' : 'en';
        window.location.href = '/' + lang + window.location.pathname.replace(/^\/[a-z]{2}/, '');
    }
  </script>
</body>

</html>