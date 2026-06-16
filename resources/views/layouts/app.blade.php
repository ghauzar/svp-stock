<!DOCTYPE html>
<html>
<head>
    <title>Sistem Stok Barang SVP</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="/dashboard">
            SVP Stock
        </a>

        <div>
            <a href="{{ route('products.index') }}"
               class="btn btn-outline-light btn-sm">
                Data Barang
            </a>

            <form action="/logout"
                  method="POST"
                  class="d-inline">

                @csrf

                <button class="btn btn-danger btn-sm">
                    Logout
                </button>

            </form>
        </div>

    </div>
</nav>

<div class="container mt-4">

    @yield('content')

</div>

</body>
</html>