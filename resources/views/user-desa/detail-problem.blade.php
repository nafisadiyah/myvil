@extends('user-desa.layouts.master')

@section('content')

  <!-- Page content -->
  <div class="container mt-4">
    <div class="col-lg-12">
      <div class="card-wrapper">
        <!-- Card -->
        <div class="card card-pricing border-0 text-center mb-4">
          <h3 class="card-title title h2 my-4">{{ $home->judul }}</h3>
          <div class="dropdown-divider"></div>
          <div class="card-body px-lg-7">
            <div class="card-deck">
              <div class="card">
                <!-- Card body -->
                <img alt="Image placeholder" src="{{ asset('/lampiran1/' . $home->lampiran_1) }}"
                  class="img-fluid rounded">
              </div>
              <!-- Username card -->
              <div class="card">
                <!-- Card body -->
                <img alt="Image placeholder" src="{{ asset('/lampiran2/' . $home->lampiran_2) }}"
                  class="img-fluid rounded">
              </div>
            </div>
          </div>
          <div class="px-lg-7">
            <div class="card-body">
              <p class="card-text mb-5 text-justify">{{ $home->deskripsi }}</p>
              <h3 class="card-title mb-2 text-left">Saran dan harapan desa mengenai penyelesaian permasalah:</h3>
              <p class="card-text mb-5 text-justify">{{ $home->saran }}</p>
              <h3 class="card-title mb-2 text-left">Status problem:
                @if ($home->status->id == 1)
                  <div class="badge rounded-pill badge-secondary py-2 px-3 mx-2">{{ $home->status->nama }}</div>
                @elseif($home->status->id == 2)
                  <div class="badge rounded-pill badge-warning py-2 px-3 mx-2">{{ $home->status->nama }}</div>
                @elseif($home->status->id == 3)
                  <div class="badge rounded-pill badge-danger py-2 px-3 mx-2">{{ $home->status->nama }}</div>
                @elseif($home->status->id == 4)
                  <div class="badge rounded-pill badge-info py-2 px-3 mx-2">{{ $home->status->nama }}</div>
                @elseif($home->status->id == 5)
                  <div class="badge rounded-pill badge-success py-2 px-3 mx-2">{{ $home->status->nama }}</div>
                @endif
              </h3>
            </div>
          </div>
          <div class="card-footer">
            <a class="btn btn-primary" href="{{ route('user-desa.proposal-masuk', $home->id) }}">Lihat Proposal
              Masuk</a>
          </div>
        </div>
      </div>
    </div>
  @endsection
