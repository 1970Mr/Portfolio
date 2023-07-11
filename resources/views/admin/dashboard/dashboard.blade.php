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
                      <h6 class="fw-bold mb-0 purecounter" data-purecounter-start="0" data-purecounter-end="18600">1
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
                        16</h6>
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
                        <h6 class="fw-bold mb-0 purecounter" data-purecounter-start="0" data-purecounter-end="126500">20
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
                      <h6 class="fw-bold mb-0 purecounter" data-purecounter-start="0" data-purecounter-end="95600">10
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
                          <th>تصویر</th>
                          <th>نام کاربری</th>
                          <th>کامنت</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <img width="50" class="img-fluid rounded-circle" src="{{ asset('admin/images/4.jpg') }}">
                          </td>
                          <td class="text-muted">
                            لورم ایپسوم
                          </td>
                          <td class="text-muted">
                            لورم ایپسوم متن ساختگی با تولید سادگی
                          </td>
                        </tr>

                        <tr>
                          <td>
                            <img width="50" class="img-fluid rounded-circle" src="{{ asset('admin/images/5.jpg') }}">
                          </td>
                          <td class="text-muted">
                            لورم ایپسوم
                          </td>
                          <td class="text-muted">
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است.
                          </td>
                        </tr>

                        <tr>
                          <td>
                            <img width="50" class="img-fluid rounded-circle" src="{{ asset('admin/images/7.jpg') }}">
                          </td>
                          <td class="text-muted">
                            لورم ایپسوم
                          </td>
                          <td class="text-muted">
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت.
                          </td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            {{-- posts --}}
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
                          <th>تصویر</th>
                          <th>نام کاربری</th>
                          <th>کامنت</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <img width="50" class="img-fluid rounded-circle" src="{{ asset('admin/images/4.jpg') }}">
                          </td>
                          <td class="text-muted">
                            لورم ایپسوم
                          </td>
                          <td class="text-muted">
                            لورم ایپسوم متن ساختگی با تولید سادگی
                          </td>
                        </tr>

                        <tr>
                          <td>
                            <img width="50" class="img-fluid rounded-circle" src="{{ asset('admin/images/5.jpg') }}">
                          </td>
                          <td class="text-muted">
                            لورم ایپسوم
                          </td>
                          <td class="text-muted">
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است.
                          </td>
                        </tr>

                        <tr>
                          <td>
                            <img width="50" class="img-fluid rounded-circle" src="{{ asset('admin/images/7.jpg') }}">
                          </td>
                          <td class="text-muted">
                            لورم ایپسوم
                          </td>
                          <td class="text-muted">
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت.
                          </td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            {{-- progress bar --}}
            <div class="col-xl-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="fw-bold mb-0">آخرین مهارت‌های ثبت شده</h5>
                  </h5>
                  </h5>
                </div>
                <div class="card-body">
                  <div class="card-item">
                    <p class="fs-7 text-muted mt-2">لورم ایپسوم متن ساختگی</p>
                    <div class="progress">
                      <div class="progress-bar progress-bar-striped progress-bar-animated bg-purple" role="progressbar"
                        style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%
                      </div>
                    </div>
                  </div>
                  <div class="card-item">
                    <p class="fs-7 text-muted mt-2">لورم ایپسوم متن ساختگی</p>
                    <div class="progress">
                      <div class="progress-bar progress-bar-striped progress-bar-animated bg-blue" role="progressbar"
                        style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%
                      </div>
                    </div>
                  </div>
                  <div class="card-item">
                    <p class="fs-7 text-muted mt-2">لورم ایپسوم متن ساختگی</p>
                    <div class="progress">
                      <div class="progress-bar progress-bar-striped progress-bar-animated bg-green" role="progressbar"
                        style="width: 66%;" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100">66%
                      </div>
                    </div>
                  </div>
                  <div class="card-item">
                    <p class="fs-7 text-muted mt-2">لورم ایپسوم متن ساختگی</p>
                    <div class="progress">
                      <div class="progress-bar progress-bar-striped progress-bar-animated bg-red" role="progressbar"
                        style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%
                      </div>
                    </div>
                  </div>
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
