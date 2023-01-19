@extends('super-admin.layouts.master')

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
      @if (session('errors'))
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
          <div class="card-header border-0">
            <div class="row">
              <div class="col-6">
                <h3 class="mb-0">Permasalahan Yang Diterima</h3>
              </div>
              <div class="col-6 text-right">
                <button class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="modal" data-target="#modalPesan">
                  <span class="btn-inner--icon"><i class="fa fa-plus"></i></span>
                  <span class="btn-inner--text">Tambah</span>
                </button>
              </div>
            </div>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  {{-- <th>Created_At</th>
                  <th>Updated_At</th> --}}
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($desa as $u)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="table-user">
                      <img src="{{ asset('/foto/' . $u->user->foto) }}" class="avatar rounded-circle mr-3">
                      <b>{{ $u->user->nama }}</b>
                    </td>
                    <td class="budget">
                      {{ $u->user->email }}
                    </td>
                    <td class="budget">
                      {{ $u->kecamatan }}, {{ $u->kota }}, {{ $u->provinsi }}
                    </td>
                    {{-- <td class="budget">
                      {{ $u->created_at }}
                    </td>
                    <td class="budget">
                      {{ $u->updated_at }}
                    </td> --}}
                    <td class="table-actions">
                      <a href="#modalUpdateVarian{{ $u->user->id }}" class="table-action" data-toggle="modal"
                        data-target="">
                        <i class="fas fa-user-edit"></i>
                      </a>
                      <a href="/super-admin/delete/{{ $u->user->id }}"
                        class="table-action table-action-delete delete-confirm">
                        <i class="fas fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                  <!-- Modal Tambah-->
                  <div class="modal fade" id="modalPesan" tabindex="-1" aria-labelledby="modalPesan"
                    aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Silahkan Masukkan Data User Desa</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <!--FORM TAMBAH USER-->
                          <form action="/super-admin/user-desa-register" method="POST" class="needs-validation"
                            novalidate="" role="form">
                            @csrf
                            <div class="form-group">
                              <label for="">Nama Desa</label>
                              <input type="text" class="form-control" name="nama" value="">
                            </div>
                            <div class="form-group">
                              <label for="">Email</label>
                              <input type="email" class="form-control" name="email" value="">
                            </div>
                            <div class="form-group">
                              <label for="">Password</label>
                              <input type="password" class="form-control" name="password" value="">
                            </div>
                            <div class="form-group">
                              <label for="">Kecamatan</label>
                              <input type="text" class="form-control" name="kecamatan" value="">
                            </div>
                            <div class="form-group">
                              <label for="">Kabupaten/Kota</label>
                              <input type="text" class="form-control" name="kota" value="">
                            </div>
                            <div class="form-group">
                              <label for="">Provinsi</label>
                              <input type="text" class="form-control" name="provinsi" value="">
                            </div>
                            <div class="form-group">
                              <input type="hidden" name="role_id" value="2">
                              <input type="hidden" name="foto" value="avatar-1.png">
                            </div>
                            <div class="text-center">
                              <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                            </div>
                          </form>
                          <!--END FORM TAMBAH USER-->
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal Tambah-->

                  <!-- Modal Update Varian-->
                  <div class="modal fade" id="modalUpdateVarian{{ $u->user->id }}" tabindex="-1"
                    aria-labelledby="modalUpdateVarian" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Edit Data User Desa</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <!--FORM UPDATE VARIAN-->
                          <form action="{{ route('super-admin.update-desa', $u->user->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                              <label for="">Nama Desa</label>
                              <input type="text" class="form-control" id="updateNamaBarang" name="nama"
                                value="{{ $u->user->nama }}">
                            </div>
                            <div class="form-group">
                              <label for="">Email</label>
                              <input type="email" class="form-control" id="updateNamaBarang" name="email"
                                value="{{ $u->user->email }}">
                            </div>
                            <div class="form-group">
                              <label for="">Password</label>
                              <input type="password" class="form-control" id="updateNamaBarang" name="password"
                                value="">
                            </div>
                            <div class="form-group">
                              <label for="">Kecamatan</label>
                              <input type="text" class="form-control" id="updateNamaBarang" name="kecamatan"
                                value="{{ $u->kecamatan }}">
                            </div>
                            <div class="form-group">
                              <label for="">Kabupate/Kota</label>
                              <input type="text" class="form-control" id="updateNamaBarang" name="kota"
                                value="{{ $u->kota }}">
                            </div>
                            <div class="form-group">
                              <label for="">Provinsi</label>
                              <input type="text" class="form-control" id="updateNamaBarang" name="provinsi"
                                value="{{ $u->provinsi }}">
                            </div>
                            <div class="text-center">
                              <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                            </div>
                          </form>
                          <!--END FORM UPDATE VARIAN-->
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal UPDATE Varian-->
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
