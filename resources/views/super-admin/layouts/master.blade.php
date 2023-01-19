<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>MyVill</title>
  <!-- Favicon -->
  <link rel="icon" href="/img/brand/icon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="/css/argon.css?v=1.2.1" type="text/css">
  <link rel="stylesheet" href="/vendor/sweetalert2/dist/sweetalert2.min.css">
</head>

<body>
  <!-- Sidenav -->
  @include('super-admin.layouts.sidebar')
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    @include('super-admin.layouts.header')
    <!-- Header -->
    <!-- Header -->
    @yield('content')
    <!-- Footer -->
  <footer class="footer pt-0">
    <div class="row align-items-center justify-content-lg-between">
      <div class="col-lg-6">
        <div class="copyright text-center  text-lg-left  text-muted">
          © 2021 <a href="#" class="font-weight-bold ml-1" target="_blank">My Vill Tim</a>
        </div>
      </div>
      <div class="col-lg-6">
        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
          <li class="nav-item">
            <a href="#" class="nav-link" target="_blank">Policy & Privasi</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" target="_blank">About Us</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" target="_blank">Blog</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" target="_blank">Term of Service</a>
          </li>
        </ul>
      </div>
    </div>
  </footer>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  @stack('before-scripts')
  <script src="/vendor/jquery/dist/jquery.min.js"></script>
  <script src="/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/js-cookie/js.cookie.js"></script>
  <script src="/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <script src="/vendor/dropzone/dist/min/dropzone.min.js"></script>
  
  @stack('page-scripts')
  <!-- Argon JS -->
  <script src="/js/argon.js?v=1.2.1"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="/js/demo.min.js"></script>
  @stack('after-scripts')
</body>

</html>