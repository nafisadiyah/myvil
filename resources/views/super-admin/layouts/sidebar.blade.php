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
              <a class="nav-link {{ Route::is('super-admin.home') ? 'active' : '' }}" href="/super-admin/home">
                <i class="ni ni-shop text-info"></i>
                <span class="nav-link-text">Beranda</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Route::is('super-admin.permasalahan', 'super-admin.permasalahan-diterima', 'super-admin.permasalahan-ditolak') ? 'active' : '' }} collapsed" href="#navbar-dashboards" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                <i class="ni ni-ungroup text-orange"></i>
                <span class="nav-link-text">Permasalahan</span>
              </a>
              <div class="collapse {{ Route::is('super-admin.permasalahan', 'super-admin.permasalahan-diterima', 'super-admin.permasalahan-ditolak') ? 'show' : '' }}" id="navbar-dashboards" style="">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item {{ Route::is('super-admin.permasalahan') ? 'active' : '' }}">
                    <a href="/super-admin/permasalahan" class="nav-link">
                      <span class="sidenav-mini-icon"> A </span>
                      <span class="sidenav-normal"> Belum Disetujui </span>
                    </a>
                  </li>
                  <li class="nav-item {{ Route::is('super-admin.permasalahan-diterima') ? 'active' : '' }}">
                    <a href="/super-admin/permasalahan-diterima" class="nav-link">
                      <span class="sidenav-mini-icon"> A </span>
                      <span class="sidenav-normal"> Sudah Disetujui </span>
                    </a>
                  </li>
                  <li class="nav-item {{ Route::is('super-admin.permasalahan-ditolak') ? 'active' : '' }}">
                    <a href="/super-admin/permasalahan-ditolak" class="nav-link">
                      <span class="sidenav-mini-icon"> A </span>
                      <span class="sidenav-normal"> Ditolak </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Route::is('super-admin.user-desa') ? 'active' : '' }}" href="/super-admin/user-desa">
                <i class="ni ni-circle-08 text-red"></i>
                <span class="nav-link-text">User Desa</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/logout-admin">
                <i class="ni ni-button-power text-red"></i>
                <span class="nav-link-text">Keluar</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>