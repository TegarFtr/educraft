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
            <h2 class="mr-auto"><b> Aktivitas Terbaru</b></h2>
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
        <div class="col-2 mt-2">
            <div class="card border-secondary" style="height: 220px">
                <div class="card-header">
                    <img src="{{ asset('img/math.jpeg') }}" class="card-img-top" alt="..." style="height: 100px">
                </div>
                <div class="card-body">
                    <h3 class="card-title">Perhitungan Gauss</h3>
                </div>
            </div>
        </div><div class="col-2 mt-2">
            <div class="card border-secondary" style="height: 220px">
                <div class="card-header">
                    <img src="{{ asset('img/sejarah.jpeg') }}" class="card-img-top" alt="..." style="height: 100px">
                </div>
                <div class="card-body">
                    <h3 class="card-title">Ilmu Singosari</h3>
                </div>
            </div>
        </div><div class="col-2 mt-2">
            <div class="card border-secondary" style="height: 220px">
                <div class="card-header">
                    <img src="{{ asset('img/sosio.jpeg') }}" class="card-img-top" alt="..." style="height: 100px">
                </div>
                <div class="card-body">
                    <h3 class="card-title">Tanah Candi</h3>
                </div>
            </div>
        </div><div class="col-2 mt-2">
            <div class="card border-secondary" style="height: 220px">
                <div class="card-header">
                    <img src="{{ asset('img/ekonomi.jpeg') }}" class="card-img-top" alt="..." style="height: 100px">
                </div>
                <div class="card-body">
                    <h3 class="card-title">Nilai Ekonomi</h3>
                </div>
            </div>
        </div>
        <div class="col-2 mt-2">
            <div class="card border-secondary" style="height: 220px">
                <div class="card-header">
                    <img src="{{ asset('img/math.jpeg') }}" class="card-img-top" alt="..." style="height: 100px">
                </div>
                <div class="card-body">
                    <h3 class="card-title">Pengukuran Mata Uang</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12 d-flex align-items-center justify-content-between">
            <h2 class="mr-auto"><b> Materi </b></h2>
            <a href="{{ url('materi') }}" class="btn btn-secondary">Selengkapnya</a>
        </div>
        <div class="col-3 mt-2">
            <div class="card border-secondary" style="height: 220px">
                <div class="card-header">
                    <img src="{{ asset('img/dolar.jpeg') }}" class="card-img-top" alt="..." style="height: 100px">
                </div>
                <div class="card-body">
                    <h3 class="card-title">Pengukuran Kuadrat</h3>
                </div>
            </div>
        </div>
        <div class="col-3 mt-2">
            <div class="card border-secondary" style="height: 220px">
                <div class="card-header">
                    <img src="{{ asset('img/inflasi.jpeg') }}" class="card-img-top" alt="..." style="height: 100px">
                </div>
                <div class="card-body">
                    <h3 class="card-title">Kenaikan Inflasi</h3>
                </div>
            </div>
        </div>
        <div class="col-3 mt-2">
            <div class="card border-secondary" style="height: 220px">
                <div class="card-header">
                    <img src="{{ asset('img/merdeka.jpg') }}" class="card-img-top" alt="..." style="height: 100px">
                </div>
                <div class="card-body">
                    <h3 class="card-title">Rahasia Kemerdekaan</h3>
                </div>
            </div>
        </div>
        <div class="col-3 mt-2">
            <div class="card border-secondary" style="height: 220px">
                <div class="card-header">
                    <img src="{{ asset('img/sosial.jpeg') }}" class="card-img-top" alt="..." style="height: 100px">
                </div>
                <div class="card-body">
                    <h3 class="card-title">Pengaruh Sosial</h3>
                </div>
            </div>
        </div>
    </div>


    <div class="row mt-5">
        <div class="col-12 d-flex align-items-center justify-content-between">
            <h2 class="mr-auto"><b> Kuis </b></h2>
            <a href="{{ url('kuis') }}" class="btn btn-secondary">Selengkapnya</a>
        </div>
        <div class="col-3 mt-2">
            <div class="card border-secondary"style="height: 220px">
                <div class="card-header">
                    <img src="{{ asset('img/sosial.jpeg') }}" class="card-img-top" alt="..." style="height: 100px">
                </div>
                <div class="card-body">
                    <h3 class="card-title">Pengaruh Sosial #1</h3>
                </div>
            </div>

        </div>
        <div class="col-3 mt-2">
            <div class="card border-secondary"style="height: 220px">
                <div class="card-header">
                    <img src="{{ asset('img/sosial.jpeg') }}" class="card-img-top" alt="..." style="height: 100px">
                </div>
                <div class="card-body">
                    <h3 class="card-title">Pengaruh Sosial #2 </h3>
                </div>
            </div>

        </div>
        <div class="col-3 mt-2">
            <div class="card border-secondary"style="height: 220px">
                <div class="card-header">
                    <img src="{{ asset('img/inflasi.jpeg') }}" class="card-img-top" alt="..." style="height: 100px">
                </div>
                <div class="card-body">
                    <h3 class="card-title">Kenaikan Inflasi #1</h3>
                </div>
            </div>

        </div>
        <div class="col-3 mt-2">
            <div class="card border-secondary"style="height: 220px">
                <div class="card-header">
                    <img src="{{ asset('img/dolar.jpeg') }}" class="card-img-top" alt="..." style="height: 100px">
                </div>
                <div class="card-body">
                    <h3 class="card-title">Pengukuran Kuadrat #1</h3>
                </div>
            </div>

        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12 d-flex align-items-center justify-content-between">
            <h3 class="mr-auto"><b> Kelas </b></h3>
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
        <div class="col-3 mt-2">
            <div class="card border-secondary"style="height: 220px">
                <div class="card-header">
                    <img src="{{ asset('img/astor.jpg') }}" class="card-img-top" alt="..." style="height: 100px">
                </div>
                <div class="card-body">
                    <h3 class="card-title">Sejarah</h3>
                </div>
            </div>

        </div> <div class="col-3 mt-2">
            <div class="card border-secondary"style="height: 220px">
                <div class="card-header">
                    <img src="{{ asset('img/mati.jpg') }}" class="card-img-top" alt="..." style="height: 100px">
                </div>
                <div class="card-body">
                    <h3 class="card-title">Matematika</h3>
                </div>
            </div>

        </div> <div class="col-3 mt-2">
            <div class="card border-secondary"style="height: 220px">
                <div class="card-header">
                    <img src="{{ asset('img/eko.jpeg') }}" class="card-img-top" alt="..." style="height: 100px">
                </div>
                <div class="card-body">
                    <h3 class="card-title">Ekonomi</h3>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
