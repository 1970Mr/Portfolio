<section x-cloak class="sidebar" :class="open || 'inactive'">
  <div class="d-flex align-items-center justify-content-between justify-content-lg-center">
    <h4 class="fw-bold">{{ config('admin.fa-name') }}</h4>
    <i @click="toggle" class="d-lg-none fs-1 bi bi-x" style="cursor: pointer"></i>
  </div>
  <div class="mt-4">
    <ul class="list-unstyled">
      <li class="sidebar-item {{ active_route('admin.panel.dashboard') }}">
        <a class="sidebar-link" href="{{ route('admin.panel.dashboard') }}">
          <i class="me-2 bi bi-grid-fill"></i>
          <span>داشبورد</span>
        </a>
      </li>

      <li class="sidebar-item {{ active_route('admin.panel.home.index') }}">
        <a class="sidebar-link" href="{{ route('admin.panel.home.index') }}">
          <i class="me-2 bi bi-house-door"></i>
          <span>خانه</span>
        </a>
      </li>

      <li x-data="{{ active_route('admin.panel.about.index') == 'active' ? '{dropdown, open: true}' : 'dropdown' }}" class="sidebar-item">
        <div @click="toggle" class="sidebar-link">
          <i class="bi bi-file-person me-2"></i>
          <span>درباره من</span>
          <i class="ms-auto bi bi-chevron-down"></i>
        </div>
        <ul x-show="open" x-transition class="submenu">
          <li class="submenu-item {{ active_route('admin.panel.about.personal.index') }}">
            <a class="sidebar-link" href="{{ route('admin.panel.about.personal.index') }}">
              <i class="bi bi-file-earmark-person me-2"></i>
              <span>اطلاعات شخصی</span>
            </a>
          </li>
          <li class="submenu-item {{ active_route('admin.panel.about.skill') }}">
            <a class="sidebar-link" href="{{ route('admin.panel.about.skill') }}">
              <i class="bi bi-wrench-adjustable-circle me-2"></i>
              <span>مهارت‌های من</span>
            </a>
          </li>
          <li class="submenu-item {{ active_route('admin.panel.about.qualification') }}">
            <a class="sidebar-link" href="{{ route('admin.panel.about.qualification') }}">
                <i class="bi bi-briefcase me-2"></i>
              <span>تجربه و تحصیلات من</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="sidebar-item {{ active_route('admin.panel.portfolio') }}">
        <a class="sidebar-link" href="{{ route('admin.panel.portfolio') }}">
          <i class="bi bi-diagram-3 me-2"></i>
          <span>نمونه کار</span>
        </a>
      </li>

      <li x-data="{{ active_route('admin.panel.contact') == 'active' ? '{dropdown, open: true}' : 'dropdown' }}" class="sidebar-item">
        <div @click="toggle" class="sidebar-link">
          <i class="bi bi-person-lines-fill me-2"></i>
          <span>ارتباط با من</span>
          <i class="ms-auto bi bi-chevron-down"></i>
        </div>
        <ul x-show="open" x-transition class="submenu">
          <li class="submenu-item {{ active_route('admin.panel.contact.details') }}">
            <a class="sidebar-link" href="{{ route('admin.panel.contact.details') }}">
              <i class="bi bi-sign-merge-right me-2"></i>
              <span>راه‌های ارتباطی</span>
            </a>
          </li>
          <li class="submenu-item {{ active_route('admin.panel.contact.message') }}">
            <a class="sidebar-link" href="{{ route('admin.panel.contact.message') }}">
              <i class="bi bi-envelope me-2"></i>
              <span>پیام‌های من</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="sidebar-item {{ active_route('admin.panel.blog') }}">
        <a class="sidebar-link" href="{{ route('admin.panel.blog') }}">
          <i class="bi bi-file-earmark-richtext me-2"></i>
          <span>مقالات</span>
        </a>
      </li>

      <li class="sidebar-item {{ active_route('admin.panel.profile.index') }}">
        <a class="sidebar-link" href="{{ route('admin.panel.profile.index') }}">
          <i class="bi bi-person me-2"></i>
          <span>پروفایل</span>
        </a>
      </li>
    </ul>
  </div>
</section>
