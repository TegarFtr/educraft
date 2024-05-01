@extends('materi.materi')
@section('activeSemuamateri', 'active')

@section('contentMateri')
<div class="row">
    <div class="row mt-2">
        <div class="col-12 d-flex align-items-center justify-content-between">
            <h3 class="mr-auto">SEJARAH</h3>
            <a href="#" class="btn btn-secondary">Selengkapnya</a>
        </div>
        <div class="col-2 mt-2">
            <div class="card border-secondary">
                <div class="card-header">
                    <img src="{{ asset('img/logodoodle.jpg') }}" class="card-img-top" alt="..." style="height: 100px">
                </div>
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="row mt-2">
        <div class="col-12 d-flex align-items-center justify-content-between">
            <h3 class="mr-auto">EKONOMI</h3>
            <a href="#" class="btn btn-secondary">Selengkapnya</a>
        </div>
        <div class="col-2 mt-2">
            <div class="card border-secondary">
                <div class="card-header">
                    <img src="{{ asset('img/logodoodle.jpg') }}" class="card-img-top" alt="..." style="height: 100px">
                </div>
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="row mt-2">
        <div class="col-12 d-flex align-items-center justify-content-between">
            <h3 class="mr-auto">Geografi</h3>
            <a href="#" class="btn btn-secondary">Selengkapnya</a>
        </div>
        <div class="col-2 mt-2">
            <div class="card border-secondary">
                <div class="card-header">
                    <img src="{{ asset('img/logodoodle.jpg') }}" class="card-img-top" alt="..." style="height: 100px">
                </div>
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="row mt-2">
        <div class="col-12 d-flex align-items-center justify-content-between">
            <h3 class="mr-auto">Sosiologi</h3>
            <a href="#" class="btn btn-secondary">Selengkapnya</a>
        </div>
        <div class="col-2 mt-2">
            <div class="card border-secondary">
                <div class="card-header">
                    <img src="{{ asset('img/logodoodle.jpg') }}" class="card-img-top" alt="..." style="height: 100px">
                </div>
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
