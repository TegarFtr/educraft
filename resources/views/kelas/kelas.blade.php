@extends('layout.master')
@section('title', 'OneLearn | Kelas')
@section('activeKelas', 'active')

@section('content')
    @if ($kelas)
        <div class="container-fluid" style="margin-top: 50px">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg " >
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="nav nav-underline navbar-nav me-auto mb-2 mb-lg-0" id="custom-tabs-four-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-semua-materi-tab" data-toggle="pill" href="#custom-tabs-semua-materi" role="tab" aria-controls="custom-tabs-semua-materi" aria-selected="true">Materi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-sejarah-tab" data-toggle="pill" href="#custom-tabs-sejarah" role="tab" aria-controls="custom-tabs-sejarah" aria-selected="false">Kuis</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-semua-materi" role="tabpanel" aria-labelledby="custom-tabs-semua-materi-tab">
                        <div class="row">
                            @foreach ($materi as $key => $m)
                                <div class="col-3 mt-2">
                                    <a href="javascript:;" data-toggle="modal" data-target="#semuakuis{{ $m->id }}">
                                        <div class="card border-secondary" style="height: 220px">
                                            <div class="card-header">
                                                <img src="{{ asset($m->sampul) }}" class="card-img-top" alt="..." style="height: 100px">
                                            </div>
                                            <div class="card-body">
                                                <h3 class="card-title">{{ $m->title }}</h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="modal fade" id="semuakuis{{ $m->id }}">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <img src="{{ asset($m->sampul) }}" alt="" width="465">
                                        </div>
                                        <div class="modal-body">
                                            <h1 class="text-center"><b>{{ $m->title }}</b></h1>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{ url('kuis/mulaikuis/'.$m->id) }}" class="btn btn-success">Mulai Kuis Sekarang</a>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-sejarah" role="tabpanel" aria-labelledby="custom-tabs-sejarah-tab">
                        @foreach ($kuis as $key => $k)
                                <div class="col-3 mt-2">
                                    <a href="javascript:;" data-toggle="modal" data-target="#sejarahkuis{{ $k->id }}">
                                        <div class="card border-secondary" style="height: 220px">
                                            <div class="card-header">
                                                <img src="{{ asset($k->sampul) }}" class="card-img-top" alt="..." style="height: 100px">
                                            </div>
                                            <div class="card-body">
                                                <h3 class="card-title">{{ $k->title }}</h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="modal fade" id="sejarahkuis{{ $k->id }}">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <img src="{{ asset($k->sampul) }}" alt="" width="465">
                                        </div>
                                        <div class="modal-body">
                                            <h1 class="text-center"><b>{{ $k->title }}</b></h1>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{ url('kuis/mulaikuis/'.$k->id) }}" class="btn btn-success">Mulai Kuis Sekarang</a>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                        @endforeach
                    </div>
                    </div>
                <!-- /.card -->
            </div>
            </div>
        </div>
    @else
        <div class="container" style="height: 100vh; display: flex; justify-content: center; align-items: center;">
            <div class="col-4">
                <div class="card border-secondary pt-4 pb-5">
                    <div class="card-header">
                        <div class="card-header">
                            <img src="{{ asset('img/logo1.png') }}" class="card-img-top" alt="...">
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Masuk ke Kelas</h5>
                        <form action="{{ url('join-kelas') }}" method="get" class="input-group">
                            <input type="text" id="searchInput" name="kode_kelas" class="form-control float-right" placeholder="Masukkan Kode Kelas...">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-secondary">
                                    Gabung
                                </button>
                            </div>
                        </form>
                        <br>
                        <div class="container-fluid">
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
