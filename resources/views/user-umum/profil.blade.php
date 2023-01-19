@extends('user-umum.layouts.master')

@section('content')

<!-- Page content -->
<div class="container mt-4">
  <div class="row">
    <div class="col-lg-9">
       
      <div class="card-wrapper">
        <!-- Card -->
        <div class="card card-pricing border-0 text-center mb-4">
          <div class="card-header bg-transparent">
            <div class="d-flex w-100 justify-content-between">
              <div>
                <div class="d-flex w-100 align-items-center">
                  <a href=""><img src="/img/theme/team-2.jpg" alt="Image placeholder" class="avatar avatar-xl mr-2"></a>
                  <div class="col">
                    <h4 class="mb-0">Desa Bancar</h4>
                    <p class="text-sm text-muted mb-0">18 Maret 2021 - 12.30</p>
                  </div>
                </div>
              </div>
              <p class="text-success mb-0">Sudah Selesai</p>
            </div>
          </div>
          <div class="card-body px-lg-7">
            <h4 class="card-title mb-1 text-left">Solusi Yang Anda Tawarkan:</h4>
            <h4 class="text-sm text-muted mb-0 text-left">Judul Projek Judul Projek Judul Projek</>
          </div>
          <div class="card-footer">
            <a href="/user-umum/detail-problem" class=" text-muted">Detail</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="card-wrapper">
        <div class="card card-profile">
            <img src="/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="/img/theme/team-4.jpg" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                
              </div>
            </div>
            <div class="card-body pt-5">
              <div class="text-center">
                <h5 class="h3">
                  {{ $profil->nama }}
                </h5>
                <div class="h5 mt-3">
                  {{ $profil->alamat }}
                </div>
                <div class="h5 font-weight-400">
                  {{ $profil->email }}
                </div>
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection