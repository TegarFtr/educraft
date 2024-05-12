@extends('layout.master')
@section('title', 'OneLearn | Kuis')
@section('activeKuis', 'active')

@section('content')
<section class="content">
    <div class="container-fluid" style="margin-top: 75px">
      <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">

            <!-- Default box -->
            <!-- /.card -->
            <div class="card mt-4">

                <div class="card-body">
                    <h2>Student information</h2>
                    <table class="table">
                        <tr>
                            <td>Name : </td>
                            <td>{{ $student_info->nama}}</td>
                        </tr>
                        <tr>
                            <td>NIS : </td>
                            <td>{{ $student_info->nis}}</td>
                        </tr>
                        {{-- <tr>
                            <td>DOB : </td>
                            <td>{{ $student_info->dob}}</td>
                        </tr> --}}
                        <tr>
                            <td>Exam name : </td>
                            <td>{{ $exam_info->title}}</td>
                        </tr>
                        <tr>
                            <td>Exam date : </td>
                            <td>{{ $exam_info->exam_date}}</td>
                        </tr>
                    </table>
                    <h2>Result info</h2>
                    <table class="table">
                        <tr>
                            <td>Correst ans : </td>
                            <td>{{ $result_info->yes_ans}}</td>
                        </tr>
                        <tr>
                            <td>Wrong ans : </td>
                            <td>{{ $result_info->no_ans}}</td>
                        </tr>
                        <tr>
                            <td>Total : </td>
                            <td>{{ ($result_info->yes_ans/($result_info->yes_ans+$result_info->no_ans))*100 }} / 100</td>
                        </tr>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            </div>
      </div>
    </div>
  </section>
@endsection


