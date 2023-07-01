@php
    $mobilePhoto = App\Models\Home::where('status', true)->first()->photo['mobile']['relative_path']
@endphp

<header class="header d-flex justify-content-between p-3 align-items-center">
  <div>
    <a href="#">
      <i @click="toggle" class="toggle-sidebar-icon bi bi-justify fs-3"></i>
    </a>
  </div>

  <div class="d-flex align-items-center">
    <div class="dropdown mx-4" style="cursor: pointer;">
      <div class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="position-absolute top-0 end-50 translate-middle badge rounded-pill bg-red">
          9
        </span>
        <i class="bi bi-envelope fs-4 text-gray-600"></i>
      </div>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item fs-7" href="#">
            مشاهده پیام‌های خوانده نشده
            <span class="badge rounded-pill bg-red ms-2">
                9
            </span>
        </a></li>
        <li><a class="dropdown-item fs-7" href="#"> مشاهده پیام‌های خوانده شده </a></li>
        <li><a class="dropdown-item fs-7" href="#"> مشاهده همه پیام‌ها </a></li>
      </ul>
    </div>

    <div class="dropdown" style="cursor: pointer;">
      <div class="dropdown-toggle profile d-flex align-items-center " data-bs-toggle="dropdown" aria-expanded="false">
        <img width="45" class="img-fluid rounded-circle me-2" src="{{ asset($mobilePhoto) }}"
          alt="">
        <div>
          <h6 class="fs-6 fw-bold text-gray-600 mb-0">رسول مرشدی</h6>
          <p class="fs-8 text-gray-600 mb-0">سوپر ادمین</p>
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
          <a class="dropdown-item fs-7" href="#">
            <i class="bi bi-box-arrow-left fs-5 me-1"></i>
            خروج
          </a>
        </li>
      </ul>
    </div>
  </div>
</header>
