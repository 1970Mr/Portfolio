@extends('admin.layouts.app', ['title' => 'نمایش پیام'])

@section('content')
  <div class="content p-2 p-lg-4">
    <div class="container-fluid">
      <div class="row">
        <x-breadcrumbs :routes="[
            'پنل ادمین' => route('admin.panel.dashboard'),
            'پیام‌های من' => route('admin.panel.contact.messages.index'),
            'نمایش پیام' => '',
        ]"></x-breadcrumbs>
      </div>

      <div class="row">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <h3>پیام کاربر - موضوع: {{ $message->subject }}</h3>
            <a class="btn btn-light-primary" href="{{ route('admin.panel.contact.messages.index') }}">
              بازگشت
              <i class="bi bi-arrow-90deg-left"></i>
            </a>
          </div>
          <div class="chat-body">
            <div class="chat-message user">
              <span class="sender">{{ $message->name }}:</span>
              <div class="chat-content">{{ $message->message }}</div>
              <div class="meta-info">ایمیل: {{ $message->email }}</div>
              <div class="meta-info">ارسال شده در: <span
                  class="d-inline-block">{{ jdate()->forge($message->created_at) }}</span></div>
            </div>

            @if ($message->response)
              <div class="chat-message admin">
                <span class="sender">پاسخ شما:</span>
                <div class="chat-content">{{ $message->response }}</div>
                <div class="meta-info">ایمیل: {{ config('mail.from.address') }}</div>
                <div class="meta-info">ارسال شده در: <span
                    class="d-inline-block">{{ jdate()->forge($message->updated_at) }}</span></div>
              </div>
            @endif
            <!-- Add more chat messages here -->
          </div>
          <form action="{{ route('admin.panel.contact.message.send.response', ['message' => $message->id]) }}" method="POST">
            @csrf
            @method('put')
            <div class="input-group">
              <textarea class="form-control" placeholder="پاسخ خودت را بنویس" name="response"></textarea>
              <button type="submit" class="btn btn-primary">ارسال</button>
            </div>
            @error('response')
              <div class="text-danger fs-7 text-center mb-3">
                {{ $message }}
              </div>
            @enderror
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
<x-alert type='success'></x-alert>
<x-alert type='error'></x-alert>

@push('styles')
  <style>
    .card {
      padding: 0;
    }

    .card-header {
      background-color: #f8f9fa;
      padding: 20px;
      border-bottom: 1px solid #ccc;
      border-radius: 0 !important;
      border-top-right-radius: .7rem;
      border-top-left-radius: .7rem;
    }

    .chat-body {
      height: 350px;
      overflow-y: auto;
      padding: 20px;
    }

    .chat-message {
      margin-bottom: 20px;
    }

    .chat-message .sender {
      font-weight: bold;
    }

    .chat-message.admin,
    .chat-message.user {
      text-align: right;
    }

    .chat-message .content {
      margin-top: 5px;
    }

    .chat-message .meta-info {
      font-size: 12px;
      color: #999;
    }

    .input-group {
      align-items: flex-start;
      padding: 15px;
      border-top: 1px solid #ccc;
      background-color: #f8f9fa;
      border-bottom-right-radius: .7rem;
      border-bottom-left-radius: .7rem;
    }

    .input-group textarea {
      height: 28px;
    }

    .chat-content {
        white-space: pre-wrap;
    }
  </style>
@endpush
