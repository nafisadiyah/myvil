@extends('user-umum.layouts.master')

@section('content')

  <!-- Page content -->
  <div class="container mt-4">
    <div class="row">
      <div class="col-lg-3">
        <h2 class="mb-0">Desa</h2>
        <p class="mb-3">Lihat situasi desa dan lihat permasalahannya.</p>

      </div>
      <div class="col-lg-9">
        <div class="row">
          <div class="col">
            <div class="form-group">
              <select class="form-control" id="exampleFormControlSelect1">
                <option>Provinsi</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <select class="form-control" id="exampleFormControlSelect1">
                <option>Kabupaten</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <select class="form-control" id="exampleFormControlSelect1">
                <option>Kecamatan</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <select class="form-control" id="exampleFormControlSelect1">
                <option>A-Z</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="row card-wrapper">
      @foreach ($desa as $d)
        <div class="col-lg-4">
          <div class="card-wrapper">
            <!-- Desa -->
            <div class="card text-center">
              <!-- Card body -->
              <div class="card-body">
                <img src="{{ asset('/foto/' . $d->user->foto) }}"
                  class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="width: 140px;">
                <div class="pt-4 text-center">
                  <h5 class="h3 title">
                    <span class="d-block mb-1">{{ $d->user->nama }}</span>
                  </h5>
                  <span class="d-block mb-1">Kec. {{ $d->kecamatan }}, {{ $d->kota }}</span>
                </div>
              </div>
              <div class="card-footer">
                <a href="/user-umum/desa/{{ $d->id }}" class=" text-muted">Detail</a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endsection
