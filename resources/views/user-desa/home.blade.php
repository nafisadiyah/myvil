@extends('user-desa.layouts.master')

@section('content')

  <!-- Page content -->
  <div class="container mt-4">
    <div class="row">
      <div class="col-lg-9">
        @if (Session::has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            {{ Session::get('success') }}
          </div>
        @endif
        <div class="row">
          <div class="col-xl-6 col-md-6">
            <div class="card bg-gradient-info border-0">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0 text-white">Total Permasalahan Diselesaikan</h5>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                      <i class="ni ni-satisfied"></i>
                    </div>
                  </div>
                </div>
                <p class="h2 font-weight-bold mb-0 text-white">
                  0
                </p>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-md-6">
            <div class="card bg-gradient-danger border-0">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0 text-white">Total Permasalahan Saat Ini</h5>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                      <i class="ni ni-bulb-61"></i>
                    </div>
                  </div>
                </div>
                <p class="h2 font-weight-bold mb-0 text-white">
                  {{ $resultPermsalahanSekarang }}
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-6 col-md-6">
            <div class="card bg-gradient-primary border-0">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0 text-white">Total Permasalahan Dalam Proses
                      Penyelesaian</h5>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                      <i class="ni ni-user-run"></i>
                    </div>
                  </div>
                </div>
                <p class="h2 font-weight-bold mb-0 text-white">
                  {{ $resultPermsalahanDikerjakan }}
                </p>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-md-6">
            <div class="card bg-gradient-success border-0">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0 text-white">Total Ulasan Tentang Desa</h5>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                      <i class="ni ni-chat-round"></i>
                    </div>
                  </div>
                </div>
                <p class="h2 font-weight-bold mb-0 text-white">
                  {{ $resultUlasanDesa }}
                </p>
              </div>
            </div>
          </div>
        </div>
        <a class="btn btn-primary btn-lg btn-block mt-0 mb-4" href="/user-desa/form-problem">Ajukan Permasalahan Desa</a>

        <div class="card-wrapper">
          <!-- Card -->
          @foreach ($home as $h)
            <!-- Card -->
            @if ($h->user->id == Auth::user()->id)
              <div class="card card-pricing border-0 text-center mb-4">
                <div class="card-header bg-transparent">
                  <div class="d-flex w-100 justify-content-between">
                    <div>
                      <div class="d-flex w-100 align-items-center">
                        <a href=""><img src="{{ asset('/foto/' . $h->user->foto) }}" alt=""
                            class="avatar avatar-lg mr-2"></a>
                        <div class="col">
                          <h4 class="mb-0 text-left">{{ $h->user->nama }}</h4>
                          <p class="text-sm text-muted mb-0">{{ $h->created_at }}</p>
                        </div>
                      </div>
                    </div>
                    @if ($h->status->id == 3)
                      <h4 class="text-danger mb-0">
                      @elseif ($h->status->id == 1)
                        <h4 class="text-muted mb-0">
                        @elseif ($h->status->id == 2)
                          <h4 class="text-warning mb-0">
                          @elseif ($h->status->id == 5)
                            <h4 class="text-success mb-0">
                            @elseif ($h->status->id == 4)
                              <h4 class="text-primary mb-0">
                    @endif
                    {{ $h->status->nama }}</h4>

                  </div>
                </div>
                <div class="card-body px-lg-7">
                  <h3 class="card-title mb-3">{{ $h->judul }}</h3>
                  <div class="card-deck">
                    <div class="card">
                      <!-- Card body -->
                      <img alt="Image placeholder" src="{{ asset('/lampiran1/' . $h->lampiran_1) }}"
                        class="img-fluid rounded">
                    </div>
                    <!-- Username card -->
                    <div class="card">
                      <!-- Card body -->
                      <img alt="Image placeholder" src="{{ asset('/lampiran2/' . $h->lampiran_2) }}"
                        class="img-fluid rounded">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <a href="{{ route('user-desa.detail-problem', $h->id) }}" class=" text-muted">Detail</a>
                </div>
              </div>
            @endif
          @endforeach
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
                    <img src="{{ asset('/foto/' . Auth::user()->foto) }}" class="rounded-circle">
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
                  {{ Auth::user()->nama }}
                </h5>
                <form>
                  <div class="form-group mt-4">
                    <h4 class="form-control-label text-left mb-2" for="exampleFormControlInput1">Kecamatan</>
                      <input type="text" class="form-control" id="exampleFormControlInput1"
                        placeholder="{{ $desa->kecamatan }}">
                  </div>
                  <div class="form-group">
                    <h4 class="form-control-label text-left" for="exampleFormControlInput1">Kabupaten/Kota</h4>
                    <input type="text" class="form-control" id="exampleFormControlInput1"
                      placeholder="{{ $desa->kota }}">
                  </div>
                  <div class="form-group">
                    <h4 class="form-control-label text-left" for="exampleFormControlInput1">Provinsi</h4>
                    <input type="text" class="form-control" id="exampleFormControlInput1"
                      placeholder="{{ $desa->provinsi }}">
                  </div>
                  <button type="button" class="btn btn-primary btn-lg btn-block mt-2">Edit</button>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
