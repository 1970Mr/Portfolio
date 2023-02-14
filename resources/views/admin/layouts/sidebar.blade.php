<section x-cloak class="sidebar" :class="open || 'inactive'">
  <div class="d-flex align-items-center justify-content-between justify-content-lg-center">
    <h4 class="fw-bold">رسول مرشدی</h4>
    <i @click="toggle" class="d-lg-none fs-1 bi bi-x"></i>
  </div>
  <div class="mt-4">
    <ul class="list-unstyled">
      <li class="sidebar-item active">
        <a class="sidebar-link" href="./index.html">
          <i class="me-2 bi bi-grid-fill"></i>
          <span>داشبورد</span>
        </a>
      </li>

      <li class="sidebar-item">
        <a class="sidebar-link" href="./index.html">
          <i class="me-2 bi bi-house-door"></i>
          <span>تنظیمات خانه</span>
        </a>
      </li>

      <li class="sidebar-item">
        <a class="sidebar-link" href="./index.html">
          <i class="bi bi-file-earmark-person me-2"></i>
          <span>تنظیمات درباره من</span>
        </a>
      </li>

      <li class="sidebar-item">
        <a class="sidebar-link" href="./index.html">
          <i class="bi bi-diagram-3 me-2"></i>
          <span>تنظیمات نمونه کار</span>
        </a>
      </li>

      <li class="sidebar-item">
        <a class="sidebar-link" href="./index.html">
          <i class="bi bi-envelope me-2"></i>
          <span>تنظیمات ارتباط</span>
        </a>
      </li>

      <li class="sidebar-item">
        <a class="sidebar-link" href="./index.html">
          <i class="bi bi-file-earmark-richtext me-2"></i>
          <span>تنظیمات مقالات</span>
        </a>
      </li>

      <li x-data="dropdown" class="sidebar-item">
        <div @click="toggle" class="sidebar-link">
          <i class="me-2 bi bi-shop"></i>
          <span>فروشگاه</span>
          <i class="ms-auto bi bi-chevron-down"></i>
        </div>
        <ul x-show="open" x-transition class="submenu">
          <li class="submenu-item">
            <a href="#">لیست فروشگاه ها</a>
          </li>
          <li class="submenu-item">
            <a href="#">ایجاد فروشگاه</a>
          </li>
          <li class="submenu-item">
            <a href="#">ویرایش فروشگاه</a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</section>
