@extends('admin.layouts.app', ['title' => 'اطلاعات شخصی | ایجاد'])

@php
  $names = [
      ['name' => 'name', 'title' => 'نام', 'type' => 'text'],
      ['name' => 'family', 'title' => 'نام خانوادگی', 'type' => 'text'],
      ['name' => 'age', 'title' => 'سن', 'type' => 'text'],
      ['name' => 'country', 'title' => 'ملیت', 'type' => 'text'],
      ['name' => 'job', 'title' => 'شغل', 'type' => 'text'],
      ['name' => 'address', 'title' => 'آدرس', 'type' => 'text'],
      ['name' => 'phoneNumber', 'title' => 'شماره تماس', 'type' => 'text'],
      ['name' => 'email', 'title' => 'ایمیل', 'type' => 'email'],
      ['name' => 'github', 'title' => 'نام کاربری گیت‌هاب', 'type' => 'text'],
      ['name' => 'language', 'title' => 'زبان', 'type' => 'text'],
      ['name' => 'experiences', 'title' => 'تجربه‌ها', 'type' => 'number'],
      ['name' => 'projects', 'title' => 'پروژه‌ها', 'type' => 'number'],
      ['name' => 'awards', 'title' => 'جایزه‌ها', 'type' => 'number'],
  ];
@endphp

@section('content')
  <div class="content p-2 p-lg-4">
    <div class="container-fluid">
      <div class="row">
        <x-breadcrumbs :routes="[
            'پنل ادمین' => route('admin.panel.dashboard'),
            'اطلاعات شخصی' => route('admin.panel.about.personal'),
            'ایجاد' => '',
        ]"></x-breadcrumbs>
      </div>

      <div class="row">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <h3>ایجاد اطلاعات شخصی</h3>
            <a class="btn btn-light-primary" href="{{ route('admin.panel.about.personal') }}">
              بازگشت
              <i class="bi bi-arrow-90deg-left"></i>
            </a>
          </div>
          <div class="card-body">
            <form action="{{ route('admin.panel.about.personal.store') }}" class="row justify-content-center" method="post">
              @csrf
              @foreach ($names as $item)
                <div class="mb-3 col-md-6">
                  <label for="{{ $item['name'] }}" class="form-label">{{ $item['title'] }}</label>
                  <input type="{{ $item['type'] }}" name="{{ $item['name'] }}" class="form-control" id="{{ $item['name'] }}"
                    value="{{ old($item['name']) }}">
                  @error($item['name'])
                    <div class="text-danger fs-7">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              @endforeach

              <div class="mb-3 form-check d-flex justify-content-center">
                <input type="checkbox" name="status" class="form-check-input me-2" id="status"
                  {{ old('status') ? 'checked' : '' }}>
                <label class="form-check-label" for="status">وضعیت</label>
              </div>
              @error('status')
                <div class="text-danger fs-7 text-center" style="margin: -1rem 0 1rem 0;">
                  {{ $message }}
                </div>
              @enderror

              <button type="submit" class="btn btn-primary w-25">ارسال</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
