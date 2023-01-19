@extends('user-umum.layouts.master')

@section('content')

  <!-- Page content -->
  <div class="container mt-4">
    <div class="col-lg-12">
      @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          {{ Session::get('success') }}
        </div>
      @endif
      <div class="card-wrapper">
        <!-- Card -->
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <div class="row">
              <div class="col-6">
                <h3 class="mb-0">Proposal Saya</h3>
              </div>
            </div>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th>No</th>
                  <th>Desa</th>
                  <th>Judul Problem</th>
                  <th>Tanggal Pengajuan Proposal</th>
                  <th>Status</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($proposals as $item)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td class="table-user">
                      <img src="/foto/{{ $item->problem->user->foto }}" class="avatar rounded-circle mr-3">
                      <b>{{ $item->problem->user->nama }}</b>
                    </td>
                    <td class="h3">{{ $item->problem->judul }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                      @if ($item->status->id == 1)
                        <div class="badge rounded-pill badge-dark text-white py-2 px-3 mx-2">
                          {{ $item->status->nama }}
                        </div>
                      @elseif($item->status->id == 6)
                        <div class="badge rounded-pill badge-success py-2 px-3 mx-2">Disetujui</div>
                      @elseif($item->status->id == 3)
                        <div class="badge rounded-pill badge-danger py-2 px-3 mx-2">{{ $item->status->nama }}</div>
                      @endif
                    </td>
                    <td>
                      <button class="btn btn-info btn-sm"> Detail </button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  @endsection
