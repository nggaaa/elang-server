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
                    <img class="mb-4"
                        src="data:image/png;base64,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"
                        alt="" width="100" height="100">
                    <h1 class="h3 mb-3 font-weight-normal">Konfirmasi Registrasi Email Kamu</h1>
                    <p>Agar akun Elang kamu aktif, klik tombol di bawah</p>
                    <a class="btn btn-lg btn-primary text-white" href="{{ route('confirmation', ['token' => $token]) }}"
                        target="_blank" rel="noopener noreferrer">Konfirmasi</a>
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
