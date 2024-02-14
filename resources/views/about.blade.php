@extends('layouts.app', ['title' => 'درباره من', 'my_class' => 'about'])

@section('content')
  <!-- Page Title Starts -->
  <section class="title-section text-left text-sm-center revealator-slideup revealator-once revealator-delay1">
    <h1>درباره <span>من</span></h1>
    <span class="title-bg">اطلاعات</span>
  </section>
  <!-- Page Title Ends -->
  <!-- Main Content Starts -->
  <section class="main-content revealator-slideup revealator-once revealator-delay1">
    <div class="container">
      <div class="row">
        <!-- Personal Info Starts -->
        <div class="col-12 col-lg-5 col-xl-6">
          <div class="row">
            <div class="col-12">
              <h3 class="text-uppercase custom-title mb-0 ft-wt-600">اطلاعات شخصی</h3>
            </div>
            <div class="col-12 d-block d-sm-none">
              <img src="{{ asset('front/img/img-mobile.jpg') }}" class="img-fluid main-img-mobile" alt="my picture" />
            </div>
            <div class="col-6">
              <ul class="about-list list-unstyled open-sans-font">
                <li> <span class="title">نام :</span> <span
                    class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">{{ $aboutData->name }}</span>
                </li>
                <li> <span class="title">نام خانوادگی :</span> <span
                    class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">{{ $aboutData->family }}</span>
                </li>
                <li> <span class="title">سن :</span> <span
                    class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">{{ $aboutData->age }}</span>
                </li>
                <li> <span class="title">ملیت :</span> <span
                    class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block"
                    style="color: gold">{{ $aboutData->country }}</span>
                </li>
                <li> <span class="title">شغل :</span> <span
                    class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">{{ $aboutData->job }}</span>
                </li>
              </ul>
            </div>
            <div class="col-6">
              <ul class="about-list list-unstyled open-sans-font">
                <li> <span class="title">آدرس :</span> <span
                    class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">{{ $aboutData->address }}</span>
                </li>
                <li> <span class="title">شماره تماس :</span> <span
                    class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">
                    <a href="tel:{{ $aboutData->phone_number }}" dir="ltr">{{ $aboutData->phone_number }}</a>
                  </span> </li>
                <li> <span class="title">ایمیل :</span> <span
                    class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">
                    <a class="email" href="mailto:{{ $aboutData->email }}">{{ $aboutData->email }}</a>
                  </span> </li>
                <li> <span class="title">گیت‌هاب :</span> <span
                    class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">
                    <a target="_blank" href="{{ 'https://github.com/' . $aboutData->github }}">{{ $aboutData->github }}</a>
                  </span> </li>
                <li> <span class="title">زبان :</span> <span
                    class="value d-block d-sm-inline-block d-lg-block d-xl-inline-block">{{ $aboutData->language }}</span>
                </li>
              </ul>
            </div>
            <div class="col-12 mt-3">
              <a class="button" href="{{ route('download', ['file' => base64_encode($aboutData->resume_file['relative_path']) ]) }}">
                <span class="button-text">دانلود رزومه</span>
                <span class="button-icon fa fa-download"></span>
              </a>
            </div>
          </div>
        </div>
        <!-- Personal Info Ends -->
        <!-- Boxes Starts -->
        <div class="col-12 col-lg-7 col-xl-6 mt-5 mt-lg-0">
          <div class="row align-items-center justify-content-center">
            <div class="col-6">
              <div class="box-stats with-margin">
                <h3 class="poppins-font position-relative">{{ $aboutData->experiences }}</h3>
                <p class="open-sans-font m-0 position-relative text-uppercase">سال <span class="d-block">تجربه</span></p>
              </div>
            </div>
            <div class="col-6">
              <div class="box-stats with-margin">
                <h3 class="poppins-font position-relative">{{ $aboutData->projects }}</h3>
                <p class="open-sans-font m-0 position-relative text-uppercase">پروژه<span class="d-block">تکمیل شده</span>
                </p>
              </div>
            </div>
            <div class="col-6">
              <div class="box-stats">
                <h3 class="poppins-font position-relative">{{ $aboutData->awards }}</h3>
                <p class="open-sans-font m-0 position-relative text-uppercase">جایزه <span class="d-block">برنده
                    شده</span></p>
              </div>
            </div>
          </div>
        </div>
        <!-- Boxes Ends -->
      </div>
      <hr class="separator">
      <!-- Skills Starts -->
      <div class="row justify-content-center">
        <div class="col-12">
          <h3 class="text-uppercase pb-4 pb-sm-5 mb-3 mb-sm-0 text-left text-sm-center custom-title ft-wt-600">مهارت های
            من </h3>
        </div>
        @foreach ($skills as $skill)
          <div class="col-6 col-md-3 mb-3 mb-sm-5">
            <div class="c100 p{{ $skill->value }}">
              <span>{{ $skill->value }}%</span>
              <div class="slice">
                <div class="bar"></div>
                <div class="fill"></div>
              </div>
            </div>
            <h6 class="text-uppercase open-sans-font text-center mt-2 mt-sm-4">{{ $skill->name }}</h6>
          </div>
        @endforeach
      </div>
      <!-- Skills Ends -->
      <hr class="separator mt-1">
      <!-- Experience & Education Starts -->
      <div class="row">
        <div class="col-12">
          <h3 class="text-uppercase pb-5 mb-0 text-left text-sm-center custom-title ft-wt-600">تجربه <span>&</span>
            تحصیلات </h3>
        </div>
        <div class="w-100 m-15px-tb">
          <div class="resume-box w-100">
            <ul class="row">
              @foreach ($qualifications as $qualification)
                  <li class="col-lg-6 m-15px-tb">
                      @if ($qualification->type == 'education')
                          <div class="icon">
                              <i class="fa fa-graduation-cap"></i>
                          </div>
                      @else
                          <div class="icon">
                              <i class="fa fa-briefcase"></i>
                          </div>
                      @endif
                    <span class="time open-sans-font text-uppercase">{{ $qualification->period }}</span>
                    <h5 class="poppins-font text-uppercase">{{ $qualification->title }}</h5>
                    <p class="open-sans-font">{{ $qualification->descriptions }}</p>
                  </li>
              @endforeach
            </ul>
          </div>
        </div>

{{--        <div class="col-lg-6 m-15px-tb">--}}
{{--          <div class="resume-box">--}}
{{--            <ul>--}}
{{--              @foreach ($qualifications as $qualification)--}}
{{--                @if ($qualification->type == 'education')--}}
{{--                  <li>--}}
{{--                    <div class="icon">--}}
{{--                      <i class="fa fa-graduation-cap"></i>--}}
{{--                    </div>--}}
{{--                    <span class="time open-sans-font text-uppercase">{{ $qualification->period }}</span>--}}
{{--                    <h5 class="poppins-font text-uppercase">{{ $qualification->title }}</h5>--}}
{{--                    <p class="open-sans-font">{{ $qualification->descriptions }}</p>--}}
{{--                  </li>--}}
{{--                @endif--}}
{{--              @endforeach--}}
{{--            </ul>--}}
{{--          </div>--}}
{{--        </div>--}}
      </div>
      <!-- Experience & Education Ends -->
    </div>
  </section>
  <!-- Main Content Ends -->
@endsection
<x-alert type='error'></x-alert>

@push('styles')
  <style>
    a {
      color: inherit;
    }

    .email {
      font-size: .913rem;
    }
  </style>
@endpush
