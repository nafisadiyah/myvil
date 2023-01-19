@extends('user-desa.layouts.master')

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
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <h3 class="mb-0 text-center">Pengajuan Permasalahan</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
              <form action="/user-desa/form-input" class="MultiFile-intercepted"
              method="POST" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                  <label class="form-control-label" for="exampleFormControlInput1">Judul Permasalahan</label>
                  <input name="judul" type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
                  <input type="hidden"  name="status_id" value="1">
                </div>
                <div class="form-group">
                  <label class="form-control-label" for="exampleFormControlTextarea1">Deskripsi Permasalahan</label>
                  <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="exampleFormControlTextarea1">Saran dan Harapan Terkait Permasalahan</label>
                    <textarea name="saran" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <div class="form-group">
                    <h4 class="form-control-label text-left" for="exampleFormControlInput1">Foto Lampiran 1</h4>
                    <input name="lampiran1" class="form-control-file border" type="file" name="proposal" placeholder="">
                  </div>
                  <div class="form-group">
                    <h4 class="form-control-label text-left" for="exampleFormControlInput1">Foto Lampiran 2</h4>
                    <input name="lampiran2" class="form-control-file border" type="file" name="proposal" placeholder="">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Kirim</button>
                </div>
              </form>
            </div>
          </div>
      </div>
      </div>
@endsection
