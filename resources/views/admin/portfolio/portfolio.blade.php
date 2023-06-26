@extends('admin.layouts.app', ['title' => 'نمونه کار'])

@section('content')
  <div class="content p-2 p-lg-4">
    <div class="container-fluid">
      <div class="row">
        <x-breadcrumbs :routes="[
            'پنل ادمین' => route('admin.panel.dashboard'),
            'نمونه کار' => '',
            ]"></x-breadcrumbs>
      </div>

      <div class="row">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <h3>نمونه کار</h3>
            <a class="btn btn-light-primary" href="{{ route('admin.panel.portfolio.create') }}">
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
                    <th>نوع پروژه</th>
                    <th>مشتری</th>
                    <th>لینک پروژه</th>
                    <th>تکنولوژی</th>
                    <th>نوع رسانه</th>
                    <th>وضعیت</th>
                    <th>عملیات</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($portfolios as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td class="text-muted">{{ $item->title }}</td>
                      <td class="text-muted">{{ $item->project_type }}</td>
                      <td class="text-muted">{{ $item->customer }}</td>
                      <td class="text-muted">{{ $item->link }}</td>
                      <td class="text-muted">{{ $item->technology }}</td>
                      <td class="text-muted">{{ $item->media_type }}</td>
                      <td class="text-muted">{{ $item->status }}</td>
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-light-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            عملیات
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item"
                                href="{{ route('admin.panel.portfolio.edit', ['portfolio' => $item->id]) }}">ویرایش</a>
                            </li>
                            <li>
                              <form action="{{ route('admin.panel.portfolio.destroy', ['portfolio' => $item->id]) }}" method="post"
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
                {{ $portfolios->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
<x-alert type='success'></x-alert>
<x-alert type='error'></x-alert>

@push('styles')
<style>
    .family {
        white-space: nowrap;
    }
</style>
@endpush
