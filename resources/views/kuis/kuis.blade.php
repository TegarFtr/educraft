@extends('layout.master')
@section('title', 'OneLearn | Kuis')
@section('activeKuis', 'active')

@section('content')
<div class="container">
    <nav class="navbar navbar-expand-lg " style="margin-top: 70px">
        <div class="collapse navbar-collapse ms-auto" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @yield('activeSemuakuis')" href="{{ url('kuis') }}">Semua</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('activeSejarah')" href="{{ route('Kuissejarah') }}">Sejarah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('activeEkonomi')" href="{{ route('Kuisekonomi') }}">Ekonomi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('activeGeografi')" href="{{ route('Kuisgeografi') }}">Geografi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('activeSosiologi')" href="{{ route('Kuissosiologi') }}">Sosiologi</a>
                </li>
            </ul>
            <a href="{{ url('aktivitas') }}" class="btn btn-secondary">Buat Kuis</a>
        </div>
    </nav>
</div>

@yield('contentKuis')

@endsection
