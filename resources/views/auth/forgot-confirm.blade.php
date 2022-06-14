<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Elang - Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .form-signin {
            max-width: 330px;
            padding: 15px;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>

<body>
    <main class="form-signin w-100 m-auto">
        <form action="{{ route('w_forgot-confirm-put', ['token' => $token]) }}" method="POST">
            @csrf
            <div class="d-flex w-100 justify-content-center">
                <img class="mb-4"
                    src="data:image/png;base64,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" />

            </div>
            <h1 class="h3 mb-3 fw-normal">Masukkan password baru</h1>

            <div class="form-floating">
                <input type="password" class="form-control" id="password" placeholder="Password Baru">
                <label for="password">Password</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="confirmpassword" placeholder="Konfirmasi Password">
                <label for="confirmpassword">Konfirmasi Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Simpan</button>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
