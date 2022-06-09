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
    <div class="container pt-5">
        <div class="d-flex justify-content-center align-items-center mt-5">
            @if ($err == true)
                <div>
                    <div class="text-center mb-4">
                        <h1 class="h3 mb-3 font-weight-normal display-4">Error</h1>
                        <p>Url konfirmasi salah</p>
                        <p>Cek email kamu lagi.</p>
                    </div>
                    <h1 class="mt-5 text-muted text-center display-4">ELANG</h1>
                    <p class="mt-0 pt-0 text-muted text-center">Belajar Bahasa Seru<br>&copy; Elang {{ date('Y') }}
                    </p>
                </div>
            @else
                <div>
                    <div class="text-center mb-4">
                        <h1 class="h3 mb-3 font-weight-normal display-4">Horeeeeee</h1>
                        <p>Email Kamu berhasil terkonfirmasi</p>
                        <p>Kembali ke aplikasi dan coba login.</p>
                    </div>
                    <h1 class="mt-5 text-muted text-center display-4">ELANG</h1>
                    <p class="mt-0 pt-0 text-muted text-center">Belajar Bahasa Seru<br>&copy; Elang {{ date('Y') }}
                    </p>
                </div>
            @endif
        </div>
    </div>

</body>

</html>
