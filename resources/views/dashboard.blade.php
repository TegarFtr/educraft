@extends('layout.master')
@section('title', 'OneLearn | Dashboard')
@section('activeDashboard', 'active')

@section('content')

<div class="container">
    <div class="row" style="margin-top: 100px">
        <div class="col-6">
            <div class="card border-secondary pt-4 pb-5" style="height: 200px">
                <div class="card-body">
                  <h5 class="card-title">Kuis</h5>
                  <form action="#" method="get" class="input-group" style="">
                    <input type="text" id="searchInput" name="search" class="form-control float-right" placeholder="Masukkan Kode Kuis...">
                    <div class="card">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">
                                Gabung
                            </button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card border-secondary pt-4 pb-5" style="height: 200px">
                <div class="card-body">
                  <h5 class="card-title">Masuk ke Kelas</h5>
                  <form action="#" method="get" class="input-group" style="">
                    <input type="text" id="searchInput" name="search" class="form-control float-right" placeholder="Masukkan Kode Kelas...">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">
                            Gabung
                        </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12 d-flex align-items-center justify-content-between">
            <div class="d-flex">
                <img src="{{ asset('img/logoBintang.png') }}" width="35" height="35" alt=""><span><h2 class="mr-auto"><b> Aktivitas Terbaru </b></h2></span>
            </div>
            <a href="{{ url('aktivitas') }}" class="btn btn-secondary">Selengkapnya</a>
        </div>
        <div class="col-2 mt-2">
            <div class="card border-secondary" style="height: 220px">
                <div class="card-header">
                    <img src="{{ asset('img/ekonomi.jpeg') }}" class="card-img-top" alt="..." style="height: 100px">
                </div>
                <div class="card-body">
                    <h3 class="card-title">Filosofi Koin</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12 d-flex align-items-center justify-content-between">
            <div class="d-flex">
                <img src="{{ asset('img/logoBintang.png') }}" width="35" height="35" alt=""><span><h2 class="mr-auto"><b> Materi </b></h2></span>
            </div>
            <a href="{{ url('materi') }}" class="btn btn-secondary">Selengkapnya</a>
        </div>
        @foreach ($materi as $key => $m)
            <div class="col-3 mt-2">
                <a href="javascript:;" data-toggle="modal" data-target="#dashboardmateri{{ $m->id }}">
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
            <div class="modal fade" id="dashboardmateri{{ $m->id }}">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <img src="{{ asset($m->sampul) }}" alt="" width="465">
                    </div>
                    <div class="modal-body">
                        <h1 class="text-center"><b>{{ $m->title }}</b></h1>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ url('materi/bacamateri/'.$m->id) }}" class="btn btn-success">Baca Materi Sekarang</a>
                    </div>
                </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        @endforeach
    </div>


    <div class="row mt-5">
        <div class="col-12 d-flex align-items-center justify-content-between">
            <div class="d-flex">
                <img src="{{ asset('img/logoBintang.png') }}" width="35" height="35" alt=""><span><h2 class="mr-auto"><b> Kuis </b></h2></span>
            </div>
            <a href="{{ url('kuis') }}" class="btn btn-secondary">Selengkapnya</a>
        </div>
        @foreach ($kuis as $key => $k)
            <div class="col-3 mt-2">
                <a href="javascript:;" data-toggle="modal" data-target="#dashboardkuis{{ $k->id }}">
                    <div class="card border-secondary" style="height: 220px">
                        <div class="card-header">
                            <img src="#" class="card-img-top" alt="..." style="height: 100px">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">{{ $k->title }}</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="modal fade" id="dashboardkuis{{ $k->id }}">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <img src="#" alt="" width="465">
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

    <div class="row mt-5">
        <div class="col-12 d-flex align-items-center justify-content-between">
            <div class="d-flex">
                <img src="{{ asset('img/logoBintang.png') }}" width="35" height="35" alt=""><span><h2 class="mr-auto"><b> Kelas </b></h2></span>
            </div>
            <a href="{{ url('kelas') }}" class="btn btn-secondary">Selengkapnya</a>
        </div>
        <div class="col-3 mt-2">
            <div class="card border-secondary"style="height: 220px">
                <div class="card-header">
                    <img src="{{ asset('img/sosha.jpeg') }}" class="card-img-top" alt="..." style="height: 100px">
                </div>
                <div class="card-body">
                    <h3 class="card-title">Sosiologi</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
