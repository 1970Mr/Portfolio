<!DOCTYPE html>
<html dir="{{ app()->getLocale() == 'fa' ? 'rtl' : 'ltr' }}" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.rtl.min.css"
    integrity="sha384-beJoAY4VI2Q+5IPXjI207/ntOuaz06QYCdpWfWRv4lSFDyUSqsM0W+wiAMr2I185" crossorigin="anonymous">

  <style>
    @font-face {
      font-family: "Vazir";
      src: url("{{ asset('admin/fonts/Vazir.eot') }}");
      /* IE9 Compat Modes */
      src: url("{{ asset('admin/fonts/Vazir.eot?#iefix') }}") format("embedded-opentype"),
        url("{{ asset('admin/fonts/Vazir.woff2') }}") format("woff2"),
        url("{{ asset('admin/fonts/Vazir.woff') }}") format("woff"),
        url("{{ asset('admin/fonts/Vazir.ttf') }}") format("truetype");
      /* Safari, Android, iOS */
    }

    body {
      font-family: "Vazir" !important;
      background-color: #fcfcfc;
    }

    .card {
        box-shadow: -5px -5px 50px 5px rgba(0,0,0,0.1),5px 5px 50px 5px rgba(0,0,0,0.1);
    }
  </style>

  @stack('styles')

  <title>{{ env('APP_NAME') . ' | لاگین' . (isset($title) && !empty($title) ? " | $title" : '') }}</title>
</head>

<body>
  {{-- @include('admin.layouts.header') --}}
  @yield('content')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

  @stack('scripts')
</body>

</html>
