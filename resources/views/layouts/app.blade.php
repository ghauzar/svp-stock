<!DOCTYPE html>
<html>
<head>

    <title>SVP Vape Store</title>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="icon" type="image/x-icon" href="/images/logo.png">

    <style>

        body{

            margin:0;

            background:
            linear-gradient(
                135deg,
                #0f172a,
                #111827,
                #020617
            );

            min-height:100vh;

            overflow-x:hidden;
        }

        /* ===================
           LAYOUT
        =================== */

        .admin-layout{

            display:flex;

            min-height:100vh;
        }

        /* ===================
           SIDEBAR
        =================== */

        .sidebar{

            width:280px;

            position:fixed;

            top:0;
            left:0;
            bottom:0;

            z-index:1000;

            padding:25px;

            background:
            rgba(255,255,255,.04);

            backdrop-filter:blur(20px);

            border-right:
            1px solid rgba(255,255,255,.08);
        }

        .main-content{

            flex:1;

            margin-left:280px;

            padding:25px;
        }

        /* ===================
           LOGO
        =================== */

        .sidebar-logo{

            display:flex;

            align-items:center;

            gap:15px;

            margin-bottom:40px;
        }

        .sidebar-logo img{

            width:55px;
            height:55px;

            object-fit:contain;
        }

        .sidebar-logo h5{

            color:white;

            margin:0;

            font-weight:700;
        }

        /* ===================
           MENU
        =================== */

        .sidebar-menu{

            list-style:none;

            padding:0;
        }

        .sidebar-menu li{

            margin-bottom:10px;
        }

        .sidebar-menu a{

            display:flex;

            align-items:center;

            gap:12px;

            text-decoration:none;

            padding:14px 18px;

            border-radius:16px;

            color:#94a3b8;

            transition:.3s;
        }

        .sidebar-menu a:hover{

            color:white;

            background:
            rgba(255,255,255,.05);
        }

        .sidebar-menu a.active{

            background:
            rgba(212,175,55,.15);

            color:#d4af37;

            border:
            1px solid rgba(212,175,55,.2);
        }

        /* ===================
           LOGOUT BUTTON
        =================== */

        .logout-btn{

            width:100%;

            text-align:left;

            background:none;

            border:none;

            color:#94a3b8;

            padding:14px 18px;

            border-radius:16px;

            transition:.3s;
        }

        .logout-btn:hover{

            background:
            rgba(255,255,255,.05);

            color:white;
        }

        /* ===================
           MOBILE NAVBAR
        =================== */

        .mobile-navbar{

            display:none;
        }

        @media(max-width:991px){

            .sidebar{

                transform:
                translateX(-100%);

                transition:.3s;
            }

            .sidebar.show{

                transform:
                translateX(0);
            }

            .main-content{

                margin-left:0;
            }

            .mobile-navbar{

                display:flex;

                justify-content:space-between;

                align-items:center;

                margin-bottom:20px;

                padding:15px 20px;

                border-radius:18px;

                background:
                rgba(255,255,255,.05);

                backdrop-filter:blur(20px);

                border:
                1px solid rgba(255,255,255,.08);
            }
        }

    </style>

</head>

<body>

<div class="admin-layout">

    {{-- SIDEBAR --}}
    <div
        id="sidebar"
        class="sidebar">

        <div class="sidebar-logo">

            <img
                src="{{ asset('images/logo.png') }}"
                alt="Logo">

            <h5>SVP Stock</h5>

        </div>

        <ul class="sidebar-menu">

            <li>

                <a
                    href="/dashboard"
                    class="{{ request()->is('dashboard') ? 'active' : '' }}">

                    <i class="bi bi-speedometer2"></i>

                    Dashboard

                </a>

            </li>

            <li>

                <a
                    href="/categories"
                    class="{{ request()->is('categories*') ? 'active' : '' }}">

                    <i class="bi bi-tags"></i>

                    Kategori

                </a>

            </li>

            <li>

                <a
                    href="/products"
                    class="{{ request()->is('products*') ? 'active' : '' }}">

                    <i class="bi bi-box-seam"></i>

                    Produk

                </a>

            </li>

            <li>

                <a
                    href="/transactions"
                    class="{{ request()->is('transactions*') ? 'active' : '' }}">

                    <i class="bi bi-arrow-left-right"></i>

                    Transaksi

                </a>

            </li>

            <li class="mt-5">

                <form
                    action="/logout"
                    method="POST">

                    @csrf

                    <button
                        type="submit"
                        class="logout-btn">

                        <i class="bi bi-box-arrow-left"></i>

                        Logout

                    </button>

                </form>

            </li>

        </ul>

    </div>

    {{-- CONTENT --}}
    <div class="main-content">

        <div class="mobile-navbar">

            <button
                class="btn btn-outline-warning"
                onclick="toggleSidebar()">

                <i class="bi bi-list"></i>

            </button>

            <span class="text-white fw-bold">

                SVP Stock

            </span>

        </div>

        @yield('content')

    </div>

</div>

<script>

function toggleSidebar()
{
    document
        .getElementById('sidebar')
        .classList
        .toggle('show');
}

</script>

</body>
</html>