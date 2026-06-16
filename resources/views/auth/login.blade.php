<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login Sistem Stok Barang</h2>

<form action="/login" method="POST">

    @csrf

    <input
        type="text"
        name="username"
        placeholder="Username">

    <br><br>

    <input
        type="password"
        name="password"
        placeholder="Password">

    <br><br>

    <button type="submit">
        Login
    </button>

</form>

</body>
</html>