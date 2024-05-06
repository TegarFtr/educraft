@extends('admin.layout.master')
@section('activeKuis', 'active')

@section('contentAdmin')

<section class="content-header">
    <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
        Kuis Master
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
              <h3 class="card-title">Title</h3>

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
                            <th>Category</th>
                            <th>Exam Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($exams as $key=>$exam)
                           <tr>
                               <td>{{ $key+1}}</td>
                               <td>{{ $exam['title']}}</td>
                               <td>{{ $exam['cat_name']}}</td>
                               <td>{{ $exam['exam_date']}}</td>
                               <td><input type="checkbox" class="exam_status" data-id="{{ $exam['id']}}" <?php if($exam['status']==1){ echo "checked";} ?> name="status"></td>
                               <td>
                                    <a href="javascript:;" class="btn btn-info" data-toggle="modal" data-target="#editKuis{{ $exam['id'] }}">Edit</a>
                                    <a href="javascript:;" class="btn btn-danger" data-toggle="modal" data-target="#hapusKuis{{ $exam['id'] }}">Hapus</a>
                                    <a href="{{ url('kuismaster/tambahpertanyaan/'.$exam['id'])}}" class="btn btn-primary">Tambah Pertanyaan</a>
                               </td>
                           </tr>

                           <div class="modal fade" id="editKuis{{ $exam['id'] }}" role="dialog">
                                <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h4 class="modal-title">Add new Exam</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{ url('kuismaster/editkuis')}}" class="database_operation">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Enter title</label>
                                                        {{ csrf_field()}}
                                                        <input type="hidden" name="id" value="{{ $exam['id'] }}">
                                                        <input type="text" required="required" name="title" value="{{ $exam['title'] }}" placeholder="Enter title" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Enter Date</label>
                                                        <input type="date" required="required" name="exam_date" value="{{ $exam['exam_date'] }}"  class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="">Enter duration (in minutes)</label>
                                                    <input type="text" required="required" name="exam_duration" value="{{ $exam['exam_duration'] }}" class="form-control">
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

                            <div class="modal fade" id="hapusKuis{{ $exam['id'] }}">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
                                    </div>
                                    <div class="modal-body">
                                        <h5 class="text-center">Apakah anda yakin akan menghapus data ini? <br>
                                            <span class="text-danger">{{ $exam['title'] }}</span>
                                        </h5>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ url('kuismaster/hapuskuis/'.$exam['id']) }}">
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
                            <label for="">Enter title</label>
                            {{ csrf_field()}}
                            <input type="text" required="required" name="title" placeholder="Enter title" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Enter Date</label>
                            <input type="date" required="required" name="exam_date"  class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                          <label for="">Enter duration (in minutes)</label>
                          <input type="text" required="required" name="exam_duration"  class="form-control">
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
