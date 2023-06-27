@extends('admin.layouts.app', ['title' => 'نمونه کار | ویرایش'])

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
            'ویرایش' => '',
        ]"></x-breadcrumbs>
      </div>

      <div class="row">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <h3>ویرایش نمونه کار</h3>
            <a class="btn btn-light-primary" href="{{ route('admin.panel.portfolio') }}">
              بازگشت
              <i class="bi bi-arrow-90deg-left"></i>
            </a>
          </div>

          <div class="card-body">
            <form enctype="multipart/form-data" action="{{ route('admin.panel.portfolio.update', $portfolio->id) }}"
              class="row justify-content-center" method="post">
              @csrf
              @method('put')
              @foreach ($inputs as $item)
                <div class="mb-3 col-6">
                  <label for="{{ $item['name'] }}" class="form-label">{{ $item['title'] }}</label>
                  <input type="{{ $item['type'] }}" name="{{ $item['name'] }}" class="form-control"
                    id="{{ $item['name'] }}"
                    value="{{ old($item['name']) ? old($item['name']) : $portfolio->{$item['name']} }}">
                  @error($item['name'])
                    <div class="text-danger fs-7">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              @endforeach

              <ul class="nav nav-tabs mt-3">
                <li class="nav-item">
                  <button
                    class="nav-link
                  {{ !session('media.has') ? 'active' : '' }}
                  {{ session("media.{$mediaTypes[0]}") ? 'active' : '' }}"
                    data-bs-toggle="tab" data-bs-target="#tab1" type="button">رسانه
                    تصویری</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link {{ session("media.{$mediaTypes[1]}") ? 'active' : '' }}" data-bs-toggle="tab"
                    data-bs-target="#tab2" type="button">رسانه
                    اسلایدری</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link {{ session("media.{$mediaTypes[2]}") ? 'active' : '' }}" data-bs-toggle="tab"
                    data-bs-target="#tab3" type="button">رسانه
                    ویدئویی</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link {{ session("media.{$mediaTypes[3]}") ? 'active' : '' }}" data-bs-toggle="tab"
                    data-bs-target="#tab4" type="button">رسانه ویدئویی (آپلود
                    خارج از
                    سایت)</button>
                </li>
              </ul>

              <div class="tab-content mt-4">
                @error('media_type')
                  <div class="text-danger fs-7 my-2">
                    {{ $message }}
                  </div>
                @enderror

                {{-- tab1 --}}
                <div
                  class="tab-pane fade
                {{ !session('media.has') ? 'show active' : '' }}
                {{ session("media.{$mediaTypes[0]}") ? 'show active' : '' }}
                "
                  id="tab1">
                  <input type="hidden" name="media_type" value="{{ $mediaTypes[0] }}">

                  <div class="mb-3 col-6">
                    <label for="image" class="form-label">تصویر</label>
                    <input type="file" name="image" class="form-control" id="image">
                    <div class="text-info fs-7 mt-1">
                      {{ $portfolio->media_type == $mediaTypes[0] ? $portfolio->media['image']['relative_path'] : '' }}
                    </div>
                    @error('image')
                      <div class="text-danger fs-7">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>

                {{-- tab2 --}}
                <div class="tab-pane fade {{ session("media.{$mediaTypes[1]}") ? 'show active' : '' }}" id="tab2">
                  <input type="hidden" name="media_type" value="{{ $mediaTypes[1] }}">

                  <div class="row justify-content-center">
                    @error('slider')
                      <div class="text-danger fs-7 text-center mb-3">
                        {{ $message }}
                      </div>
                    @enderror
                    @error('slider.*')
                      <div class="text-danger fs-7 text-center mb-3">
                        {{ $message }}
                      </div>
                    @enderror

                    <div class="mb-3 col-6">
                      <label for="slider" class="form-label">تصویر</label>
                      <input type="file" name="slider[]" class="form-control" id="slider1">
                      <div class="text-info fs-7 mt-1">
                        {{-- {{ $portfolio->media_type == $mediaTypes[2] ? $portfolio->media['slider']['relative_path'] : '' }} --}}
                      </div>
                    </div>
                    <div class="mb-3 col-6">
                      <label for="slider" class="form-label">تصویر</label>
                      <input type="file" name="slider[]" class="form-control" id="slider2">
                      <div class="text-info fs-7 mt-1">
                        {{-- {{ $portfolio->media_type == $mediaTypes[2] ? $portfolio->media['slider']['relative_path'] : '' }} --}}
                      </div>
                    </div>
                    <div class="mb-3 col-6">
                      <label for="slider" class="form-label">تصویر</label>
                      <input type="file" name="slider[]" class="form-control" id="slider3">
                      <div class="text-info fs-7 mt-1">
                        {{-- {{ $portfolio->media_type == $mediaTypes[2] ? $portfolio->media['slider']['relative_path'] : '' }} --}}
                      </div>
                    </div>
                  </div>
                </div>

                {{-- tab3 --}}
                <div class="tab-pane fade {{ session("media.{$mediaTypes[2]}") ? 'show active' : '' }}" id="tab3">
                  <input type="hidden" name="media_type" value="{{ $mediaTypes[2] }}">

                  <div class="mb-3 col-6">
                    <label for="video" class="form-label">ویدئو</label>
                    <input type="file" name="video" class="form-control" id="video">
                    <div class="text-info fs-7 mt-1">
                      {{ $portfolio->media_type == $mediaTypes[2] ? $portfolio->media['video']['relative_path'] : '' }}
                    </div>
                    @error('video')
                      <div class="text-danger fs-7">
                        {{ $message }}
                      </div>
                    @enderror
                </div>

                {{-- tab4 --}}
                <div class="tab-pane fade {{ session("media.{$mediaTypes[3]}") ? 'show active' : '' }}" id="tab4">
                  <input type="hidden" name="media_type" value="{{ $mediaTypes[3] }}">
                  tab4
                </div>
              </div>

              <div class="my-3 form-check d-flex justify-content-center">
                <input type="checkbox" name="status" class="form-check-input me-2" id="status"
                  {{ old('status') || (!request()->old() && $portfolio->status == 1) ? 'checked' : '' }}>
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
@endsection

@push('scripts')
  <script>
    window.onload = function() {
      disableInputs();
      let inputs = document.querySelectorAll('.tab-pane.active *');
      enableInputs(inputs);

      let tabs = document.querySelectorAll('.nav-tabs .nav-link');
      for (let i = 0; i < tabs.length; i++) {
        tabs[i].addEventListener('click', function() {
          disableInputs();
          let inputs = document.querySelectorAll('#tab' + (i + 1) + ' *');
          enableInputs(inputs);
        });
      }

      function disableInputs() {
        let inputs = document.querySelectorAll('.tab-content input');
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
