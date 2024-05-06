@extends('layout.master')
@section('title', 'OneLearn | Ativitas')
@section('activeAktivitas', 'active')

@section('content')
<div class="container">
    <nav class="navbar navbar-expand-lg " style="margin-top: 50px">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @yield('activeBerjalan')" href="{{ route('berjalan') }}">Sedang Berjalan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('activeSelesai')" href="{{ url('aktivitas') }}">Selesai</a>
                </li>
            </ul>
        </div>
    </nav>
</div>

@yield('contentAktivitas')
@endsection
