<!DOCTYPE html>
<html lang="{{ str_replace( '_', '-', app()->getLocale() ) }}">

<head>
  <meta charset="utf-8">
  <title>{{ env('APP_NAME') . ( (isset($title) && !empty($title)) ? " - $title" : '' ) }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Template Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,600i,700" rel="stylesheet">

  <!-- Template CSS Files -->
  <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/css/preloader.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/css/circle.css') }}" rel="stylesheet">
  <link href="{{ asset('front/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/css/fm.revealator.jquery.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">

  <!-- CSS Skin File -->
  <link rel="stylesheet" type="text/css" title="red" href="{{ asset('front/css/skins/red.css') }}" />

  <!-- Modernizr JS File -->
  <script src="{{ asset('front/js/modernizr.custom.js') }}"></script>
</head>

<body class="{{ $my_class }}">

  @include('layouts.header')

  @yield('content')

  <!-- Template JS Files -->
  <script src="{{ asset('front/js/jquery-3.5.0.min.js') }}"></script>
  <script src="{{ asset('front/js/preloader.min.js') }}"></script>
  <script src="{{ asset('front/js/fm.revealator.jquery.min.js') }}"></script>
  <script src="{{ asset('front/js/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('front/js/masonry.pkgd.min.js') }}"></script>
  <script src="{{ asset('front/js/classie.js') }}"></script>
  <script src="{{ asset('front/js/cbpGridGallery.js') }}"></script>
  <script src="{{ asset('front/js/jquery.hoverdir.js') }}"></script>
  <script src="{{ asset('front/js/popper.min.js') }}"></script>
  <script src="{{ asset('front/js/bootstrap.js') }}"></script>
  <script src="{{ asset('front/js/custom.js') }}"></script>

</body>

</html>
