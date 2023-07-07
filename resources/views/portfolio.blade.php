@extends('layouts.app', ['title' => 'نمونه کار', 'my_class' => 'portfolio'])

@section('content')
  <!-- Page Title Starts -->
  <section class="title-section text-left text-sm-center revealator-slideup revealator-once revealator-delay1">
    <h1>
      نمونه کارهای
      <span>
        من
      </span>
    </h1>
    <span class="title-bg">نمونه کار</span>
  </section>
  <!-- Page Title Ends -->
  <!-- Main Content Starts -->
  <section class="main-content text-center revealator-slideup revealator-once revealator-delay1">
    <div id="grid-gallery" class="container grid-gallery">
      <!-- Portfolio Grid Starts -->
      <section class="grid-wrap">
        <ul class="row grid">
          <!-- Portfolio Item Starts -->
          <li>
            <figure>
              <img src="{{ asset('front/img/projects/project-1.jpg') }}" alt="Portolio Image" />
              <div><span>تصویر پروژه</span></div>
            </figure>
          </li>
          <!-- Portfolio Item Ends -->
          <!-- Portfolio Item Starts -->
          <li>
            <figure>
              <img src="{{ asset('front/img/projects/project-2.jpg') }}" alt="Portolio Image" />
              <div><span>ویدئو پروژه</span></div>
            </figure>
          </li>
          <!-- Portfolio Item Ends -->
          <!-- Portfolio Item Starts -->
          <li>
            <figure>
              <img src="{{ asset('front/img/projects/project-3.jpg') }}" alt="Portolio Image" />
              <div><span>اسلایدر پروژه</span></div>
            </figure>
          </li>
          <!-- Portfolio Item Ends -->
          <!-- Portfolio Item Starts -->
          <li>
            <figure>
              <img src="{{ asset('front/img/projects/project-4.jpg') }}" alt="Portolio Image" />
              <div><span>ویدئو پروژه (داخلی)</span></div>
            </figure>
          </li>
          <!-- Portfolio Item Ends -->
          <!-- Portfolio Item Starts -->
          <li>
            <figure>
              <img src="{{ asset('front/img/projects/project-5.jpg') }}" alt="Portolio Image" />
              <div><span>تصویر پروژه </span></div>
            </figure>
          </li>
          <!-- Portfolio Item Ends -->
          <!-- Portfolio Item Starts -->
          <li>
            <figure>
              <img src="{{ asset('front/img/projects/project-6.jpg') }}" alt="Portolio Image" />
              <div><span>تصویر پروژه </span></div>
            </figure>
          </li>
          <!-- Portfolio Item Ends -->
          <!-- Portfolio Item Starts -->
          <li>
            <figure>
              <img src="{{ asset('front/img/projects/project-7.jpg') }}" alt="Portolio Image" />
              <div><span>تصویر پروژه </span></div>
            </figure>
          </li>
          <!-- Portfolio Item Ends -->
          <!-- Portfolio Item Starts -->
          <li>
            <figure>
              <img src="{{ asset('front/img/projects/project-8.jpg') }}" alt="Portolio Image" />
              <div><span>تصویر پروژه </span></div>
            </figure>
          </li>
          <!-- Portfolio Item Ends -->
          <!-- Portfolio Item Starts -->
          <li>
            <figure>
              <img src="{{ asset('front/img/projects/project-9.jpg') }}" alt="Portolio Image" />
              <div><span>تصویر پروژه </span></div>
            </figure>
          </li>
          <!-- Portfolio Item Ends -->
        </ul>
      </section>
      <!-- Portfolio Grid Ends -->
      <!-- Portfolio Details Starts -->
      <section class="slideshow">
        <ul>
          <!-- Portfolio Item Detail Starts -->
          <li>
            <figure>
              <!-- Project Details Starts -->
              <figcaption>
                <h3>تصویر پروژه </h3>
                <div class="row open-sans-font">
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-file-text-o pr-2"></i><span class="project-label">پروژه </span>: <span
                      class="ft-wt-600 uppercase">وبسایت</span>
                  </div>
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-user-o pr-2"></i><span class="project-label">مشتری</span>: <span
                      class="ft-wt-600 uppercase">راستچین </span>
                  </div>
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-code pr-2"></i><span class="project-label">زبان </span>: <span
                      class="ft-wt-600 uppercase">HTML, CSS, Javascript</span>
                  </div>
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-external-link pr-2"></i><span class="project-label">مشاهده سایت </span>: <span
                      class="ft-wt-600 uppercase"><a href="#" target="_blank">www.rtltheme.com</a></span>
                  </div>
                </div>
              </figcaption>
              <!-- Project Details Ends -->
              <!-- Main Project Content Starts -->
              <img src="{{ asset('front/img/projects/project-1.jpg') }}" alt="Portolio Image" />
              <!-- Main Project Content Ends -->
            </figure>
          </li>
          <!-- Portfolio Item Detail Ends -->
          <!-- Portfolio Item Detail Starts -->
          <li>
            <figure>
              <!-- Project Details Starts -->
              <figcaption>
                <h3>فیلم پروژه </h3>
                <div class="row open-sans-font">
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-file-text-o pr-2"></i><span class="project-label">پروژه </span>: <span
                      class="ft-wt-600 uppercase">وبسایت</span>
                  </div>
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-user-o pr-2"></i><span class="project-label">مشتری</span>: <span
                      class="ft-wt-600 uppercase">راستچین </span>
                  </div>
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-code pr-2"></i><span class="project-label">زبان </span>: <span
                      class="ft-wt-600 uppercase">HTML, CSS, Javascript</span>
                  </div>
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-external-link pr-2"></i><span class="project-label">مشاهده سایت </span>: <span
                      class="ft-wt-600 uppercase"><a href="#" target="_blank">www.rtltheme.com</a></span>
                  </div>
                </div>
              </figcaption>
              <!-- Project Details Ends -->
              <!-- Main Project Content Starts -->
              <div class="videocontainer">
                <!--                            <iframe  src="https://www.youtube.com/embed/7e90gBu4pas?enablejsapi=1&version=3&playerapiid=ytplayer" allowfullscreen></iframe>-->


                <div class="h_iframe-aparat_embed_frame"><span style="display: block;padding-top: 57%"></span><iframe
                    class="{{-- youtube-video --}}aparat-video" src="https://www.aparat.com/video/video/embed/videohash/2Gnzw/vt/frame"
                    title="ستین شاپ | روش های ارسال" allowFullScreen="true" webkitallowfullscreen="true"
                    mozallowfullscreen="true"></iframe></div>
              </div>
              <!-- Main Project Content Ends -->
            </figure>
          </li>
          <!-- Portfolio Item Detail Ends -->
          <!-- Portfolio Item Detail Starts -->
          <li>
            <figure>
              <!-- Project Details Starts -->
              <figcaption>
                <h3>اسلایدر پروژه </h3>
                <div class="row open-sans-font">
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-file-text-o pr-2"></i><span class="project-label">پروژه </span>: <span
                      class="ft-wt-600 uppercase">وبسایت</span>
                  </div>
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-user-o pr-2"></i><span class="project-label">مشتری</span>: <span
                      class="ft-wt-600 uppercase">راستچین </span>
                  </div>
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-code pr-2"></i><span class="project-label">زبان </span>: <span
                      class="ft-wt-600 uppercase">HTML, CSS, Javascript</span>
                  </div>
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-external-link pr-2"></i><span class="project-label">مشاهده سایت </span>: <span
                      class="ft-wt-600 uppercase"><a href="#" target="_blank">www.rtltheme.com</a></span>
                  </div>
                </div>
              </figcaption>
              <!-- Project Details Ends -->
              <!-- Main Project Content Starts -->
              <div id="slider" class="carousel slide portfolio-slider" data-ride="carousel" data-interval="false">
                <ol class="carousel-indicators">
                  <li data-target="#slider" data-slide-to="0" class="active"></li>
                  <li data-target="#slider" data-slide-to="1"></li>
                  <li data-target="#slider" data-slide-to="2"></li>
                </ol>
                <!-- The slideshow -->
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{ asset('front/img/projects/project-3.jpg') }}" alt="slide 1">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('front/img/projects/project-2.jpg') }}" alt="slide 2">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('front/img/projects/project-1.jpg') }}" alt="slide 3">
                  </div>
                </div>
              </div>
              <!-- Main Project Content Ends -->
            </figure>
          </li>
          <!-- Portfolio Item Detail Ends -->
          <!-- Portfolio Item Detail Starts -->
          <li>
            <figure>
              <!-- Project Details Starts -->
              <figcaption>
                <h3>فیلم پروژه</h3>
                <div class="row open-sans-font">
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-file-text-o pr-2"></i><span class="project-label">پروژه </span>: <span
                      class="ft-wt-600 uppercase">وبسایت</span>
                  </div>
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-user-o pr-2"></i><span class="project-label">مشتری</span>: <span
                      class="ft-wt-600 uppercase">راستچین </span>
                  </div>
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-code pr-2"></i><span class="project-label">زبان </span>: <span
                      class="ft-wt-600 uppercase">HTML, CSS, Javascript</span>
                  </div>
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-external-link pr-2"></i><span class="project-label">مشاهده سایت </span>: <span
                      class="ft-wt-600 uppercase"><a href="#" target="_blank">www.rtltheme.com</a></span>
                  </div>
                </div>
              </figcaption>
              <!-- Project Details Ends -->
              <!-- Main Project Content Starts -->
              <video id="video" class="responsive-video" controls
                poster="{{ asset('front/img/projects/project-1.jpg') }}">
                <source src="{{ asset('front/img/projects/video.mp4') }}" type="video/mp4">
              </video>
              <!-- Main Project Content Ends -->
            </figure>
          </li>
          <!-- Portfolio Item Detail Ends -->
          <!-- Portfolio Item Detail Starts -->
          <li>
            <figure>
              <!-- Project Details Starts -->
              <figcaption>
                <h3>تصویر </h3>
                <div class="row open-sans-font">
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-file-text-o pr-2"></i><span class="project-label">پروژه </span>: <span
                      class="ft-wt-600 uppercase">وبسایت</span>
                  </div>
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-user-o pr-2"></i><span class="project-label">مشتری</span>: <span
                      class="ft-wt-600 uppercase">راستچین </span>
                  </div>
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-code pr-2"></i><span class="project-label">زبان </span>: <span
                      class="ft-wt-600 uppercase">HTML, CSS, Javascript</span>
                  </div>
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-external-link pr-2"></i><span class="project-label">مشاهده سایت </span>: <span
                      class="ft-wt-600 uppercase"><a href="#" target="_blank">www.rtltheme.com</a></span>
                  </div>
                </div>
              </figcaption>
              <!-- Project Details Ends -->
              <!-- Main Project Content Starts -->
              <img src="{{ asset('front/img/projects/project-5.jpg') }}" alt="Portolio Image" />
              <!-- Main Project Content Ends -->
            </figure>
          </li>
          <!-- Portfolio Item Detail Ends -->
          <!-- Portfolio Item Detail Starts -->
          <li>
            <figure>
              <!-- Project Details Starts -->
              <figcaption>
                <h3>تصویر</h3>
                <div class="row open-sans-font">
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-file-text-o pr-2"></i><span class="project-label">پروژه </span>: <span
                      class="ft-wt-600 uppercase">وبسایت</span>
                  </div>
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-user-o pr-2"></i><span class="project-label">مشتری</span>: <span
                      class="ft-wt-600 uppercase">راستچین </span>
                  </div>
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-code pr-2"></i><span class="project-label">زبان </span>: <span
                      class="ft-wt-600 uppercase">HTML, CSS, Javascript</span>
                  </div>
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-external-link pr-2"></i><span class="project-label">مشاهده سایت </span>: <span
                      class="ft-wt-600 uppercase"><a href="#" target="_blank">www.rtltheme.com</a></span>
                  </div>
                </div>
              </figcaption>
              <!-- Project Details Ends -->
              <!-- Main Project Content Starts -->
              <img src="{{ asset('front/img/projects/project-6.jpg') }}" alt="Portolio Image" />
              <!-- Main Project Content Ends -->
            </figure>
          </li>
          <!-- Portfolio Item Detail Ends -->
          <!-- Portfolio Item Detail Starts -->
          <li>
            <figure>
              <!-- Project Details Starts -->
              <figcaption>
                <h3>تصویر </h3>
                <div class="row open-sans-font">
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-file-text-o pr-2"></i><span class="project-label">پروژه </span>: <span
                      class="ft-wt-600 uppercase">وبسایت</span>
                  </div>
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-user-o pr-2"></i><span class="project-label">مشتری</span>: <span
                      class="ft-wt-600 uppercase">راستچین </span>
                  </div>
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-code pr-2"></i><span class="project-label">زبان </span>: <span
                      class="ft-wt-600 uppercase">HTML, CSS, Javascript</span>
                  </div>
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-external-link pr-2"></i><span class="project-label">مشاهده سایت </span>: <span
                      class="ft-wt-600 uppercase"><a href="#" target="_blank">www.rtltheme.com</a></span>
                  </div>
                </div>
              </figcaption>
              <!-- Project Details Ends -->
              <!-- Main Project Content Starts -->
              <img src="{{ asset('front/img/projects/project-7.jpg') }}" alt="Portolio Image" />
              <!-- Main Project Content Ends -->
            </figure>
          </li>
          <!-- Portfolio Item Detail Ends -->
          <!-- Portfolio Item Detail Starts -->
          <li>
            <figure>
              <!-- Project Details Starts -->
              <figcaption>
                <h3>تصویر </h3>
                <div class="row open-sans-font">
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-file-text-o pr-2"></i><span class="project-label">پروژه </span>: <span
                      class="ft-wt-600 uppercase">وبسایت</span>
                  </div>
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-user-o pr-2"></i><span class="project-label">مشتری</span>: <span
                      class="ft-wt-600 uppercase">راستچین </span>
                  </div>
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-code pr-2"></i><span class="project-label">زبان </span>: <span
                      class="ft-wt-600 uppercase">HTML, CSS, Javascript</span>
                  </div>
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-external-link pr-2"></i><span class="project-label">مشاهده سایت </span>: <span
                      class="ft-wt-600 uppercase"><a href="#" target="_blank">www.rtltheme.com</a></span>
                  </div>
                </div>
              </figcaption>
              <!-- Project Details Ends -->
              <!-- Main Project Content Starts -->
              <img src="{{ asset('front/img/projects/project-8.jpg') }}" alt="Portolio Image" />
              <!-- Main Project Content Ends -->
            </figure>
          </li>
          <!-- Portfolio Item Detail Ends -->
          <!-- Portfolio Item Detail Starts -->
          <li>
            <figure>
              <!-- Project Details Starts -->
              <figcaption>
                <h3>تصویر </h3>
                <div class="row open-sans-font">
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-file-text-o pr-2"></i><span class="project-label">پروژه </span>: <span
                      class="ft-wt-600 uppercase">وبسایت</span>
                  </div>
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-user-o pr-2"></i><span class="project-label">مشتری</span>: <span
                      class="ft-wt-600 uppercase">راستچین </span>
                  </div>
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-code pr-2"></i><span class="project-label">زبان </span>: <span
                      class="ft-wt-600 uppercase">HTML, CSS, Javascript</span>
                  </div>
                  <div class="col-12 col-sm-6 mb-2">
                    <i class="fa fa-external-link pr-2"></i><span class="project-label">مشاهده سایت </span>: <span
                      class="ft-wt-600 uppercase"><a href="#" target="_blank">www.rtltheme.com</a></span>
                  </div>
                </div>
              </figcaption>
              <!-- Project Details Ends -->
              <!-- Main Project Content Starts -->
              <img src="{{ asset('front/img/projects/project-9.jpg') }}" alt="Portolio Image" />
              <!-- Main Project Content Ends -->
            </figure>
          </li>
          <!-- Portfolio Item Detail Ends -->
        </ul>
        <!-- Portfolio Navigation Starts -->
        <nav>
          <span class="icon nav-prev"><img src="{{ asset('front/img/projects/navigation/right-arrow.png') }}"
              alt="previous"></span>
          <span class="icon nav-next"><img src="{{ asset('front/img/projects/navigation/left-arrow.png') }}"
              alt="next"></span>
          <span class="nav-close"><img src="{{ asset('front/img/projects/navigation/close-button.png') }}"
              alt="close"> </span>
        </nav>
        <!-- Portfolio Navigation Ends -->
      </section>
    </div>
  </section>
  <!-- Main Content Ends -->
@endsection

@push('styles')
  <style>
    .h_iframe-aparat_embed_frame {
      position: relative;
    }

    .h_iframe-aparat_embed_frame .ratio {
      display: block;
      width: 100%;
      height: auto;
    }

    .h_iframe-aparat_embed_frame iframe {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }
  </style>
@endpush
