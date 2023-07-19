@extends('layouts.app', ['my_class' => 'home'])

@section('content')
  <!-- Main Content Starts -->
  <section class="container-fluid main-container container-home p-0 revealator-slideup revealator-once revealator-delay1">
    <div class="color-block d-none d-lg-block"></div>
    <div class="row home-details-container align-items-center">
      <div class="col-lg-4 bg position-fixed d-none d-lg-block"></div>
      <div class="col-12 col-lg-8 offset-lg-4 home-details text-left text-sm-center text-lg-left">
        <div>
          <img src="{{ asset($homeData->photo['mobile']['relative_path']) }}"
            class="img-fluid main-img-mobile d-none d-sm-block d-lg-none" alt="my picture" />
          <h1 class="text-uppercase poppins-font">{{ $homeData->title }}</h1><span>{{ $homeData->sub_title }}</span></span>
          </h1>
          <p class="open-sans-font">{{ $homeData->description }}</p>
          <a class="button" href="{{ route('about') }}">
            <span class="button-text">اطلاعات بیشتر درباره من...</span>
            <span class="button-icon fa fa-arrow-left"></span>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- Main Content Ends -->
@endsection

@push('styles')
  <style>
    .home .bg {
      background-image: url({{ asset($homeData->photo['relative_path']) }});
    }

    .main-img-mobile {
      object-fit: cover;
    }
  </style>
@endpush
