<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Simpus | Registrasi</title>
  <link rel="icon" type="icon" href="{{ asset('AdminLTE') }}/dist/img/tutwuri.png" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE') }}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card">
    <div class="card-header text-center">
        <img class="mt-3" src="{{ asset('img/logo1.png') }}" alt="TutWuriHandayani" height="100" width="100">
        <div class="h1"><b>OneLearn</b></div>
        <div class="h5">Satu Aplikasi Banyak Pengetahuan</div>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Selamat datang di Halaman Registrasi OneLearn, tempat pembuka pintu akses ke dunia pendidikan terhubung dan inovatif! Buat akun pribadi Anda dengan mudah untuk mengakses layanan OneLearn dengan cepat.</p>

      <form action="{{ url('registrasi-akun') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="nis" placeholder="Masukkan NIS">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Masukkan Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password1" placeholder="Masukkan Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password2" placeholder="Masukkan Ulang password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="text-center mt-3">- ATAU -</p>
      <div class="social-auth-links text-center">
        <a href="{{ route('login') }}" class="btn btn-block btn-success">
            <i class="fas fa-arrow-circle-right"></i>
            Sudah menjadi member ? Masuk
        </a>
      </div>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('AdminLTE') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE') }}/dist/js/adminlte.min.js"></script>
</body>
</html>
