@extends('layout.master')
@section('title', 'OneLearn | Materi')
@section('activeMateri', 'active')

@section('content')
<div class="container-fluid" style="margin-top: 100px">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center"><b>{{ $materi->title }}</b></h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h4><b>Penjelasan Singkat Materi</b></h4>
                        </div>
                        <div class="col-12">
                            <p class="text-justify">{{ $materi->deskripsi }}</p>
                        </div>
                        <div class="col-12 mt-3">
                            <iframe src="{{ url('materi/bacamateri/lihatpdf/' . $materi->id) }}" width="100%" height="600" allowfullscreen></iframe>
                        </div>
                        <div class="col-4 mt-3">
                            <h5>Download File PDF :</h5>
                            <a href="{{ asset($materi->file) }}" class="btn btn-block btn-outline-danger" style="width: 20%">PDF</a>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        <a href="{{ url('dashboard') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
