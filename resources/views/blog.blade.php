@extends('layouts.app', ['title' => 'مقالات', 'my_class' => 'blog'])

@section('content')
  <!-- Page Title Starts -->
  <section class="title-section text-left text-sm-center revealator-slideup revealator-once revealator-delay1">
    <h1>مقالات <span>من</span></h1>
    <span class="title-bg">مقالات</span>
  </section>
  <!-- Page Title Ends -->
  <!-- Main Content Starts -->
  <section class="main-content revealator-slideup revealator-once revealator-delay1">
    <div class="container">
      <!-- Articles Starts -->
      <div class="row">
        <!-- Article Starts -->
        <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
          <article class="post-container">
            <div class="post-thumb">
              <a href="{{ route('blog-post') }}" class="d-block position-relative overflow-hidden">
                <img src="{{ asset('front/img/blog/blog-post-1.jpg') }}" class="img-fluid" alt="Blog Post">
              </a>
            </div>
            <div class="post-content">
              <div class="entry-header">
                <h3><a href="{{ route('blog-post') }}">چگونه می توان با ایجاد یک لیست ایمیل مخاطبان خود را مالک کرد</a></h3>
              </div>
              <div class="entry-content open-sans-font">
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                  از صنعت چاپ...
                </p>
              </div>
            </div>
          </article>
        </div>
        <!-- Article Ends -->
        <!-- Article Starts -->
        <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
          <article class="post-container">
            <div class="post-thumb">
              <a href="{{ route('blog-post') }}" class="d-block position-relative overflow-hidden">
                <img src="{{ asset('front/img/blog/blog-post-2.jpg') }}" class="img-fluid" alt="">
              </a>
            </div>
            <div class="post-content">
              <div class="entry-header">
                <h3><a href="{{ route('blog-post') }}">چگونه می توان با ایجاد یک لیست ایمیل مخاطبان خود را مالک کرد</a></h3>
              </div>
              <div class="entry-content open-sans-font">
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                  از صنعت چاپ...
                </p>
              </div>
            </div>
          </article>
        </div>
        <!-- Article Ends -->
        <!-- Article Starts -->
        <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
          <article class="post-container">
            <div class="post-thumb">
              <a href="{{ route('blog-post') }}" class="d-block position-relative overflow-hidden">
                <img src="{{ asset('front/img/blog/blog-post-3.jpg') }}" class="img-fluid" alt="">
              </a>
            </div>
            <div class="post-content">
              <div class="entry-header">
                <h3><a href="{{ route('blog-post') }}">چگونه می توان با ایجاد یک لیست ایمیل مخاطبان خود را مالک کرد</a></h3>
              </div>
              <div class="entry-content open-sans-font">
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                  از صنعت چاپ...
                </p>
              </div>
            </div>
          </article>
        </div>
        <!-- Article Ends -->
        <!-- Article Starts -->
        <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
          <article class="post-container">
            <div class="post-thumb">
              <a href="{{ route('blog-post') }}" class="d-block position-relative overflow-hidden">
                <img src="{{ asset('front/img/blog/blog-post-4.jpg') }}" class="img-fluid" alt="">
              </a>
            </div>
            <div class="post-content">
              <div class="entry-header">
                <h3><a href="{{ route('blog-post') }}">چگونه می توان با ایجاد یک لیست ایمیل مخاطبان خود را مالک کرد</a></h3>
              </div>
              <div class="entry-content open-sans-font">
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                  از صنعت چاپ...
                </p>
              </div>
            </div>
          </article>
        </div>
        <!-- Article Ends -->
        <!-- Article Starts -->
        <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
          <article class="post-container">
            <div class="post-thumb">
              <a href="{{ route('blog-post') }}" class="d-block position-relative overflow-hidden">
                <img src="{{ asset('front/img/blog/blog-post-5.jpg') }}" class="img-fluid" alt="">
              </a>
            </div>
            <div class="post-content">
              <div class="entry-header">
                <h3><a href="{{ route('blog-post') }}">چگونه می توان با ایجاد یک لیست ایمیل مخاطبان خود را مالک کرد</a></h3>
              </div>
              <div class="entry-content open-sans-font">
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                  از صنعت چاپ...
                </p>
              </div>
            </div>
          </article>
        </div>
        <!-- Article Ends -->
        <!-- Article Starts -->
        <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
          <article class="post-container">
            <div class="post-thumb">
              <a href="{{ route('blog-post') }}" class="d-block position-relative overflow-hidden">
                <img src="{{ asset('front/img/blog/blog-post-6.jpg') }}" class="img-fluid" alt="">
              </a>
            </div>
            <div class="post-content">
              <div class="entry-header">
                <h3><a href="{{ route('blog-post') }}">چگونه می توان با ایجاد یک لیست ایمیل مخاطبان خود را مالک کرد</a></h3>
              </div>
              <div class="entry-content open-sans-font">
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                  از صنعت چاپ...
                </p>
              </div>
            </div>
          </article>
        </div>
        <!-- Article Ends -->
        <!-- Pagination Starts -->
        <div class="col-12 mt-4">
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center mb-0">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>

                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
            </ul>
          </nav>
        </div>
        <!-- Pagination Ends -->
      </div>
      <!-- Articles Ends -->
    </div>

  </section>
  <!-- Main Content Ends -->
@endsection
