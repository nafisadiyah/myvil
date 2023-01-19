@extends('super-admin.layouts.master')

@section('content')
    <!-- Page content -->
<div class="container mt-4">
    <div class="col-lg-12">
      @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            {{Session::get('success')}}
            </div>
      @endif
        <div class="card-wrapper">
          <!-- Card -->
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <div class="row">
                <div class="col-6">
                  <h3 class="mb-0">Permasalahan Yang Ditolak</h3>
                </div>
              </div>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>No</th>
                    <th>Nama Pengusul</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Judul Permasalahan</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($problemTolak as $p)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="table-user">
                      <img src="{{ asset('/foto/'.$p->user->foto) }}" class="avatar rounded-circle mr-3">
                      <b>{{ $p->user->nama }}</b>
                    </td>
                    <td>
                      <span class="text-muted">{{ $p->created_at }}</span>
                    </td>
                    <td>
                      <a href="{{ route('super-admin.detail-permasalahan', $p->id)}}" class="font-weight-bold">{{ $p->judul }}</a>
                    </td>
                    <td class="table-actions">
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>
                        <span class="status">Ditolak</span>
                      </span>
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