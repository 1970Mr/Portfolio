@extends('admin.layouts.app', ['title' => 'راه‌های ارتباطی | ایجاد'])

@php
  $inputs = [
      ['name' => 'title', 'title' => 'عنوان', 'type' => 'text'],
      ['name' => 'email', 'title' => 'ایمیل', 'type' => 'text'],
      ['name' => 'phone_number', 'title' => 'شماره تماس', 'type' => 'text'],
      ['name' => 'telegram', 'title' => 'تلگرام', 'type' => 'text'],
      ['name' => 'instagram', 'title' => 'اینستاگرام', 'type' => 'text'],
      ['name' => 'youtube', 'title' => 'یوتیوب', 'type' => 'text'],
      ['name' => 'linkedin', 'title' => 'لینکدین', 'type' => 'text'],
      ['name' => 'github', 'title' => 'گیت‌هاب', 'type' => 'text'],
  ];
@endphp

@section('content')
  <div class="content p-2 p-lg-4">
    <div class="container-fluid">
      <div class="row">
        <x-breadcrumbs :routes="[
            'پنل ادمین' => route('admin.panel.dashboard'),
            'راه‌های ارتباطی' => route('admin.panel.contact.details'),
            'ویرایش' => '',
        ]"></x-breadcrumbs>
      </div>

      <div class="row">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <h3>ایجاد راه ارتباطی</h3>
            <a class="btn btn-light-primary" href="{{ route('admin.panel.contact.details') }}">
              بازگشت
              <i class="bi bi-arrow-90deg-left"></i>
            </a>
          </div>
          <div class="card-body">
            <form action="{{ route('admin.panel.contact.details.update', $contact->id) }}" class="row justify-content-center" method="post">
              @csrf
              @method('put')
              @foreach ($inputs as $item)
                <div class="mb-3 col-6">
                  <label for="{{ $item['name'] }}" class="form-label">{{ $item['title'] }}</label>
                  <input type="{{ $item['type'] }}" name="{{ $item['name'] }}" class="form-control" id="{{ $item['name'] }}"
                    value="{{ old($item['name']) ? old($item['name']) : $contact->{$item['name']} }}">
                  @error($item['name'])
                    <div class="text-danger fs-7">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              @endforeach

              <div class="mb-3 col-6">
                <label for="description" class="form-label">توضیحات</label>
                  <textarea name="description" id="description" class="form-control" rows="3">{{ old('description') ? old('description') : $contact->description }}</textarea>
                @error('description')
                  <div class="text-danger fs-7">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="mb-3 form-check d-flex justify-content-center">
                <input type="checkbox" name="status" class="form-check-input me-2" id="status"
                {{ old('status') || !request()->old() && $contact->status == 1 ? 'checked' : '' }}>
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
