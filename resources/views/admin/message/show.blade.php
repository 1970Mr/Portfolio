@extends('admin.layouts.app', ['title' => 'نمایش پیام'])

@section('content')
  <div class="content p-2 p-lg-4">
    <div class="container-fluid">
      <div class="row">
        <x-breadcrumbs :routes="[
            'پنل ادمین' => route('admin.panel.dashboard'),
            'پیام‌های من' => route('admin.panel.contact.message'),
            'نمایش پیام' => '',
        ]"></x-breadcrumbs>
      </div>

      <div class="row">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <h3>نمایش پیام</h3>
            <a class="btn btn-light-primary" href="{{ route('admin.panel.contact.message') }}">
              بازگشت
              <i class="bi bi-arrow-90deg-left"></i>
            </a>
          </div>
          <div class="chat-body">
            <div class="chat-message admin">
              <span class="sender">Admin:</span>
              <div class="content">Hello, how can I assist you today?</div>
              <div class="meta-info">ایمیل: admin@example.com</div>
              <div class="meta-info">ارسال شده در: 2023-07-01 10:30 AM</div>
            </div>
            <div class="chat-message user">
              <span class="sender">User:</span>
              <div class="content">I have a question about your product.</div>
              <div class="meta-info">ایمیل: user@example.com</div>
              <div class="meta-info">ارسال شده در: 2023-07-01 10:32 AM</div>
            </div>
            <!-- Add more chat messages here -->
          </div>
          <div class="input-group">
            <textarea class="form-control" rows="3" placeholder="پیام خودت را بنویس"></textarea>
            <button type="button" class="btn btn-primary">Send</button>
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
  </style>
@endpush
