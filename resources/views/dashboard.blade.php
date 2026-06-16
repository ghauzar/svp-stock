@extends('layouts.app')

@section('content')

<style>

body{
    background:
    linear-gradient(
        135deg,
        #0f172a,
        #111827,
        #020617
    );
}

.dashboard-title{
    color:white;
    font-size:32px;
    font-weight:700;
}

.dashboard-subtitle{
    color:#94a3b8;
}

.header-glass{
    position: relative;

    background: rgba(255,255,255,.05);

    backdrop-filter: blur(20px);

    border: 1px solid rgba(255,255,255,.08);

    border-radius: 28px;

    padding: 32px;

    overflow: hidden;

    box-shadow:
        0 8px 32px rgba(0,0,0,.35);
}

.header-glass::before{
    content: '';

    position: absolute;

    top: -80px;
    right: -80px;

    width: 220px;
    height: 220px;

    border-radius: 50%;

    background: rgba(212,175,55,.08);

    filter: blur(30px);
}

.logo-wrapper{
    width: 90px;
    height: 90px;

    border-radius: 24px;

    background: rgba(255,255,255,.05);

    border: 1px solid rgba(255,255,255,.08);

    display: flex;
    align-items: center;
    justify-content: center;

    overflow: hidden;

    box-shadow:
        inset 2px 2px 10px rgba(255,255,255,.05),
        inset -2px -2px 10px rgba(0,0,0,.25);
}

.logo-wrapper img{
    width: 70px;
    height: 70px;
    object-fit: contain;
}

.dashboard-title{
    color:white;
    font-size:36px;
    font-weight:700;
    margin-bottom:8px;
}

.dashboard-subtitle{
    color:#94a3b8;
    margin-bottom:0;
}

.header-badge{
    display:inline-flex;

    align-items:center;

    gap:8px;

    padding:8px 14px;

    border-radius:999px;

    background:rgba(212,175,55,.12);

    color:#d4af37;

    font-size:14px;

    border:1px solid rgba(212,175,55,.2);
}

@media(max-width:768px){

    .header-glass{
        padding:24px;
    }

    .logo-wrapper{
        width:70px;
        height:70px;
        margin-bottom:15px;
    }

    .logo-wrapper img{
        width:50px;
        height:50px;
    }

    .dashboard-title{
        font-size:26px;
    }

    .header-content{
        text-align:center;
    }

    .header-flex{
        flex-direction:column;
        align-items:center !important;
    }

    .header-right{
        margin-top:20px;
        width:100%;
    }
}

.glass-card{
    background:rgba(255,255,255,.05);

    backdrop-filter:blur(18px);

    border:1px solid rgba(255,255,255,.08);

    border-radius:24px;

    box-shadow:
    0 8px 32px rgba(0,0,0,.4);

    transition:.3s;
}

.glass-card:hover{
    transform:translateY(-5px);
}

.stat-number{
    font-size:40px;
    font-weight:700;
    color:white;
}

.stat-label{
    color:#94a3b8;
}

.gold{
    color:#d4af37;
}

.table-dark-custom{
    background:rgba(255,255,255,.05);
    color:white;
}

/*Style icon*/
.icon-box{
    width:55px;
    height:55px;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:16px;

    background:
    rgba(212,175,55,.15);

    color:#d4af37;

    font-size:24px;

    box-shadow:
    inset 2px 2px 6px rgba(255,255,255,.05),
    inset -2px -2px 6px rgba(0,0,0,.2);
}

</style>

<div class="container py-4">

    <div class="header-glass mb-5">

        <div class="d-flex justify-content-between align-items-center header-flex">

            <div class="d-flex align-items-center header-content">

                <div class="logo-wrapper me-4">

                    {{-- Simpan logo di public/images/logo.png --}}
                    <img
                        src="{{ asset('images/logo.png') }}"
                        alt="Logo">

                </div>

                <div>

                    <div class="header-badge mb-3">

                        <i class="bi bi-shield-check"></i>

                        Inventory Management System

                    </div>

                    <h1 class="dashboard-title">

                        Dashboard Inventaris

                    </h1>

                    <p class="dashboard-subtitle">

                        Monitoring stok barang, transaksi,
                        dan performa inventaris secara real-time.

                    </p>

                </div>

            </div>

            <div class="header-right">

                <div class="glass-card p-3">

                    <div class="text-secondary small">

                        Status Sistem

                    </div>

                    <div class="text-success fw-bold">

                        <i class="bi bi-check-circle-fill"></i>

                        Online

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="row g-4">

        <div class="col-md-3">

            <div class="glass-card p-4">

                <div class="d-flex align-items-center mb-3">

                    <div class="icon-box">

                        <i class="bi bi-box-seam"></i>

                    </div>

                    <div class="ms-3">

                        <div class="stat-label">
                            Total Barang
                        </div>

                    </div>

                </div>

                <div class="stat-number">
                    {{ $totalBarang }}
                </div>

                <div class="stat-label">
                    Total Barang
                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="glass-card p-4">

                <div class="d-flex align-items-center mb-3">

                    <div class="icon-box">

                        <i class="bi bi-tags"></i>

                    </div>

                    <div class="ms-3">

                        <div class="stat-label">
                            Kategori
                        </div>

                    </div>

                </div>

                <div class="stat-number">
                    {{ $totalKategori }}
                </div>

                <div class="stat-label">
                    Total Kategori
                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="glass-card p-4">

                <div class="d-flex align-items-center mb-3">

                    <div class="icon-box">

                        <i class="bi bi-cash-coin"></i>

                    </div>

                    <div class="ms-3">

                        <div class="stat-label">
                            Transaksi
                        </div>

                    </div>

                </div>

                <div class="stat-number">
                    {{ $totalTransaksi }}
                </div>

                <div class="stat-label">
                    Total Transaksi
                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="glass-card p-4">

                <div class="d-flex align-items-center mb-3">

                    <div class="icon-box">

                        <i class="bi bi-exclamation-triangle"></i>

                    </div>

                    <div class="ms-3">

                        <div class="stat-label">
                            Stock Menipis
                        </div>

                    </div>

                </div>

                <div class="stat-number text-danger">
                    {{ $stokMenipis }}
                </div>

                <div class="stat-label">
                    Perlu Restock
                </div>

            </div>

        </div>

    </div>

    <div class="row mt-5">

        <div class="col-lg-8">

            <div class="glass-card p-4">

                <h4 class="text-white mb-4">
                    Barang Stok Menipis
                </h4>

                <table class="table table-dark table-hover">

                    <thead>

                        <tr>

                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Stok</th>
                            <th>Minimum</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($barangMenipis as $barang)

                        <tr>

                            <td>{{ $barang->kode_barang }}</td>

                            <td>{{ $barang->nama_barang }}</td>

                            <td>{{ $barang->stok_total }}</td>

                            <td>{{ $barang->stok_minimum }}</td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="4">
                                Tidak ada barang menipis
                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="glass-card p-4">

                <h4 class="text-white mb-4">
                    Status Sistem
                </h4>

                <div class="mb-3 text-success">
                    ● Database Connected
                </div>

                <div class="mb-3 text-success">
                    ● Import Excel Active
                </div>

                <div class="mb-3 text-success">
                    ● Inventory Tracking Active
                </div>

            </div>

        </div>

    </div>

</div>

@endsection