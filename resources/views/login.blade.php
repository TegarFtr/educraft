<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Onelearn | Login</title>
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
        <div class="container background-gif">
            <div class="form-container login-container">
                <form action="{{ url('login') }}" method="post">
                    @csrf
                    <h1>Login</h1>
                    @error('error')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password"name="password" placeholder="Password" required>
                    <button type="submit">Login</button>
                    <span>Atau gunakan akun sosial</span>
                    <div class="social-container">
                        <a href="#" class="social"><i class="lni lni-facebook-fill"></i></a>
                        <a href="#" class="social"><i class="lni lni-google"></i></a>
                        <a href="#" class="social"><i class="lni lni-linkedin-original"></i></a>
                    </div>
                </form>
            </div>

            <div class="overlay-container">
                <div class="overlay">
                    <!-- Panel kiri tetap mengarahkan ke login -->
                    <div class="overlay-panel overlay-left">
                        <h1>Selamat Datang</h1>
                        <p>Jika sudah punya akun, klik Login.</p>
                        <a href="{{ url('login') }}" class="ghost">Login</a>
                    </div>

                    <div class="overlay-panel overlay-right">
                        <h1>Mulai Perjalanan Anda</h1>
                        <p>Ingin bergabung? Klik tombol di bawah ini untuk mendaftar.</p>
                        <a href="{{ url('registrasi') }}" class="ghost register-button">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('AdminLTE') }}/plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/dist/js/adminlte.min.js"></script>
</body>

</html>
