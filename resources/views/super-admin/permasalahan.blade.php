@extends('super-admin.layouts.master')

@section('content')
    <!-- Page content -->
<div class="container mt-4">
    <div class="col-lg-12">
        <div class="card-wrapper">
          <!-- Card -->
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <div class="row">
                <div class="col-6">
                  <h3 class="mb-0">Permasalahan Yang Diusulkan</h3>
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
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($problem as $p)
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
                      <div class="row">
                        <form action="{{ route('super-admin.update-terima', $p->id)}}" method="POST">
                          @csrf
                          @method('put')
                          <div class="form-group">
                          <input type="hidden"  name="status_id" value="2">
                          </div>
                          <button class="btn btn-icon btn-success btn-sm mr-2" type="submit">
                            <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                          </button>
                        </form>
                        <form action="{{ route('super-admin.update-tolak', $p->id)}}" method="POST">
                          @csrf
                          @method('put')
                          <div class="form-group">
                          <input type="hidden"  name="status_id" value="3">
                          </div>
                        <button class="btn btn-icon btn-danger btn-sm ml-2" type="submit">
                            <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                          </button>
                        </form>
                      </div>
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

@push('page-scripts')
<script src="/vendor/sweetalert2/dist/sweetalert2.min.js"></script>

@endpush

@push('after-scripts')
<script>
  
</script>
@endpush