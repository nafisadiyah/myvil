@extends('super-admin.layouts.master')

@section('content')

<!-- Page content -->
<div class="container mt-4">
    <div class="col-lg-12">
        <div class="card-wrapper">
          <!-- Card -->
          <div class="card card-pricing border-0 text-center mb-4">
            <div class="card-body px-lg-7">
              <h3 class="card-title mb-4">{{ $problems->judul }}</h3>
              <div class="card-deck">
                <div class="card">
                  <!-- Card body -->
                  <img alt="Image placeholder" src="{{ asset('/lampiran1/'.$problems->lampiran_1) }}" class="img-fluid rounded">
                </div>
                <!-- Username card -->
                <div class="card">
                  <!-- Card body -->
                  <img alt="Image placeholder" src="{{ asset('/lampiran2/'.$problems->lampiran_2) }}" class="img-fluid rounded">
                </div>
              </div>
            </div>
            <div class="px-lg-7">
                <div class="card-body">
                    <p class="card-text mb-5 text-justify">{{ $problems->deskripsi }}</p>
                        <h3 class="card-title mb-2 text-left">Saran dan harapan desa mengenai penyelesaian permasalah:</h3>
                        <p class="card-text mb-2 text-justify">{{ $problems->saran }}</p>
                  </div>
              </div>
      </div>
      </div>
      </div>
@endsection
