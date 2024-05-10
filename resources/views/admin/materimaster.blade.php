@extends('admin.layout.master')
@section('activeMateri', 'active')

@section('contentAdmin')
<section class="content-header">
    <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
        Materi Master
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
              <h3 class="card-title">Materi Master</h3>

              <div class="card-tools">
                    <a class="btn btn-info btn-sm" href="javascript:;" data-toggle="modal" data-target="#myModal">Add new</a>
              </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Deskripsi</th>
                            <th>Category</th>
                            <th>Sampul</th>
                            <th>Akses</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($materi as $key=>$d)
                           <tr>
                               <td>{{ $key+1}}</td>
                               <td>{{ $d['title']}}</td>
                               <td>{{ $d['deskripsi']}}</td>
                               <td>{{ $d['category']}}</td>
                               <td>{{ $d['sampul']}}</td>
                               <td>{{ $d['akses']}}</td>
                               <td>
                                    <a href="javascript:;" class="btn btn-info" data-toggle="modal" data-target="#editKuis{{ $d['id'] }}">Edit</a>
                                    <a href="javascript:;" class="btn btn-danger" data-toggle="modal" data-target="#hapusKuis{{ $d['id'] }}">Hapus</a>
                               </td>
                           </tr>

                           <div class="modal fade" id="editKuis{{ $d['id'] }}" role="dialog">
                                <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h4 class="modal-title">Add new Materi</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{ url('kuismaster/editkuis')}}" class="database_operation">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Enter title</label>
                                                        {{ csrf_field()}}
                                                        <input type="hidden" name="id" value="{{ $d['id'] }}">
                                                        <input type="text" required="required" name="title" value="{{ $d['title'] }}" placeholder="Enter title" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Enter Date</label>
                                                        <input type="date" required="required" name="exam_date" value="{{ $d['d_date'] }}"  class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="">Enter duration (in minutes)</label>
                                                    <input type="text" required="required" name="exam_duration" value="{{ $d['exam_duration'] }}" class="form-control">
                                                </div>
                                            </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Select category</label>
                                                        <select class="form-control" required="required"  name="exam_category">
                                                            <option value="">Select</option>
                                                            @foreach ($category as $cat)
                                                            <option value="{{ $cat['id']}}">{{ $cat['name']}}</option>
                                                            @endforeach
                                                        </select>
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

                            <div class="modal fade" id="hapusKuis{{ $d['id'] }}">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
                                    </div>
                                    <div class="modal-body">
                                        <h5 class="text-center">Apakah anda yakin akan menghapus data ini? <br>
                                            <span class="text-danger">{{ $d['title'] }}</span>
                                        </h5>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ url('kuismaster/hapuskuis/'.$d['id']) }}">
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

      <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add new Exam</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="{{ url('kuismaster/tambahkuis')}}" class="database_operation">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Judul Materi</label>
                            {{ csrf_field()}}
                            <input type="text" required="required" name="title" placeholder="Masukkan Judul Materi" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Deskripsi Materi</label>
                            <input type="text" required="required" name="deskripsi" placeholder="Masukkan Deskripsi Materi"  class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Select category</label>
                            <select class="form-control" required="required" name="exam_category">
                                <option value="">Select</option>
                                @foreach ($category as $cat)
                                <option value="{{ $cat['id']}}">{{ $cat['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Sampul Materi</label>
                            <input type="file" required="required" name="sampul"  class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Akses</label>
                            <select class="form-control" required="required" name="exam_category" onchange="showHideKelas(this.value)">
                                <option value="">Select</option>
                                <option value="umum">Umum</option>
                                <option value="privat">Privat</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12" id="kelasDiv" style="display:none;">
                        <div class="form-group">
                            <label for="">Kelas</label>
                            <input type="text" required="required" name="kelas" placeholder="Masukkan Kode Kelas" class="form-control">
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

@push('scripts')
<script>
    function showHideKelas(value) {
        var kelasDiv = document.getElementById("kelasDiv");
        if (value === "privat") {
            kelasDiv.style.display = "block";
        } else {
            kelasDiv.style.display = "none";
        }
    }
</script>
@endpush
