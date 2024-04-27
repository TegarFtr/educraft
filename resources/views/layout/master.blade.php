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
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logoOnelearn.png') }}" alt="" width="100" height="24" style="margin-top: -10px">
            </a>
            @if (Route::has('login'))
                @auth
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link" href="#">Materi</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Aktivitas</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Kuis</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Kelas</a>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
