@extends('admin.layouts.app', ['title' => 'تجربه و تحصیلات من | ایجاد'])

@php
  $inputs = [['name' => 'period', 'title' => 'دوره زمانی', 'type' => 'text'], ['name' => 'title', 'title' => 'عنوان', 'type' => 'text'], ['name' => 'descriptions', 'title' => 'توضیحات', 'type' => 'text']];
@endphp

@section('content')
  <div class="content p-2 p-lg-4">
    <div class="container-fluid">
      <div class="row">
        <x-breadcrumbs :routes="[
            'پنل ادمین' => route('admin.panel.dashboard'),
            'تجربه و تحصیلات من' => route('admin.panel.about.qualification'),
            'ایجاد' => '',
        ]"></x-breadcrumbs>
      </div>

      <div class="row">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <h3>ایجاد تجربه و تحصیلات</h3>
            <a class="btn btn-light-primary" href="{{ route('admin.panel.about.qualification') }}">
              بازگشت
              <i class="bi bi-arrow-90deg-left"></i>
            </a>
          </div>
          <div class="card-body">
            <form action="{{ route('admin.panel.about.qualification.store') }}" class="row justify-content-center"
              method="post">
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

              <div class="mb-3 col-6">
                <label class="form-label" for="status">نوع</label>
                <select name="type" class="form-select form-select">
                  @foreach ($types as $type)
                    <option {{ old('type') == $type ? 'selected' : '' }} value="{{ $type }}">{{ $type }}</option>
                  @endforeach
                </select>
                @error('type')
                  <div class="text-danger fs-7">
                    {{ $message }}
                  </div>
                @enderror
              </div>

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
