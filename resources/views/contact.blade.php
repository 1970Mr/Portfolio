@extends('layouts.app', ['title' => 'ارتباط با من', 'my_class' => 'contact'])

@php
  $socials = ['telegram', 'instagram', 'twitter', 'youtube', 'facebook', 'linkedin', 'github'];

  $inputs = [['name' => 'name', 'title' => 'نام', 'type' => 'text'], ['name' => 'email', 'title' => 'ایمیل', 'type' => 'email'], ['name' => 'subject', 'title' => 'موضوع', 'type' => 'text']];
@endphp

@section('content')
  <!-- Page Title Starts -->
  <section class="title-section text-left text-sm-center revealator-slideup revealator-once revealator-delay1">
    <h1>ارتباط <span>با من</span></h1>
    <span class="title-bg">ارتباط</span>
  </section>
  <!-- Page Title Ends -->
  <!-- Main Content Starts -->
  <section class="main-content revealator-slideup revealator-once revealator-delay1">
    <div class="container">
      <div class="row">
        <!-- Left Side Starts -->
        <div class="col-12 col-lg-4">
          <h3 class="text-uppercase custom-title mb-0 ft-wt-600 pb-3">{{ $contact->title }}</h3>
          <p class="open-sans-font mb-3 description">{{ $contact->description }}</p>
          <p class="open-sans-font custom-span-contact position-relative">
            <i class="fa fa-envelope-open position-absolute"></i>
            <span class="d-block">ایمیل من</span>
            <a class="text-white" href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
          </p>
          <p class="open-sans-font custom-span-contact position-relative">
            <i class="fa fa-phone-square position-absolute"></i>
            <span class="d-block">تلفن من</span>
            <a class="text-white" href="tel:{{ $contact->phone_number }}" dir="ltr">{{ $contact->phone_number }}</a>
          </p>
          <ul class="social list-unstyled pt-1 mb-5 d-flex">

            @foreach ($socials as $social)
              @if ($contact->{$social})
                <li>
                  <a target="_blank" title="{{ $social }}" href="{{ $contact->{$social} }}">
                    <i class="fa fa-{{ $social }}"></i>
                  </a>
                </li>
              @endif
            @endforeach
            {{-- <li class="telegram"><a title="Telegram" href="#"><i class="fa fa-telegram"></i></a></li>
            <li class="instagram"><a title="Instagram" href="#"><i class="fa fa-instagram"></i></a></li>
            <li class="twitter"><a title="Twitter" href="#"><i class="fa fa-twitter"></i></a></li>
            <li class="youtube"><a title="Youtube" href="#"><i class="fa fa-youtube"></i></a></li>
            <li class="facebook"><a title="Facebook" href="#"><i class="fa fa-facebook"></i></a></li>
            <li class="linkedin"><a title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
            <li class="github"><a title="Github" href="#"><i class="fa fa-github"></i></a></li> --}}
          </ul>
        </div>
        <!-- Left Side Ends -->
        <!-- Contact Form Starts -->
        <div class="col-12 col-lg-8">
          <form class="contactform" method="post" action="{{ route('admin.panel.contact.messages.store') }}">
            @csrf
            <div class="contactform">
              <div class="row">
                @foreach ($inputs as $input)
                  <div class="col-12 col-md-4 mb-4">
                    <input type="{{ $input['type'] }}" name="{{ $input['name'] }}" value="{{ old($input['name']) }}"
                      placeholder="{{ $input['title'] }}">
                    @error($input['name'])
                      <div class="text-danger small">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                @endforeach

                <div class="col-12">
                  <textarea name="message" placeholder="پیام شما">{{ old('message') }}</textarea>
                  @error('message')
                    <div class="text-danger small">
                      {{ $message }}
                    </div>
                  @enderror

                  <button type="submit" class="button mt-4">
                    <span class="button-text">ارسال پیام</span>
                    <span class="button-icon fa fa-send"></span>
                  </button>
                </div>
                {{-- <div class="col-12 form-message">
                  <span class="output_message text-center font-weight-600 text-uppercase"></span>
                </div> --}}
              </div>
            </div>
          </form>
        </div>
        <!-- Contact Form Ends -->
      </div>
    </div>

  </section>
  <!-- Main Content Ends -->
@endsection
<x-alert type='success'></x-alert>
<x-alert type='error'></x-alert>

@push('styles')
  <style>
    p.description {
      white-space: pre-wrap;
      line-height: 1.6rem;
    }

    form .row {
      padding-top: 2.6rem;
    }

    textarea {
      height: 200px !important;
    }

    .small{
        font-size: 85%;
    }

  </style>
@endpush
