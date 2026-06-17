@extends('layouts.app')

@section('content')

<style>

.page-title{
    color:#fff;
    font-size:42px;
    font-weight:700;
}

.page-subtitle{
    color:#94a3b8;
    font-size:16px;
}

.glass-card{
    background:rgba(255,255,255,.05);
    backdrop-filter:blur(20px);
    border:1px solid rgba(255,255,255,.08);
    border-radius:24px;
    box-shadow:0 8px 32px rgba(0,0,0,.35);
}

.stat-card{
    padding:24px;
}

.stat-number{
    font-size:42px;
    font-weight:700;
    color:#d4af37;
}

.btn-gold{
    background:#d4af37;
    border:none;
    color:#111827;
    font-weight:600;
}

.btn-gold:hover{
    background:#c29d24;
    color:#fff;
}

.custom-input{
    background:rgba(255,255,255,.05)!important;
    border:1px solid rgba(255,255,255,.08)!important;
    color:#fff!important;
}

.custom-input::placeholder{
    color:#94a3b8 !important;
    opacity:1;
}

.custom-input:-ms-input-placeholder{
    color:#94a3b8 !important;
}

.custom-input::-ms-input-placeholder{
    color:#94a3b8 !important;
}

.product-table{
    color:#fff !important;
    margin-bottom:0;
    background:transparent !important;
}

.custom-input,
.custom-input option{
    background:#1e293b !important;
    color:#ffffff !important;
}

.custom-input:focus{
    color:#ffffff !important;
}

.product-table thead,
.product-table tbody,
.product-table tr,
.product-table td,
.product-table th{
    background:transparent !important;
    color:#fff !important;
    border-color:rgba(255,255,255,.08) !important;
}

.product-table tbody tr:nth-child(odd){
    background:rgba(255,255,255,.03) !important;
}

.product-table tbody tr:nth-child(even){
    background:rgba(255,255,255,.07) !important;
}

.product-table tbody tr:hover{
    background:rgba(212,175,55,.10) !important;
}

.badge-stock-safe{
    background:#198754;
    color:white;
    padding:8px 12px;
    border-radius:8px;
}

.badge-stock-low{
    background:#dc3545;
    color:white;
    padding:8px 12px;
    border-radius:8px;
}

.alg-card{
    background:rgba(255,255,255,.03);
    border:1px solid rgba(255,255,255,.06);
    border-radius:18px;
    padding:20px;
    height:100%;
}

.alg-title{
    color:#d4af37;
    font-weight:600;
    margin-bottom:10px;
}

.alg-value{
    font-size:30px;
    color:white;
    font-weight:700;
}

.small-text{
    color:#94a3b8;
}

@media(max-width:768px){

    .page-title{
        font-size:30px;
    }

    .stat-number{
        font-size:32px;
    }

}

</style>

<div class="container-fluid">

```
<div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center mb-4">

    <div>

        <h1 class="page-title">
            Data Barang
        </h1>

        <p class="page-subtitle">
            Kelola seluruh inventaris barang perusahaan
        </p>

    </div>

    <div class="d-flex gap-2 mt-3 mt-lg-0">

        <a href="{{ route('products.create') }}"
           class="btn btn-gold">

            <i class="bi bi-plus-circle me-2"></i>
            Tambah Barang

        </a>

        <a href="{{ route('products.import.form') }}"
           class="btn btn-success">

            <i class="bi bi-file-earmark-excel me-2"></i>
            Import Excel

        </a>

    </div>

</div>

{{-- <div class="row g-4 mb-4">

    <div class="col-md-6">

        <div class="glass-card stat-card">

            <div class="small-text">
                Total Data Barang
            </div>

            <div class="stat-number">
                {{ $totalData }}
            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="glass-card stat-card">

            <div class="small-text">
                Hasil Ditampilkan
            </div>

            <div class="stat-number">
                {{ $totalResult }}
            </div>

        </div>

    </div>

</div> --}}

<div class="glass-card p-4 mb-4">

    <h5 class="text-white mb-4">

        <i class="bi bi-search me-2"></i>
        Search & Sort

    </h5>

    <form method="GET">

        <div class="row g-3">

            <div class="col-lg-4">

                <input
                    type="text"
                    name="search"
                    class="form-control custom-input"
                    placeholder="Cari barang..."
                    value="{{ request('search') }}">

            </div>

            <div class="col-lg-3">

                <select
                    name="search_by"
                    class="form-select custom-input">

                    <option value="nama_barang">Nama Barang</option>
                    <option value="kode_barang">Kode Barang</option>
                    <option value="kategori">Kategori</option>
                    <option value="stok_total">Jumlah Stok</option>

                </select>

            </div>

            <div class="col-lg-3">

                <select
                    name="sort"
                    class="form-select custom-input">

                    <option value="">
                        Urutkan Berdasarkan
                    </option>

                    <option value="stok_total">
                        Stok
                    </option>

                    <option value="kategori">
                        Kategori
                    </option>

                    <option value="harga">
                        Harga
                    </option>

                    <option value="tanggal_masuk">
                        Tanggal Masuk
                    </option>

                </select>

            </div>

            <div class="col-lg-2">

                <button class="btn btn-gold w-100">

                    <i class="bi bi-funnel-fill me-2"></i>

                    Proses

                </button>

            </div>

        </div>

    </form>

</div>

<div class="glass-card p-4 mb-4">

    <div class="table-responsive">

        <table class="table product-table">

            <thead>

                <tr>

                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Tanggal Masuk</th>
                    <th>Stok</th>
                    <th width="180">Aksi</th>

                </tr>

            </thead>

            <tbody>

            @forelse($products as $product)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $product['kode_barang'] }}
                    </td>

                    <td>
                        {{ $product['nama_barang'] }}
                    </td>

                    <td>
                        {{ $product['kategori'] }}
                    </td>

                    <td>
                        Rp {{ number_format($product['harga'],0,',','.') }}
                    </td>

                    <td>
                        {{ $product['tanggal_masuk'] }}
                    </td>

                    <td>

                        @if($product['stok_total'] <= $product['stok_minimum'])

                            <span class="badge-stock-low">

                                {{ $product['stok_total'] }}

                            </span>

                        @else

                            <span class="badge-stock-safe">

                                {{ $product['stok_total'] }}

                            </span>

                        @endif

                    </td>

                    <td>

                        <a
                            href="{{ route('products.edit',$product['id']) }}"
                            class="btn btn-warning btn-sm">

                            <i class="bi bi-pencil-square"></i>

                        </a>

                        <form
                            action="{{ route('products.destroy',$product['id']) }}"
                            method="POST"
                            class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus data?')">

                                <i class="bi bi-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="8"
                        class="text-center py-5">

                        Tidak ada data barang

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

<div class="glass-card p-4">

    <h4 class="text-white mb-4">

        <i class="bi bi-cpu me-2"></i>

        Ringkasan Algoritma

    </h4>

    <div class="row g-4">

        <div class="col-md-3">

            <div class="alg-card">

                <div class="alg-title">
                    Total Data
                </div>

                <div class="alg-value">
                    {{ $totalData }}
                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="alg-card">

                <div class="alg-title">
                    Sequential Search
                </div>

                <div class="alg-value">
                    {{ $searchComparison }}
                </div>

                <div class="small-text">
                    Pemeriksaan
                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="alg-card">

                <div class="alg-title">
                    Selection Sort
                </div>

                <div class="alg-value">
                    {{ $sortComparison }}
                </div>

                <div class="small-text">
                    Perbandingan
                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="alg-card">

                <div class="alg-title">
                    Execution Time
                </div>

                <div class="alg-value">
                    {{ number_format($executionTime,6) }}
                </div>

                <div class="small-text">
                    Detik
                </div>

            </div>

        </div>

    </div>

</div>
```

</div>

@endsection
