<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  d-flex  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="/img/brand/logo-myvil.png" class="navbar-brand-img" alt="...">
        </a>
        <div class=" ml-auto ">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{ Route::is('user-desa.home') ? 'active' : '' }}" href="/user-desa/home">
                <i class="ni ni-shop text-info"></i>
                <span class="nav-link-text">Beranda</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Route::is('user-desa.ulasan') ? 'active' : '' }}" href="/user-desa/ulasan">
                <i class="ni ni-chat-round text-green"></i>
                <span class="nav-link-text">Ulasan Desa</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/logout-desa">
                <i class="ni ni-button-power text-red"></i>
                <span class="nav-link-text">Keluar</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>