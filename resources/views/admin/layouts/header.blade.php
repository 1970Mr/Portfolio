@php
  $user = App\Models\Home::where('status', true)->first();
  $mobilePhoto = null;
  if ($user) {
      $mobilePhoto = $user->photo['mobile']['relative_path'];
  }
  $unreadMessagesCount = App\Models\Message::where('is_read', false)->count();

@endphp

<header class="header d-flex justify-content-between p-3 align-items-center">
  <div>
    <a href="#">
      <i @click="toggle" class="toggle-sidebar-icon bi bi-justify fs-3"></i>
    </a>
  </div>

  <div class="d-flex align-items-center">
    <div class="dropdown mx-4" style="cursor: pointer; margin-bottom: -5px;">
      <div class="dropdown-toggle" data-bs-toggle="dropdown">
        <span class="position-absolute top-0 end-50 translate-middle badge rounded-pill bg-red">
          {{ $unreadMessagesCount }}
        </span>
        <i class="bi bi-envelope fs-4 text-gray-600"></i>
      </div>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item fs-7" href="{{ route('admin.panel.contact.messages.index', ['is_read' => false]) }}">
            مشاهده پیام‌های خوانده نشده
            <span class="badge rounded-pill bg-red ms-2">
              {{ $unreadMessagesCount }}
            </span>
          </a></li>
        <li><a class="dropdown-item fs-7" href="{{ route('admin.panel.contact.messages.index', ['is_read' => true]) }}"> مشاهده
            پیام‌های خوانده شده </a></li>
        <li><a class="dropdown-item fs-7" href="{{ route('admin.panel.contact.messages.index') }}"> مشاهده همه پیام‌ها </a>
        </li>
      </ul>
    </div>

    <div class="dropdown" style="cursor: pointer;">
      <div class="dropdown-toggle profile d-flex align-items-center " data-bs-toggle="dropdown">
        @if ($mobilePhoto)
          <img width="45" class="img-fluid rounded-circle me-2 img-mobile" src="{{ asset($mobilePhoto) }}"
            alt="" style="object-fit: cover; width: 45px; height: 45px;">
        @else
          <i class="bi bi-person-circle fs-2 me-2"></i>
        @endif
        <div>
          <h6 class="fs-6 fw-bold text-gray-600 mb-0">{{ config('admin.fa-name') }}</h6>
          <p class="fs-8 text-gray-600 mb-0">مالک سایت</p>
        </div>
      </div>
      <ul class="dropdown-menu">
        <li>
          <a class="dropdown-item fs-7" href="#">
            <i class="bi bi-person fs-5 me-1"></i>
            پروفایل
          </a>
        </li>
        <li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li>
          <a class="dropdown-item fs-7" href="javascript:" onclick="document.getElementById('logout-form').submit()">
            <i class="bi bi-box-arrow-left fs-5 me-1"></i>
            خروج
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
            @csrf
          </form>
        </li>
      </ul>
    </div>
  </div>
</header>

@push('styles')
  <style>
    .img-mobile {
      object-fit: cover;
      width: 45px;
      height: 45px !important;
    }
  </style>
@endpush
