@extends('user-umum.layouts.master')

@section('content')

  <!-- Page content -->
  <div class="container mt-4">
    <div class="row">
      <div class="col-lg-9">
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
                  {{ count($problems->where('status_id', 5)) }}
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
                  {{ count($problems->where('status_id', '!=', 3)->where('status_id', '!=', 1)) }}
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-wrapper">
          <!-- Card -->
          @foreach ($problems->where('status_id', '!=', 3)->where('status_id', '!=', 1) as $problem)
            <div class="card card-pricing border-0 text-center mb-4">
              <div class="card-header bg-transparent">
                <div class="d-flex w-100 justify-content-between">
                  <div>
                    <div class="d-flex w-100 align-items-center">
                      <a href=""><img src="/foto/{{ $desa->user->foto }}" alt="Image placeholder"
                          class="avatar avatar-lg mr-2"></a>
                      <div class="col">
                        <h4 class="mb-0 text-left">{{ $desa->user->nama }}</h4>
                        <p class="text-sm text-muted mb-0">{{ $problem['created_at'] }}</p>
                      </div>
                    </div>
                  </div>
                  @if ($problem->status->id == 3)
                    <h4 class="text-danger mb-0">
                    @elseif ($problem->status->id == 1)
                      <h4 class="text-muted mb-0">
                      @elseif ($problem->status->id == 2)
                        <h4 class="text-warning mb-0">
                        @elseif ($problem->status->id == 5)
                          <h4 class="text-success mb-0">
                          @elseif ($problem->status->id == 4)
                            <h4 class="text-primary mb-0">
                  @endif
                  {{ $problem->status->nama }}</h4>

                </div>
              </div>
              <div class="card-body px-lg-7">
                <h3 class="card-title mb-3">{{ $problem->judul }}</h3>
                <div class="card-deck">
                  <div class="card">
                    <!-- Card body -->
                    <img alt="Image placeholder" src="/lampiran1/{{ $problem->lampiran_1 }}" class="img-fluid rounded">
                  </div>
                  <!-- Username card -->
                  <div class="card">
                    <!-- Card body -->
                    <img alt="Image placeholder" src="/lampiran2/{{ $problem->lampiran_2 }}" class="img-fluid rounded">
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <a href="/user-umum/{{ $problem->id }}/detail-permasalahan" class=" text-muted">Detail</a>
              </div>
            </div>
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
                    <img src="/foto/{{ $desa->user->foto }}" class="rounded-circle">
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
                  {{ $desa->user->nama }}
                </h5>
                <div class="h5 mt-3">
                  <i class="ni business_briefcase-24 mr-2"></i>
                  {{ "Kecamatan {$desa->kecamatan}, {$desa->kota}" }}
                </div>
                <div class="h5 font-weight-400">
                  <i class="ni location_pin mr-2"></i>{{ $desa->user->email }}
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-wrapper">
          <div class="card">
            <div class="card-body">
              <div class="">
                <div class="form-group">

                  {{-- Alert messages --}}
                  @if (Session::has('messages'))
                    <div class="alert alert-success p-2 my-2">{{ Session::get('messages') }}</div>
                  @endif
                  {{-- End Alert --}}

                  <form action="/user-umum/desa/{{ $desa->id }}/post-ulasan" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id"
                      value='{{ Illuminate\Support\Facades\Auth::user()->id }}'>
                    <input type="hidden" name="village_id" id="village_id" value='{{ $desa->id }}'>
                    <textarea id="ulasan" name="ulasan" rows="4" class="form-control"
                      placeholder="Kritik & Saran Terhadap Desa"></textarea>
                    <button type="submit" class="btn btn-primary btn-lg btn-block mt-2">Kirim</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
