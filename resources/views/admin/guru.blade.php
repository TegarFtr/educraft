@extends('admin.layout.master')
@section('activeAdmin', 'active')
@section('title', 'Simpus | Petugas')

@section('contentAdmin')
    <section class="content-header">
        <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            Data Guru
            <small>
                <script type='text/javascript'>
                    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                    var date = new Date();
                    var day = date.getDate();
                    var month = date.getMonth();
                    var thisDay = date.getDay(),
                        thisDay = myDays[thisDay];
                    var yy = date.getYear();
                    var year = (yy < 1000) ? yy + 1900 : yy;
                    document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                    //
                </script>
            </small>
        </h1>
    </section>
    <div class="container-fluid">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="container-fluid ">
        <div class="row">
          <div class="col-12">
            <div class="card mt-2">
              <div class="card-header">
                <h3 class="card-title">Data Guru</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 620px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                        <th>NO</th>
                        <th>ID Guru</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $val)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $val->nis }}</td>
                        <td>{{ $val->nama }}</td>
                        <td>{{ $val->username }}</td>
                        <td>{{ $val->password_login }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit{{ $val->id }}"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalHapus{{ $val->id }}"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>

                    {{-- Modal Edit --}}
                    <div class="modal fade" id="modalEdit{{ $val->id }}">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data Anggota</h1>
                            </div>
                            <form action="{{ route('guru.update', $val->id) }}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="nis" class="form-label">ID Petugas</label>
                                        <input type="text" class="form-control" id="nis" name="nis" value="{{ $val->nis }}" placeholder="Masukkan ID Petugas" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $val->nama }}" placeholder="Masukkan Nama" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text"  class="form-control" id="username" name="username" value="{{ $val->username }}" placeholder="Masukkan Username"/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="text"  class="form-control" id="password" name="password" value="{{ $val->password_login }}" placeholder="Masukkan Username"/>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="tsimpan">Tambahkan</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                    {{-- Modal Hapus --}}
                    <div class="modal fade" id="modalHapus{{ $val->id }}">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
                            </div>
                            <div class="modal-body">
                                <h5 class="text-center">Apakah anda yakin akan menghapus data ini? <br>
                                    <span class="text-danger">{{ $val->nama }} - {{ $val->nis }}</span>
                                </h5>
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('guru.destroy', $val->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger" name="hsimpan">Hapus</button>
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                                </form>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                    @endforeach

                  </tbody>
                </table>

              </div>
              <!-- /.card-body -->
              <div class="card-footer text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                        <i class="fa-solid fa-user-plus"></i>
                        Tambah Data
                    </button>
                </div>

                <div class="modal fade" id="modalTambah">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Anggota</h1>
                            </div>
                            <form action="{{ route('guru.store') }}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="nis" class="form-label">ID Petugas</label>
                                        <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan ID Petugas" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text"  class="form-control" id="username" name="username" placeholder="Masukkan Username"/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="text"  class="form-control" id="password" name="password" placeholder="Masukkan Password"/>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="tsimpan">Tambahkan</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
            </div>
            <!-- /.card -->
          </div>
        </div>
    </div>
@endsection
