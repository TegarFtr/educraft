<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Simpus | Login</title>
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
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-header text-center">
        <img class="mt-3" src="{{ asset('img/logo1.png') }}" alt="TutWuriHandayani" height="100" width="100">
        <div class="h1"><b>OneLearn</b></div>
        <div class="h5">Satu Aplikasi Banyak Pengetahuan</div>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Selamat datang di Halaman Login One Learn, pintu gerbang menuju dunia pembelajaran yang terintegrasi dan efisien!. <br>  <b>Silahkan masuk untuk menggunakan OneLearn</b></p>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $eror)
                        <li>{{ $eror }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
      <form action="" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="text-center mt-3">- ATAU -</p>
      <div class="social-auth-links text-center text-white mt-2 mb-3">
        <a href="{{ url('registrasi') }}" class="btn btn-block btn-warning" style="color: white">
          <i class="fas fa-user-plus"></i> Daftar Untuk Menjadi Member
        </a>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('AdminLTE') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE') }}/dist/js/adminlte.min.js"></script>
</body>
</html>
