<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha256-eSi1q2PG6J7g7ib17yAaWMcrr5GrtohYChqibrV7PBE=" crossorigin="anonymous">
</head>

<body style="background-color: rgba(0, 123, 255, 0.1)">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-10 col-md-6">
                <div class="text-center mb-4">
                    <h1 class="h3 mb-3 font-weight-normal">Konfirmasi Registrasi Email Kamu</h1>
                    <p>Agar akun Elang kamu aktif, klik tombol di bawah</p>
                    <a class="btn btn-lg btn-primary text-white"
                        href="{{ route('confirmation', ['token' => $token]) }}" target="_blank"
                        rel="noopener noreferrer">Konfirmasi</a>
                    <p>Jika tombol tidak berfungsi, copy link di bawah lalu paste ke browser.</p>
                    <code class="text-danger">{{ route('confirmation', ['token' => $token]) }}</code>
                    <br>
                    <br>
                    <p>Jika kamu tidak melakukan registrasi, abaikan email ini. Jika kamu memiliki pertanyaan, silahkan
                        hubungi
                        admin</p>
                </div>

                <h1 class="mt-5 text-muted text-center display-3">ELANG</h1>
                <p class="mt-0 pt-0 text-muted text-center">Belajar Bahasa Seru<br>&copy; Elang {{ date('Y') }}</p>
            </div>
        </div>
    </div>

</body>

</html>
