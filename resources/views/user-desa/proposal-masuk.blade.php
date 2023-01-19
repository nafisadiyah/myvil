@extends('user-desa.layouts.master')

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
                <h3 class="mb-0">Proposal Yang Diusulkan</h3>
              </div>
            </div>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th>No</th>
                  <th>Nama Pengirim</th>
                  <th>Judul Proposal</th>
                  <th>Jumlah Anggota</th>
                  <th>Deskripsi Singkat</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($proposal as $pr)
                  @if ($pr->status->id == 6)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td class="table-user">
                        <img src="{{ asset('/foto/' . $pr->user->foto) }}" class="avatar rounded-circle mr-3">
                        <b>{{ $pr->user->nama }}</b>
                      </td>
                      <td>
                        <p>{{ $pr->judul }}</p>
                      </td>
                      <td>
                        <p>{{ $pr->jumlah_anggota }}</p>
                      </td>
                      <td>
                        <p>{{ $pr->deskripsi }}</p>
                      </td>
                      <td class="table-actions">
                        <form>
                          <div class="form-group">
                          </div>
                          <a class="btn btn-icon btn-primary btn-sm mr-2" href="{{ asset('/lampiran/' . $pr->lampiran) }}" download="">
                            <span class="btn-inner--icon"><i class="ni ni-cloud-download-95"></i></span>
                          </a>
                        </form>
                      </td>
                    </tr>
                  @elseif($pr->status->id != 6)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td class="table-user">
                        <img src="{{ asset('/foto/' . $pr->user->foto) }}" class="avatar rounded-circle mr-3">
                        <b>{{ $pr->user->nama }}</b>
                      </td>
                      <td>
                        <p>{{ $pr->judul }}</p>
                      </td>
                      <td>
                        <p>{{ $pr->jumlah_anggota }}</p>
                      </td>
                      <td>
                        <p>{{ $pr->deskripsi }}</p>
                      </td>
                      <td class="table-actions">
                        <div class="row">
                        <form>
                          <div class="form-group">
                          </div>
                          <a class="btn btn-icon btn-primary btn-sm mr-2" href="{{ asset('/lampiran/' . $pr->lampiran) }}" download="">
                            <span class="btn-inner--icon"><i class="ni ni-cloud-download-95"></i></span>
                          </a>
                        </form>
                        <form action="{{ route('user-desa.proposal-masuk-terima', $pr->id) }}" method="POST">
                          @csrf
                          @method('put')
                          <div class="form-group">
                            <input type="hidden" name="status_id" value="6">
                            <input type="hidden" name="problem_status_id" value="4">
                          </div>
                          <button class="btn btn-icon btn-success btn-sm ml-2" type="submit">
                            <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                          </button>
                        </form>
                      </div>
                      </td>
                    </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  @endsection

  @push('page-scripts')
    {{-- <script src="{{ asset('/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script> --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  @endpush

  @push('after-scripts')
    <script>
      $('.delete-confirm').on('click', function(event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
          title: 'Apakah anda yakin?',
          text: 'Data anda akan dihapus permanen!',
          icon: 'warning',
          buttons: ["Cancel", "Yes!"],
        }).then(function(value) {
          if (value) {
            window.location.href = url;
          }
        });
      });
    </script>
  @endpush
