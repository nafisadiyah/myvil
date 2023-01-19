@extends('user-desa.layouts.master')

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
                  <h3 class="mb-0">Kritik dan Saran</h3>
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
                    <th>Ulasan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($ulasan as $item)
                      <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td class="table-user">
                          <img src="/foto/{{ $item->user->foto }}" class="avatar rounded-circle mr-3">
                          <b>{{ $item->user->nama }}</b>
                        </td>
                        <td>{{ $item->deskripsi }}</td>
                      </tr>
                  @endforeach
                  {{-- <tr>
                    <td>1</td>
                    <td class="table-user">
                      <img src="/foto/avatar-1.png" class="avatar rounded-circle mr-3">
                      <b>Nama User</b>
                    </td>
                    <td>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non fuga natus velit minima, hic ex delectus quo vero corporis deserunt quis id neque repellendus tenetur enim mollitia pariatur sunt error. Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia neque nobis ad blanditiis, consectetur sapiente aliquam delectus dolorem sit nostrum, beatae, perspiciatis dolore? Consequuntur, delectus recusandae ullam odit accusantium saepe! Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </td>
                  </tr> --}}
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
$('.delete-confirm').on('click', function (event) {
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