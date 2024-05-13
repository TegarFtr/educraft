@extends('admin.layout.master')
@section('activeKategori', 'active')

@section('contentAdmin')
<section class="content-header">
    <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
        Kelas
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
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Kategori</h3>

              <div class="card-tools">
                    <a class="btn btn-info btn-sm" href="javascript:;" data-toggle="modal" data-target="#myModal">Add new</a>
              </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover datatable">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Kode Kelas</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($kelas as $key => $cat)
                         <tr>
                             <td><?php echo $key+1 ?></td>
                             <td><?php echo $cat['name'] ?></td>
                             <td><?php echo $cat['kode_kelas'] ?></td>
                             <th>
                                 <a href="javascript:;" class="btn btn-info" data-toggle="modal" data-target="#editKategori{{ $cat['id'] }}">Edit</a>
                                 <a href="javascript:;" class="btn btn-danger" data-toggle="modal" data-target="#hapusKategori{{ $cat['id'] }}">Hapus</a>
                             </th>
                         </tr>

                         <div class="modal fade" id="editKategori{{ $cat['id'] }}" role="dialog">
                            <div class="modal-dialog">

                            <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h4 class="modal-title">Add new category</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('tambahkelasmaster')}}" method="POST" class="database_operation">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="">Enter category name</label>
                                                            {{ csrf_field()}}
                                                            <input type="hidden" name="id" value="{{ $cat['id'] }}">
                                                            <input type="text" required="required" name="name" value="{{ $cat['name'] }}" placeholder="Enter category name" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <button class="btn btn-primary">Edit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="hapusKategori{{ $cat['id'] }}">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
                                </div>
                                <div class="modal-body">
                                    <h5 class="text-center">Apakah anda yakin akan menghapus data ini? <br>
                                        <span class="text-danger">{{ $cat['name'] }}</span>
                                    </h5>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ url('kategori/hapuskategori/'.$cat['id']) }}">
                                        <button type="submit" class="btn btn-danger" name="hsimpan">Hapus</button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        @endforeach
                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
<!-- /.content-header -->

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Tambah Kelas</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ url('tambahkelasmaster')}}" class="database_operation">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Masukkan Nama Kelas</label>
                                    {{ csrf_field()}}
                                    <input type="text" required="required" name="name" placeholder="Masukkan Nama Kelas" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </div>
                </form>
            </div>

        </div>
    </div>
</div>



@endsection
