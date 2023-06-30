@extends('layouts.app', ['title' => 'مقاله', 'my_class' => 'blog-post'])

@section('content')
  <!-- Page Title Starts -->
  <section class="title-section text-left text-sm-center revealator-slideup revealator-once revealator-delay1">
    <h1>مقاله <span>من</span></h1>
    <span class="title-bg">مقاله</span>
  </section>
  <!-- Page Title Ends -->
  <!-- Main Content Starts -->
  <section class="main-content revealator-slideup revealator-once revealator-delay1">
    <div class="container">
      <div class="row">
        <!-- Article Starts -->
        <article class="col-12">
          <!-- Meta Starts -->
          <div class="meta open-sans-font">
            <span class="d-inline-block"><i class="fa fa-user"></i>{{ $blog->author }}</span>
            {{-- <span class="date"><i class="fa fa-calendar"></i> 17 اردیبهشت 1400</span> --}}
            <span class="date d-inline-block"><i class="fa fa-calendar"></i>{{ jdate()->forge($blog->created_at)->format('%d %B %Y') }}</span>
            <span class="d-inline-block"><i class="fa fa-tags"></i>{{ $blog->keywords }}</span>
          </div>
          <!-- Meta Ends -->
          <!-- Article Content Starts -->
          <h1 class="text-uppercase text-capitalize">{{ $blog->title }}</h1>
          <img src="{{ asset($blog->photo['relative_path']) }}" class="img-fluid" alt="Blog image | {{ $blog->title }}" />
          <div class="blog-excerpt open-sans-font pb-5">
            {{ $blog->text }}
          </div>
          <!-- Article Content Ends -->
        </article>
        <!-- Article Ends -->
      </div>
    </div>
  </section>
  <!-- Main Content Ends -->
@endsection
