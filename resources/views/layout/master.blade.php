<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="icon" type="icon" href="{{ asset('img/logo1.png') }}" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logoOnelearn.png') }}" alt="" width="100" height="24" style="margin-top: -10px">
            </a>
            @if (Route::has('login'))
                @auth
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link @yield('activeDashboard')" href="{{ url('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('activeAktivitas')" href="{{ url('aktivitas') }}">Aktivitas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('activeMateri')" href="{{ url('materi') }}">Materi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('activeKuis')" href="{{ url('kuis') }}">Kuis</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('activeKelas')" href="{{ url('kelas') }}">Kelas</a>
                        </li>
                    </ul>
                @endauth
            @endif

            @if (Route::has('login'))
                    <div class="d-flex justify-content-end" role="search">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            @auth
                            <li class="nav-item">
                                <a href="{{ url('logout') }}" class="nav-link">Logout</a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Log in</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link ml-4">Register</a>
                            </li>

                            @endif
                            @endauth
                        </ul>
                    </div>
                </div>
            @endif
        </div>
        </div>
      </nav>

      <div class="container">
        @yield('content')
      </div>

      {{-- <div class="container" style="margin-top: 150px">
        <footer class=" d-flex flex-wrap justify-content-between bg-body-tertiary align-items-center py-3 border-top fixed-bottom" >
            <strong>Copyright &copy; 2024 Kelompok 2</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
              <b>Version</b> 1.0.0
            </div>
        </footer>
      </div> --}}
      <div class="container" style="margin-top: 150px">
        <footer class="py-1 fixed-bottom bg-body-tertiary pt-3">
          <p class="text-center text-body-secondary">© 2024 Company, Inc</p>
        </footer>
      </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
