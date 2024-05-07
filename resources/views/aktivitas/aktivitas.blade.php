@extends('layout.master')
@section('title', 'OneLearn | Ativitas')
@section('activeAktivitas', 'active')

@section('content')
<div class="container">
    <nav class="navbar navbar-expand-lg " style="margin-top: 50px">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="custom-tabs-four-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link @yield('activeBerjalan')" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true"">Sedang Berjalan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('activeSelesai')" id="custom-tabs-four-yuk-tab" data-toggle="pill" href="#custom-tabs-four-yuk" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Selesai</a>
                </li>
            </ul>
        </div>
    </nav>
</div>

@yield('contentAktivitas')
@endsection
