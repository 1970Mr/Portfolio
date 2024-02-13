<!DOCTYPE html>
<html dir="{{ app()->getLocale() == 'fa' ? 'rtl' : 'ltr' }}" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.rtl.min.css"
    integrity="sha384-beJoAY4VI2Q+5IPXjI207/ntOuaz06QYCdpWfWRv4lSFDyUSqsM0W+wiAMr2I185" crossorigin="anonymous">

  {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"> --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">


  {{-- <link rel="stylesheet" href="https://kit.fontawesome.com/f0f0c5351e.css" crossorigin="anonymous"> --}}

  <link rel="stylesheet" href="{{ asset('admin-assets/css/main.css') }}">

  @stack('styles')

  <title>{{ config('admin.fa-name') . ' | ادمین' . (isset($title) && !empty($title) ? " | $title" : '') }}</title>
</head>

<body>
  <section x-data="toggleSidebar">
    @include('admin.layouts.sidebar')

    <section class="main" :class="open || 'active'">
      @include('admin.layouts.header')
      @yield('content')
    </section>
  </section>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js"></script>
  <script defer src="https://unpkg.com/alpinejs@3.3.4/dist/cdn.min.js"></script>

  {{-- <script src="https://kit.fontawesome.com/f0f0c5351e.js" crossorigin="anonymous"></script> --}}

  {{-- <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script> --}}
  <script src="{{ asset('admin-assets/js/alpineComponents.js') }}"></script>
  <script src="{{ asset('build/assets/app-575acb37.js') }}"></script>
  @include('sweetalert::alert')

  @stack('scripts')
</body>

</html>
