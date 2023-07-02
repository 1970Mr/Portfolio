@extends('admin.layouts.app', ['title' => 'راه‌های ارتباطی'])

@section('content')
  <div class="content p-2 p-lg-4">
    <div class="container-fluid">
      <div class="row">
        <x-breadcrumbs :routes="[
            'پنل ادمین' => route('admin.panel.dashboard'),
            'راه‌های ارتباطی' => '',
        ]"></x-breadcrumbs>
      </div>

      <div class="row">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <h3>راه‌های ارتباطی</h3>
            <a class="btn btn-light-primary" href="{{ route('admin.panel.contact.details.create') }}">
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
                    <th>نام</th>
                    <th>ایمیل</th>
                    <th>موضوع</th>
                    <th>پیام</th>
                    <th>حذف</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($messages as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td class="text-muted">{{ $item->name }}</td>
                      <td class="text-muted">{{ $item->email }}</td>
                      <td class="text-muted">{{ $item->subject }}</td>
                      <td class="text-muted">{{ Illuminate\Support\Str::limit($item->message, 40) }}</td>
                      <td>
                        <form action="{{ route('admin.panel.contact.message.destroy', ['message' => $item->id]) }}"
                          method="post" id="form-{{ $loop->iteration }}">
                          @csrf
                          @method('delete')
                          <a class="btn btn-danger" href="javascript:"
                            onclick="document.getElementById('form-{{ $loop->iteration }}').submit()">حذف</a>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

            <div class="mt-3">
              {{ $messages->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
<x-alert type='success'></x-alert>
<x-alert type='error'></x-alert>
