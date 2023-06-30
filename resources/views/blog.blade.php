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
      <div class="row" data-masonry='{"percentPosition": true, "originLeft": false}'>
        <!-- Article Starts -->
        @foreach ($blogs as $blog)
        <div class="col-12 col-md-6 col-lg-6 col-xl-4 mb-30">
            <article class="post-container">
              <div class="post-thumb">
                <a href="{{ route('blog.show', ['blog' => $blog->id]) }}" class="d-block position-relative overflow-hidden">
                  <img src="{{ asset($blog->photo['relative_path']) }}" class="img-fluid" alt="Blog Post | {{ $blog->title }}">
                </a>
              </div>
              <div class="post-content">
                <div class="entry-header">
                  <h3><a href="{{ route('blog-post') }}">{{ $blog->title }}</a></h3>
                </div>
                <div class="entry-content open-sans-font">
                  <p>
                    {{ str()->limit($blog->text, 100) }}
                  </p>
                  </p>
                </div>
              </div>
            </article>
          </div>
        @endforeach
        <!-- Article Ends -->
    </div>

  </section>
  <!-- Main Content Ends -->
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
@endpush
