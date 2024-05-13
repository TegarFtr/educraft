<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <link rel="icon" type="icon" href="{{ asset('AdminLTE') }}/dist/img/tutwuri.png" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE') }}/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  @stack('style')
</head>
<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
        <li class="nav-item">
            <a href="{{ url('dashboard') }}" class="btn btn-secondary">Dashboard User</a>
        </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link text-center text-bold">
      <img src="{{ asset('img/logoOnelearn.png') }}" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('AdminLTE') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <h5 href="#" class="d-block">{{ Auth::user()->nama }}</h5>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
            <a href="{{ url('AdminDashboard') }}" class="nav-link @yield('activeDashboard')">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
                <i class="right fas "></i>
              </p>
            </a>
          </li>

            <li class="nav-header">MAIN MENU</li>

          <li class="nav-item">
            <a href="{{ url('kategori') }}" class="nav-link @yield('activeKategori')">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Kategori
                <i class="right fas "></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('kuismaster') }}" class="nav-link @yield('activeKuis')">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Kuis Master
                <i class="right fas "></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('materimaster') }}" class="nav-link @yield('activeMateri')">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Materi Master
                <i class="right fas "></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('kelasmaster') }}" class="nav-link @yield('activeKelas')">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Kelas
                <i class="right fas "></i>
              </p>
            </a>
          </li>

          <li class="nav-header">LANJUTAN</li>
          <li class="nav-item">
            <a href="#" class="nav-link" data-toggle="modal" data-target="#modalLogoutConfirm">
              <i class="fa-solid fa-right-from-bracket"></i>
              <p>Keluar</p>
            </a>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="modal fade" id="modalLogoutConfirm">
              <div class="modal-dialog">
                  <div class="modal-content" style="border-radius: 5px;">
                      <div class="modal-header">
                        <h4 class="modal-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Peringatan</h4>
                      </div>
                      <div class="modal-body">
                          <span>Apa anda yakin ingin keluar dari Applikasi ? <br>
                              Anda harus login kembali jika ingin masuk Applikasi Perpustakaan</span>
                      </div>
                      <div class="modal-footer">
                          <button type="button" data-dismiss="modal" class="btn btn-danger">Batal</button>
                          <a href="{{ url('logout') }}" class="btn btn-primary">Iya, Logout</a>
                      </div>
                  </div>
              </div>
          </div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('contentAdmin')
  </div>

  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2023 Kelompok 10.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('AdminLTE') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{ asset('AdminLTE') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('AdminLTE') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE') }}/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('AdminLTE') }}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="{{ asset('AdminLTE') }}/plugins/raphael/raphael.min.js"></script>
<script src="{{ asset('AdminLTE') }}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="{{ asset('AdminLTE') }}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('AdminLTE') }}/plugins/chart.js/Chart.min.js"></script>
<script src="https://kit.fontawesome.com/a2d9934ef9.js" crossorigin="anonymous"></script>
<!-- FLOT CHARTS -->
<script src="{{ asset('AdminLTE') }}/plugins/flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="{{ asset('AdminLTE') }}/plugins/flot/plugins/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="{{ asset('AdminLTE') }}/plugins/flot/plugins/jquery.flot.pie.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    @stack('scripts')
</body>
</html>
