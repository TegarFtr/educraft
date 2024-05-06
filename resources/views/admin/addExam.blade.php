@extends('admin.layout.master')
@section('activeKuis', 'active')

@section('contentAdmin')
<div class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add questions</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add questions</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

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
                                <th>Question</th>
                                <th>ans</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($questions as $key=>$question)
                              <tr>
                                  <td>{{ $key+1}}</td>
                                  <td>{{ $question['questions']}}</td>
                                  <td>{{ $question['ans']}}</td>
                                  <td><input class="question_status" data-id="{{ $question['id']}}" <?php if($question['status']==1){ echo "checked";} ?> type="checkbox" name="status"></td>
                                  <td>
                                    <a href="javascript:;" class="btn btn-info" data-toggle="modal" data-target="#editPertanyaan{{ $question['id'] }}">Edit</a>
                                    <a href="javascript:;" class="btn btn-danger" data-toggle="modal" data-target="#hapusPertanyaan{{ $question['id'] }}">Hapus</a>
                                  </td>
                              </tr>

                              <div class="modal fade" id="editPertanyaan{{ $question['id'] }}" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <?php
                                        $options = json_decode($question['options']);
                                    ?>
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Add new Question</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                      <form action="{{ url('kuismaster/editpertanyaanbaru')}}" class="database_operation">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Enter Question</label>
                                                        {{ csrf_field()}}
                                                        <input type="hidden" name="exam_id" value="{{ Request::segment(3)}}">
                                                        <input type="hidden" name="id" value="{{ $question['id'] }}">
                                                        <input type="text" required="required" value="{{ $question['questions'] }}" name="question" placeholder="Enter Question" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="">Enter Option 1</label>
                                                        <input type="text" required="required" value="{{ $options->option1 }}" name="option_1" placeholder="Enter Question" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="">Enter Option 2</label>
                                                        <input type="text" required="required" name="option_2" value="{{ $options->option2 }}" placeholder="Enter Option 2" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="">Enter Option 3</label>
                                                        <input type="text" required="required" name="option_3" value="{{ $options->option3 }}" placeholder="Enter  Option 3" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="">Enter Option 4</label>
                                                        <input type="text" required="required" name="option_4" value="{{ $options->option4 }}" placeholder="Enter  Option 4" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                  <label for="">Select correct option</label>
                                                  <select class="form-control" required="required" name="ans">
                                                      <option value="">Select</option>

                                                      <option value="option_1">option 1</option>
                                                      <option value="option_2">option 2</option>
                                                      <option value="option_3">option 3</option>
                                                      <option value="option_4">option 4</option>

                                                  </select>
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

                            <div class="modal fade" id="hapusPertanyaan{{ $question['id'] }}">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
                                    </div>
                                    <div class="modal-body">
                                        <h5 class="text-center">Apakah anda yakin akan menghapus data ini? <br>
                                            <span class="text-danger">{{ $question['id'] }}</span>
                                        </h5>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ url('kuismaster/hapuspertanyaanbaru/'.$question['id']) }}">
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
                            <tr>
                                <th>#</th>
                                <th>Question</th>
                                <th>ans</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
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
    </div>
    <!-- /.content-header -->

    <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add new Question</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="{{ url('kuismaster/tambahpertanyaanbaru')}}" class="database_operation">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Enter Question</label>
                            {{ csrf_field()}}
                            <input type="hidden" name="exam_id" value="{{ Request::segment(3)}}">
                            <input type="text" required="required" name="question" placeholder="Enter Question" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Enter Option 1</label>
                            <input type="text" required="required" name="option_1" placeholder="Enter Question" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Enter Option 2</label>
                            <input type="text" required="required" name="option_2" placeholder="Enter Option 2" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Enter Option 3</label>
                            <input type="text" required="required" name="option_3" placeholder="Enter  Option 3" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Enter Option 4</label>
                            <input type="text" required="required" name="option_4" placeholder="Enter  Option 4" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="">Select correct option</label>
                      <select class="form-control" required="required" name="ans">
                          <option value="">Select</option>

                          <option value="option_1">option 1</option>
                          <option value="option_2">option 2</option>
                          <option value="option_3">option 3</option>
                          <option value="option_4">option 4</option>

                      </select>
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
