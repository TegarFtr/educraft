@extends('layout.master')
@section('title', 'OneLearn | Dashboard')
@section('activeDashboard', 'active')

@section('content')
<div class="container">
    <div class="row" style="margin-top: 100px">
        <div class="col-6">
            <div class="card border-secondary pt-4 pb-5">
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
            <div class="card border-secondary pt-4 pb-5">
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
            <h3 class="mr-auto">Aktivitas Terbaru</h3>
            <a href="#" class="btn btn-secondary">Selengkapnya</a>
        </div>
        <div class="col-2 mt-2">
            <div class="card border-secondary">
                <div class="card-header">
                    <img src="{{ asset('img/logo1.png') }}" class="card-img-top" alt="..." style="height: 100px">
                </div>
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12 d-flex align-items-center justify-content-between">
            <h3 class="mr-auto">Materi</h3>
            <a href="#" class="btn btn-secondary">Selengkapnya</a>
        </div>
        <div class="col-3 mt-2">
            <div class="card border-secondary">
                <div class="card-header">
                    <img src="{{ asset('img/logo1.png') }}" class="card-img-top" alt="..." style="height: 100px">
                </div>
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12 d-flex align-items-center justify-content-between">
            <h3 class="mr-auto">Kuis</h3>
            <a href="#" class="btn btn-secondary">Selengkapnya</a>
        </div>
        <div class="col-3 mt-2">
            <div class="card border-secondary">
                <div class="card-header">
                    <img src="{{ asset('img/logo1.png') }}" class="card-img-top" alt="..." style="height: 100px">
                </div>
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12 d-flex align-items-center justify-content-between">
            <h3 class="mr-auto">Kelas</h3>
            <a href="#" class="btn btn-secondary">Selengkapnya</a>
        </div>
        <div class="col-3 mt-2">
            <div class="card border-secondary">
                <div class="card-header">
                    <img src="{{ asset('img/logo1.png') }}" class="card-img-top" alt="..." style="height: 100px">
                </div>
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
