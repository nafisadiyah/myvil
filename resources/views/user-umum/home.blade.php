@extends('user-umum.layouts.master')

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
                    <h5 class="card-title text-uppercase text-muted mb-0 text-white">Total Permasalahan Sedang Diselesaikan</h5>
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
        </div>
        <h2 class="mb-0">Problem</h2>
        <p class="mb-3">Analisis permasalahan dan temukan solusinya!</p>
        <div class="card-wrapper">
          @foreach ($home as $h)
            <!-- Card -->
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
                            <h4 class="text-primary  mb-0">
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
                <a href="{{ route('umum.detail-permasalahan', $h->id) }}" class=" text-muted">Detail</a>
              </div>
            </div>
          @endforeach
        </div>
      </div>
      <div class="col-lg-3">
        <h2 class="mb-0">Desa</h2>
        <p class="mb-3">Lihat situasi desa dan lihat permasalahannya.</p>
        <div class="card-wrapper">
          @foreach ($desa as $d)
            <!-- Desa -->
            <div class="card">
              <!-- Card body -->
              <div class="card-body">
                <a href="#!">
                  <img src="{{ asset('/foto/' . $d->user->foto) }}"
                    class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="width: 128px;">
                </a>
                <div class="pt-4 mb-1 text-center">
                  <h5 class="h3 title">
                    <span class="d-block mb-0">{{ $d->user->nama }}</span>
                  </h5>
                  <p class="text-center">
                    Kec. {{ $d->kecamatan }}, {{ $d->kota }}
                  </p>
                </div>
              </div>
              <div class="card-footer text-center">
                <a href="/user-umum/desa/{{ $d->id }}" class="text-muted">Detail</a>
              </div>
            </div>
          @endforeach
        </div>
        <div class="pt-0 text-center">
          <h5 class="h3 title">
            <a href="/user-umum/desa" class=" text-muted">Lihat Semua</a>
          </h5>
        </div>
      </div>
    </div>
  @endsection
