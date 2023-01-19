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
            <a class="nav-link {{ Route::is('user-umum.home') ? 'active' : '' }}" href="/user-umum/home">
              <i class="ni ni-shop text-info"></i>
              <span class="nav-link-text">Beranda</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Route::is('user-umum.desa') ? 'active' : '' }}" href="/user-umum/desa">
              <i class="ni ni-map-big text-green"></i>
              <span class="nav-link-text">Desa</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Route::is('user-umum.proposal') ? 'active' : '' }}" href="/user-umum/proposal">
              <i class="fas fa-file-powerpoint text-blue"></i>
              <span class="nav-link-text">Proposal Saya</span>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link {{ Route::is('user-umum.profil') ? 'active' : '' }}" href="/user-umum/profil">
              <i class="ni ni-circle-08 text-orange"></i>
              <span class="nav-link-text">Profil Saya</span>
            </a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link" href="/logout">
              <i class="ni ni-button-power text-red"></i>
              <span class="nav-link-text">Keluar</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
