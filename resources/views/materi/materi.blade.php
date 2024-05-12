@extends('layout.master')
@section('title', 'OneLearn | Materi')
@section('activeMateri', 'active')

@section('content')
<div class="container-fluid" style="margin-top: 50px">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg " >
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav nav-underline navbar-nav me-auto mb-2 mb-lg-0" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-semua-materi-tab" data-toggle="pill" href="#custom-tabs-semua-materi" role="tab" aria-controls="custom-tabs-semua-materi" aria-selected="true">Semua</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-sejarah-tab" data-toggle="pill" href="#custom-tabs-sejarah" role="tab" aria-controls="custom-tabs-sejarah" aria-selected="false">Sejarah</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-sosiologi-tab" data-toggle="pill" href="#custom-tabs-sosiologi" role="tab" aria-controls="custom-tabs-sosiologi" aria-selected="false">Sosiologi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-geografi-tab" data-toggle="pill" href="#custom-tabs-geografi" role="tab" aria-controls="custom-tabs-geografi" aria-selected="false">Geografi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-ekonomi-tab" data-toggle="pill" href="#custom-tabs-ekonomi" role="tab" aria-controls="custom-tabs-ekonomi" aria-selected="false">Ekonomi</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="tab-content" id="custom-tabs-four-tabContent">
              <div class="tab-pane fade show active" id="custom-tabs-semua-materi" role="tabpanel" aria-labelledby="custom-tabs-semua-materi-tab">
                <div class="row">
                    @foreach ($materi as $key => $m)
                        <div class="col-3 mt-2">
                            <a href="javascript:;" data-toggle="modal" data-target="#materisemua{{ $m->id }}">
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
                        <div class="modal fade" id="materisemua{{ $m->id }}">
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
              </div>
              <div class="tab-pane fade" id="custom-tabs-sejarah" role="tabpanel" aria-labelledby="custom-tabs-sejarah-tab">
                <div class="row">
                    @foreach ($materi as $key => $m)
                        @if($m->category == 1)
                            <div class="col-3 mt-2">
                                <a href="javascript:;" data-toggle="modal" data-target="#materisejarah{{ $m->id }}">
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
                            <div class="modal fade" id="materisejarah{{ $m->id }}">
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
                        @endif
                    @endforeach
                </div>
              </div>
              <div class="tab-pane fade" id="custom-tabs-sosiologi" role="tabpanel" aria-labelledby="custom-tabs-sosiologi-tab">
                <div class="row">
                    @foreach ($materi as $key => $m)
                        @if($m->category == 3)
                            <div class="col-3 mt-2">
                                <a href="javascript:;" data-toggle="modal" data-target="#materisosiologi{{ $m->id }}">
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
                            <div class="modal fade" id="materisosiologi{{ $m->id }}">
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
                        @endif
                    @endforeach
                </div>
              </div>
              <div class="tab-pane fade" id="custom-tabs-geografi" role="tabpanel" aria-labelledby="custom-tabs-geografi-tab">
                <div class="row">
                    @foreach ($materi as $key => $m)
                        @if($m->category == 2)
                            <div class="col-3 mt-2">
                                <a href="javascript:;" data-toggle="modal" data-target="#materigeografi{{ $m->id }}">
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
                            <div class="modal fade" id="materigeografi{{ $m->id }}">
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
                        @endif
                    @endforeach
                </div>
              </div>
              <div class="tab-pane fade" id="custom-tabs-ekonomi" role="tabpanel" aria-labelledby="custom-tabs-ekonomi-tab">
                <div class="row">
                    @foreach ($materi as $key => $m)
                        @if($m->category == 4)
                            <div class="col-3 mt-2">
                                <a href="javascript:;" data-toggle="modal" data-target="#materiekonomi{{ $m->id }}">
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
                            <div class="modal fade" id="materiekonomi{{ $m->id }}">
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
                        @endif
                    @endforeach
                </div>
              </div>
            </div>
          <!-- /.card -->
      </div>
    </div>
</div>

@endsection


