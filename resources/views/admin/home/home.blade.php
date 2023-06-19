@extends('admin.layouts.app', ['title' => 'خانه'])

@section('content')
  <div class="content p-2 p-lg-4">
    <div class="container-fluid">
      <div class="row">
        <x-breadcrumbs :routes="[
            'پنل ادمین' => route('admin.panel.dashboard'),
            'خانه' => '',
            ]"></x-breadcrumbs>
        {{-- <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.panel.dashboard') }}">پنل ادمین</a></li>
            <li class="breadcrumb-item active" aria-current="page">خانه</li>
            </li>
          </ol>
        </nav> --}}
      </div>

      <div class="row">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <h3>تنظیمات خانه</h3>
            <a class="btn btn-light-primary" href="{{ route('admin.panel.home.create') }}">
              ایجاد
              <i class="bi bi-plus-circle"></i>
            </a>
          </div>
          <div class="card-body">
            <div class="table-responsive" style="min-height: 40vh;">
              <table class="table table-hover align-middle">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>عنوان</th>
                    <th>زیرعنوان</th>
                    <th>توضیحات</th>
                    <th>تصویر</th>
                    <th>وضعیت</th>
                    <th>عملیات</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($homesData as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td class="text-muted">{{ $item->title }}</td>
                      <td class="text-muted">{{ $item->sub_title }}</td>
                      <td class="text-muted">{{ text_limitation($item->description) }}</td>
                      <td class="text-muted">{{ $item->photo['relative_path'] }}</td>
                      <td class="text-muted">{{ $item->status }}</td>
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-light-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            عملیات
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item"
                                href="{{ route('admin.panel.home.edit', ['id' => $item->id]) }}">ویرایش</a>
                            </li>
                            <li>
                              <form action="{{ route('admin.panel.home.destroy', ['id' => $item->id]) }}" method="post"
                                id="form-{{ $loop->iteration }}">
                                @csrf
                                @method('delete')
                                <a class="dropdown-item" href="javascript:"
                                  onclick="document.getElementById('form-{{ $loop->iteration }}').submit()">حذف</a>
                              </form>
                            </li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

            {{-- <nav class="mt-4" aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav> --}}

            {{ $homesData->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
<x-alert type='success'></x-alert>
<x-alert type='error'></x-alert>
