<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Onelearn | Registrasi</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('resources/css/stylesuser.css') }}">
    <script src="{{ asset('resources/js/loginuser.js') }}"></script>
    <style>
        .container {
            background-image: url('img/background2.gif');
            background-size: 100%;
            background-repeat: no-repeat;
            background-position: center;

        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container" id="container">
            <div class="form-container register-container">
                <form action="{{ url('registrasi-akun') }}" method="post">
                    @csrf
                    <h1>Registrasi</h1>

                    <input type="text" name="nama" placeholder="Nama Lengkap" required>
                    <input type="text" name="nis" placeholder="NIS" required>
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password1" placeholder="Password" required>
                    <input type="password" name="password2" placeholder="Konfirmasi Password" required>
                    <button type="submit">Registrasi</button>
                    <a href="{{ url('login') }}" class="btn btn-success">Sudah punya akun? Login</a>
                </form>
            </div>

            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Hello teman-teman</h1>
                        <p>Jika Anda sudah punya akun, klik tombol untuk login. Jika Belum Silahkan Untuk Registrasi</p>
                        <a href="{{ url('login') }}" class="ghost login-button">Login</a>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Mulai Perjalanan</h1>
                        <p>Jika belum punya akun, bergabunglah dengan kami.</p>
                        <button class="ghost" id="register">Mulai</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.getElementById("register").onclick = function() {
                document.getElementById("container").classList.add("right-panel-active");
            };
            document.getElementById("login").onclick = function() {
                document.getElementById("container").classList.remove("right-panel-active");
            };
        </script>
        <script src="{{ asset('AdminLTE') }}/plugins/jquery/jquery.min.js"></script>
        <script src="{{ asset('AdminLTE') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('AdminLTE') }}/dist/js/adminlte.min.js"></script>
    </div>
</body>

</html>
