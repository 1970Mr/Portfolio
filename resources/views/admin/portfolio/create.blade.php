@extends('admin.layouts.app', ['title' => 'نمونه کار | ایجاد'])

@php
  $inputs = [['name' => 'title', 'title' => 'عنوان', 'type' => 'text'], ['name' => 'project_type', 'title' => 'نوع پروژه', 'type' => 'text'], ['name' => 'customer', 'title' => 'مشتری', 'type' => 'text'], ['name' => 'link', 'title' => 'لینک پروژه', 'type' => 'text'], ['name' => 'technology', 'title' => 'تکنولوژی', 'type' => 'text']];
@endphp

@section('content')
  <div class="content p-2 p-lg-4">
    <div class="container-fluid">
      <div class="row">
        <x-breadcrumbs :routes="[
            'پنل ادمین' => route('admin.panel.dashboard'),
            'نمونه کار' => route('admin.panel.portfolio'),
            'ایجاد' => '',
        ]"></x-breadcrumbs>
      </div>

      <div class="row">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <h3>ایجاد نمونه کار</h3>
            <a class="btn btn-light-primary" href="{{ route('admin.panel.portfolio') }}">
              بازگشت
              <i class="bi bi-arrow-90deg-left"></i>
            </a>
          </div>


          <div class="card-body">
            <form action="{{ route('admin.panel.portfolio.store') }}" class="row justify-content-center" method="post">
              @csrf
              @foreach ($inputs as $item)
                <div class="mb-3 col-6">
                  <label for="{{ $item['name'] }}" class="form-label">{{ $item['title'] }}</label>
                  <input type="{{ $item['type'] }}" name="{{ $item['name'] }}" class="form-control"
                    id="{{ $item['name'] }}" value="{{ old($item['name']) }}">
                  @error($item['name'])
                    <div class="text-danger fs-7">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              @endforeach

              <ul class="nav nav-tabs mt-3">
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab1" type="button">رسانه
                    تصویری</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab2" type="button">رسانه
                    اسلایدری</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab3" type="button">رسانه
                    ویدئویی</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab4" type="button">رسانه ویدئویی (آپلود
                    خارج از
                    سایت)</button>
                </li>
              </ul>

              <div class="tab-content mt-4">
                <div class="tab-pane fade show active" id="tab1">
                  <input class="media" type="hidden" name="project_type" value="{{ $mediaTypes[0] }}">

                  <div class="mb-3 col-6">
                    <label for="media" class="form-label">تصویر</label>
                    <input type="file" name="media" class="form-control"
                      id="media" value="{{ old($item['name']) }}">
                    @error('media')
                      <div class="text-danger fs-7">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>

                <div class="tab-pane fade" id="tab2">
                  <input class="media" type="hidden" name="project_type" value="{{ $mediaTypes[1] }}">
                  tab2
                </div>
                <div class="tab-pane fade" id="tab3">
                  <input class="media" type="hidden" name="project_type" value="{{ $mediaTypes[2] }}">
                  tab3
                </div>
                <div class="tab-pane fade" id="tab4">
                  <input class="media" type="hidden" name="project_type" value="{{ $mediaTypes[3] }}">
                  tab4
                </div>

                <div class="my-3 form-check d-flex justify-content-center">
                  <input type="checkbox" name="status" class="form-check-input me-2" id="status"
                    {{ old('status') ? 'checked' : '' }}>
                  <label class="form-check-label" for="status">وضعیت</label>
                </div>
                @error('status')
                  <div class="text-danger fs-7 text-center" style="margin: -1rem 0 1rem 0;">
                    {{ $message }}
                  </div>
                @enderror

                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary w-25">ارسال</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
@endsection

@push('scripts')
  <script>
    window.onload = function() {
      let tabs = document.querySelectorAll('.nav-tabs .nav-link');
      disableInputs();
      let inputs = document.querySelectorAll('#tab1 *');
      enableInputs(inputs);


      for (let i = 0; i < tabs.length; i++) {
        tabs[i].addEventListener('click', function() {
          disableInputs();
          let inputs = document.querySelectorAll('#tab' + (i + 1) + ' *');
          enableInputs(inputs);
        });
      }

      function disableInputs() {
        let inputs = document.getElementsByClassName('media');
        for (let i = 0; i < inputs.length; i++) {
          inputs[i].disabled = true;
        }
      }

      function enableInputs(inputs) {
        for (var i = 0; i < inputs.length; i++) {
          inputs[i].disabled = false;
        }
      }
    };
  </script>
@endpush
