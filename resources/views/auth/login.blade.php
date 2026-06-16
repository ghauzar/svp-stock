<!DOCTYPE html>
<html>
<head>

    <title>Login - SVP Vape Store</title>

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="icon" type="image/x-icon" href="/images/logo.png">

    <style>

        body{
            min-height:100vh;

            display:flex;
            justify-content:center;
            align-items:center;

            background:
            linear-gradient(
                135deg,
                #0f172a,
                #111827,
                #020617
            );

            font-family:
            'Segoe UI',
            sans-serif;
        }

        .login-card{

            width:100%;
            max-width:420px;

            background:
            rgba(255,255,255,.05);

            backdrop-filter:
            blur(20px);

            border:
            1px solid rgba(255,255,255,.08);

            border-radius:28px;

            padding:35px;

            box-shadow:
            0 8px 32px rgba(0,0,0,.4);
        }

        .logo-box{

            width:90px;
            height:90px;

            margin:auto;

            border-radius:24px;

            display:flex;
            align-items:center;
            justify-content:center;

            background:
            rgba(212,175,55,.12);

            color:#d4af37;

            font-size:40px;

            box-shadow:
            inset 2px 2px 10px rgba(255,255,255,.05),
            inset -2px -2px 10px rgba(0,0,0,.2);
        }

        .title{

            color:white;

            font-size:28px;

            font-weight:700;

            text-align:center;

            margin-top:20px;
        }

        .subtitle{

            text-align:center;

            color:#94a3b8;

            margin-bottom:30px;
        }

        .form-label{

            color:#cbd5e1;
        }

        .form-control{

            background:
            rgba(255,255,255,.05);

            border:
            1px solid rgba(255,255,255,.08);

            color:white;

            padding:12px;
        }

        .form-control:focus{

            background:
            rgba(255,255,255,.08);

            color:white;

            border-color:#d4af37;

            box-shadow:
            0 0 0 .25rem rgba(212,175,55,.15);
        }

        .form-control::placeholder{

            color:#94a3b8;
        }

        .btn-login{

            background:#d4af37;

            border:none;

            color:#111827;

            font-weight:700;

            padding:12px;

            border-radius:12px;

            transition:.3s;
        }

        .btn-login:hover{

            background:#e6c65b;

            transform:translateY(-2px);
        }

        .footer-text{

            text-align:center;

            margin-top:20px;

            color:#64748b;

            font-size:13px;
        }

        .alert{

            border-radius:14px;
        }

    </style>

</head>
<body>

<div class="login-card">

    <div class="logo-box">

        <img
        src="{{ asset('images/logo.png') }}"
        alt="Logo"
        style="width:60px;height:60px;object-fit:contain;">

    </div>

    <h2 class="title">

        SVP Vape Store

    </h2>

    <p class="subtitle">

        Inventory Management System

    </p>

    @if(session('error'))

        <div class="alert alert-danger">

            {{ session('error') }}

        </div>

    @endif

    <form action="/login"
          method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">

                Username

            </label>

            <input
                type="text"
                name="username"
                class="form-control"
                placeholder="Masukkan username"
                required>

        </div>

        <div class="mb-4">

            <label class="form-label">

                Password

            </label>

            <input
                type="password"
                name="password"
                class="form-control"
                placeholder="Masukkan password"
                required>

        </div>

        <button
            type="submit"
            class="btn btn-login w-100">

            <i class="bi bi-box-arrow-in-right"></i>

            Login

        </button>

    </form>

    <div class="footer-text">

        © {{ date('Y') }} SVP Vape Store Management

    </div>

</div>

</body>
</html>
