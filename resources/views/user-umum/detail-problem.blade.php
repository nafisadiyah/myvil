@extends('user-umum.layouts.master')

@section('content')

  <!-- Page content -->
  <div class="container mt-4">
    <div class="col-lg-12">
      @if(session('errors'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Terjadi kesalahan:
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
      <div class="card-wrapper">
        <!-- Card -->
        <div class="card card-pricing border-0 text-center mb-4">
          <h4 class="card-title title h2 mt-4 mb-3">{{ $home->judul }}</h4>
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

          @if ($home->status->id != 4)
            <div class="card-footer">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-form">Kirim
                Proposal</button>
              <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form"
                aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                  <div class="modal-content">
                    <div class="modal-body p-0">
                      <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header">
                          <h3 class="mb-0">Silahkan Masukkan Proposal Anda</h3>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5">
                          <form action="/user-umum/input-proposal" class="MultiFile-intercepted" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              <h4 class="form-control-label text-left" for="exampleFormControlInput1">Judul Proposal</h4>
                              <input name="judul" type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="">
                              <input type="hidden" name="status_id" value="1">
                              <input type="hidden" name="problem_id" value="{{ $home->id }}">
                            </div>
                            <div class="form-group">
                              <h4 class="form-control-label text-left" for="exampleFormControlTextarea1">Deskripsi Singkat
                              </h4>
                              <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1"
                                rows="3"></textarea>
                            </div>
                            <div class="form-group">
                              <h4 class="form-control-label text-left" for="exampleFormControlInput1">Jumlah Anggota
                                Kelompok</h4>
                              <input name="jumlah_anggota" type="text" class="form-control"
                                id="exampleFormControlInput1" placeholder="">
                            </div>
                            <div class="form-group">
                              <h4 class="form-control-label text-left" for="exampleFormControlInput1">Proposal</h4>
                              <input name="lampiran" class="form-control-file border" type="file" name="proposal"
                                placeholder="">
                            </div>
                            <div class="text-center">
                              <button type="submit" class="btn btn-primary my-4">Kirim</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @else
            <div class="card-footer">
              <h4 type="button" class="text-muted disabled">Lihat Progress</h4>
            </div>
          @endif
        </div>
      </div>
    </div>
  @endsection
