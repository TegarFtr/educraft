@extends('layout.master')
@section('title', 'OneLearn | Materi')
@section('activeMateri', 'active')

@section('content')
<div class="container">
    <nav class="navbar navbar-expand-lg " style="margin-top: 50px">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @yield('activeSemuamateri')" href="{{ url('materi') }}">Semua</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('activeSejarah')" href="{{ route('sejarah') }}">Sejarah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('activeEkonomi')" href="{{ route('ekonomi') }}">Ekonomi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('activeGeografi')" href="{{ route('geografi') }}">Geografi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('activeSosiologi')" href="{{ route('sosiologi') }}">Sosiologi</a>
                </li>
            </ul>
        </div>
    </nav>
</div>

@yield('contentMateri')

@endsection


