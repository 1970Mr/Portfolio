@extends('admin.layouts.app', ['title' => 'مقالات'])

@section('content')
  <div class="content p-2 p-lg-4">
    <div class="container-fluid">
      <div class="row">
        <x-breadcrumbs :routes="[
            'پنل ادمین' => route('admin.panel.dashboard'),
            'مقالات' => '',
            ]"></x-breadcrumbs>
      </div>

      <div class="row">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <h3>مقالات</h3>
            <a class="btn btn-light-primary" href="{{ route('admin.panel.blog.create') }}">
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
                    <th>متن</th>
                    <th>نویسنده</th>
                    <th style="min-width: 6rem">کلمات کلیدی</th>
                    <th>تصویر</th>
                    <th>وضعیت</th>
                    <th>عملیات</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($blogs as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td class="text-muted">{{ $item->title }}</td>
                      <td class="text-muted" style="min-width: 12rem">{{ str()->limit($item->text, 40) }}</td>
                      <td class="text-muted">{{ $item->author }}</td>
                      <td class="text-muted">{{ $item->keywords }}</td>
                      <td class="text-muted">{{ $item->photo['relative_path'] }}</td>
                      <td class="text-muted">{{ $item->status }}</td>
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-light-primary dropdown-toggle" type="button"
                            data-bs-toggle="dropdown">
                            عملیات
                          </button>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item"
                                href="{{ route('admin.panel.blog.edit', ['blog' => $item->id]) }}">ویرایش</a>
                            </li>
                            <li>
                              <form action="{{ route('admin.panel.blog.destroy', ['blog' => $item->id]) }}" method="post"
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

            <div class="mt-3">
                {{ $blogs->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
<x-alert type='success'></x-alert>
<x-alert type='error'></x-alert>
