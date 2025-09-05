  <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
      <div class="app-brand demo">
          <a href="{{route('dashboard')}}" class="app-brand-link">
              <span class="app-brand-text demo menu-text fw-bold ms-2">AssetComply</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <i class="bx bx-chevron-left d-block d-xl-none align-middle"></i>
          </a>
      </div>

      <div class="menu-divider mt-0"></div>

      <div class="menu-inner-shadow"></div>

      <ul class="menu-inner py-1">
          <!-- Dashboards -->


          <li class="menu-item">
              <a href="{{route('dashboard')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-layout"></i>
                  <div class="text-truncate" data-i18n="Without menu">Dashboard</div>
              </a>
          </li>
          <li class="menu-item">
              <a href="{{route('posts.index')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-layout"></i>
                  <div class="text-truncate" data-i18n="Without menu">Posts</div>
              </a>
          </li>
          <li class="menu-item">
              <a href="{{route('categories.index')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-layout"></i>
                  <div class="text-truncate" data-i18n="Without menu">Categories</div>
              </a>
          </li>
          <!-- Layouts -->

      </ul>
  </aside>
