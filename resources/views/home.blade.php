@extends('layouts.app', ['my_class' => 'home'])

@section('content')
  <!-- Main Content Starts -->
  <section class="container-fluid main-container container-home p-0 revealator-slideup revealator-once revealator-delay1">
    <div class="color-block d-none d-lg-block"></div>
    <div class="row home-details-container align-items-center">
      <div class="col-lg-4 bg position-fixed d-none d-lg-block"></div>
      <div class="col-12 col-lg-8 offset-lg-4 home-details text-left text-sm-center text-lg-left">
        <div>
          <img src="{{ asset('front/img/img-mobile.jpg') }}" class="img-fluid main-img-mobile d-none d-sm-block d-lg-none"
            alt="my picture" />
          <h1 class="text-uppercase poppins-font">من استیو میلنر هستم<span>طراح سایت</span></h1>
          <p class="open-sans-font">من یک طراح وب و توسعه دهنده مقدماتی تونسی هستم و در ساخت تجربه های
            دوستانه و تمیز و کاربر پسند تمرکز دارم ، من علاقه زیادی به ساخت نرم افزار عالی دارم که زندگی
            اطرافیانم را بهبود می بخشد.</p>
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
