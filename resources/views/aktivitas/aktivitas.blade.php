@extends('layout.master')
@section('title', 'OneLearn | Ativitas')
@section('activeAktivitas', 'active')

@section('content')


<div class="container-fluid" style="margin-top: 50px">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg " >
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav nav-underline navbar-nav me-auto mb-2 mb-lg-0" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-selesai-tab" data-toggle="pill" href="#custom-tabs-selesai" role="tab" aria-controls="custom-tabs-selesai" aria-selected="true">Selesai</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-berjalan-tab" data-toggle="pill" href="#custom-tabs-berjalan" role="tab" aria-controls="custom-tabs-berjalan" aria-selected="false">Sedang Berjalan</a>
                        </li>
                        </ul>
                    </div>
                </nav>
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-selesai" role="tabpanel" aria-labelledby="custom-tabs-selesai-tab">
                    <div class="col-3 mt-2">
                        <div class="card border-secondary">
                            <div class="card-header">
                                <img src="{{ asset('img/logodoodle.jpg') }}" class="card-img-top" alt="..." style="height: 100px">
                            </div>
                            <div class="card-body">
                                <p class="card-text">A</p>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-berjalan" role="tabpanel" aria-labelledby="custom-tabs-berjalan-tab">
                    <div class="col-3 mt-2">
                        <div class="card border-secondary">
                            <div class="card-header">
                                <img src="{{ asset('img/logodoodle.jpg') }}" class="card-img-top" alt="..." style="height: 100px">
                            </div>
                            <div class="card-body">
                                <p class="card-text">B.</p>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              <!-- /.card -->
          </div>
        </div>
</div>

@endsection
