@extends('admin.layouts.app', ['title' => 'داشبورد'])

@section('content')
  <div class="content p-2 p-lg-4">
    <div class="container-fluid">
      <div class="row gy-4">
        <div class="col-xl-12">
          {{-- Stats --}}
          <div class="row g-3">
            <div class="col-6 col-xl-3">
              <div class="card">
                <div class="card-body">
                  <div class="row g-3">
                    <div class="col-md-4">
                      <div class="stats-icon bg-purple">
                        <i class="bi bi-wrench-adjustable-circle mt-1"></i>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <h6 class="fs-7 text-muted">تعداد مهارت‌ها</h6>
                      </h6>
                      <h6 class="fw-bold mb-0 purecounter" data-purecounter-start="0" data-purecounter-end="18600">
                        {{ $skills['count'] }}
                      </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-6 col-xl-3">
              <div class="card">
                <div class="card-body">
                  <div class="row g-3">
                    <div class="col-md-4">
                      <div class="stats-icon bg-red">
                        <i class="bi bi-diagram-3"></i>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <h6 class="fs-7 text-muted">تعداد نمونه کارها</h6>
                      <h6 class="fw-bold mb-0 purecounter" data-purecounter-start="0" data-purecounter-end="452">
                        {{ $portfolios['count'] }}
                      </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-6 col-xl-3">
              <div class="card">
                <div class="card-body">
                  <div class="row g-3">
                    <div class="col-md-4">
                      <div class="stats-icon bg-blue">
                        <i class="bi bi-file-earmark-richtext mt-1"></i>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <h6 class="fs-7 text-muted">تعداد مقالات</h6>
                      </h6>
                      <h6 class="fw-bold mb-0 purecounter" data-purecounter-start="0" data-purecounter-end="126500">
                        {{ $blogs['count'] }}
                      </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-6 col-xl-3">
              <div class="card">
                <div class="card-body">
                  <div class="row g-3">
                    <div class="col-md-4">
                      <div class="stats-icon bg-green">
                        <i class="bi bi-envelope mt-1"></i>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <h6 class="fs-7 text-muted">تعداد پیام‌ها</h6>
                      </h6>
                      <h6 class="fw-bold mb-0 purecounter" data-purecounter-start="0" data-purecounter-end="95600">
                        {{ $messages['count'] }}
                      </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row g-3 mt-4">
            {{-- contact --}}
            <div class="col-xl-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="fw-bold mb-0">آخرین پیام‌های دریافت شده</h5>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover align-middle">
                      <thead>
                        <tr>
                          <th>نام</th>
                          <th>ایمیل</th>
                          <th>موضوع</th>
                          <th>پیام</th>
                          <th>وضعیت خواندن</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($messages['lastFiveData'] as $message)
                          <tr>
                            <td class="text-muted">{{ $message->name }}</td>
                            <td class="text-muted">{{ $message->email }}</td>
                            <td class="text-muted">{{ $message->subject }}</td>
                            <td class="text-muted" style="min-width: 12rem;">
                              {{ Illuminate\Support\Str::limit($message->message, 40) }}</td>
                            <td class="text-muted text-center text-md-start" style="min-width: 7.2rem;">
                              {{ $message->is_read }}
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            {{-- blogs --}}
            <div class="col-xl-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="fw-bold mb-0">آخرین مقالات</h5>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover align-middle">
                      <thead>
                        <tr>
                          <th>عنوان</th>
                          <th>متن</th>
                          <th>نویسنده</th>
                          <th style="min-width: 6rem">کلمات کلیدی</th>
                          <th>تصویر</th>
                          <th>وضعیت</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($blogs['lastFiveData'] as $blog)
                          <tr>
                            <td class="text-muted">{{ $blog->title }}</td>
                            <td class="text-muted" style="min-width: 12rem">{{ str()->limit($blog->text, 40) }}</td>
                            <td class="text-muted">{{ $blog->author }}</td>
                            <td class="text-muted">{{ $blog->keywords }}</td>
                            <td class="text-muted">{{ $blog->photo['relative_path'] }}</td>
                            <td class="text-muted">{{ $blog->status }}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            {{-- portfolios --}}
            <div class="col-xl-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="fw-bold mb-0">آخرین نمونه کارها</h5>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover align-middle">
                      <thead>
                        <tr>
                          <th>عنوان</th>
                          <th style="min-width: 5rem">نوع پروژه</th>
                          <th>مشتری</th>
                          <th>لینک پروژه</th>
                          <th>تکنولوژی</th>
                          <th style="min-width: 77px;">نوع رسانه</th>
                          <th>تصویر شاخص</th>
                          <th>وضعیت</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($portfolios['lastFiveData'] as $portfolio)
                          <tr>
                            <td class="text-muted">{{ $portfolio->title }}</td>
                            <td class="text-muted">{{ $portfolio->project_type }}</td>
                            <td class="text-muted">{{ $portfolio->customer }}</td>
                            <td class="text-muted">{{ $portfolio->link }}</td>
                            <td class="text-muted">{{ $portfolio->technology }}</td>
                            <td class="text-muted">{{ $portfolio->media_type }}</td>
                            <td class="text-muted">{{ $portfolio->featured_image['relative_path'] }}</td>
                            <td class="text-muted">{{ $portfolio->status }}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            {{-- skills with progress bar --}}
            <div class="col-xl-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="fw-bold mb-0">آخرین مهارت‌های ثبت شده</h5>
                  </h5>
                  </h5>
                </div>
                <div class="card-body">
                  @foreach ($skills['lastFiveData'] as $skill)
                    <div class="card-item">
                      <p class="fs-7 text-muted mt-2">{{ $skill->name }}</p>
                      <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-info"
                          role="progressbar" style="width: {{ $skill->value }}%;" aria-valuenow="{{ $skill->value }}"
                          aria-valuemin="0" aria-valuemax="100">
                          {{ $skill->value }}%
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('styles')
  <style>
    .card-item {
      border-bottom: 2px solid gray;
      padding-bottom: 1rem;
      margin-bottom: .9rem;
    }

    .card-item:nth-last-child(1) {
      border-bottom: none;
      padding-bottom: 0;
      margin-bottom: 0;
    }

    .progress {
      height: 1.5rem;
      font-size: 1rem;
    }
  </style>
@endpush
