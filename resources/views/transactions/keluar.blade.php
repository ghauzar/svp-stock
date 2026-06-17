@extends('layouts.app')

@section('content')

<style>

.page-title{
    color:#fff;
    font-size:40px;
    font-weight:700;
}

.page-subtitle{
    color:#94a3b8;
}

.glass-card{
    background:rgba(255,255,255,.05);
    backdrop-filter:blur(20px);
    border:1px solid rgba(255,255,255,.08);
    border-radius:24px;
    box-shadow:0 8px 32px rgba(0,0,0,.35);
}

.form-label{
    color:#ff6b81;
    font-weight:600;
    margin-bottom:10px;
}

.custom-input{
    background:rgba(255,255,255,.05)!important;
    border:1px solid rgba(255,255,255,.08)!important;
    color:#fff!important;
    min-height:52px;
}

.custom-input:focus{
    background:rgba(255,255,255,.08)!important;
    border-color:#ff6b81!important;
    box-shadow:none!important;
    color:#fff!important;
}

.custom-input::placeholder{
    color:#94a3b8 !important;
    opacity:1;
}

textarea.custom-input{
    min-height:120px;
}

.custom-input option{
    background:#0f172a;
    color:white;
}

input[type="date"].custom-input{
    color:white !important;
}

input[type="date"].custom-input::-webkit-calendar-picker-indicator{
    filter:invert(1) brightness(200%);
    cursor:pointer;
}

.btn-danger-custom{
    background:#dc3545;
    border:none;
    color:white;
    font-weight:700;
    padding:12px 24px;
    border-radius:12px;
}

.btn-danger-custom:hover{
    background:#bb2d3b;
    color:white;
}

.btn-dark-custom{
    background:rgba(255,255,255,.05);
    border:1px solid rgba(255,255,255,.08);
    color:white;
    padding:12px 24px;
    border-radius:12px;
}

.btn-dark-custom:hover{
    background:rgba(255,255,255,.08);
    color:white;
}

.input-icon{
    position:relative;
}

.input-icon i{
    position:absolute;
    left:16px;
    top:50%;
    transform:translateY(-50%);
    color:#ff6b81;
    z-index:2;
}

.input-icon input{
    padding-left:45px;
}

.info-badge{
    display:inline-flex;
    align-items:center;
    gap:8px;
    padding:10px 18px;
    border-radius:999px;
    background:rgba(220,53,69,.15);
    color:#ff6b81;
    border:1px solid rgba(220,53,69,.25);
    margin-bottom:25px;
}

.stock-warning{
    color:#94a3b8;
    font-size:13px;
    margin-top:6px;
}

.alert{
    border:none;
    border-radius:14px;
}

@media(max-width:768px){

    .page-title{
        font-size:30px;
    }

}

</style>

<div class="container-fluid">

<div class="mb-4">

    <h1 class="page-title">

        Barang Keluar

    </h1>

    <p class="page-subtitle">

        Catat pengurangan stok inventaris dari gudang

    </p>

</div>

@if(session('error'))

    <div class="alert alert-danger">

        <i class="bi bi-exclamation-triangle-fill me-2"></i>

        {{ session('error') }}

    </div>

@endif

<div class="glass-card p-4 p-lg-5">

    <div class="info-badge">

        <i class="bi bi-box-arrow-up"></i>

        Transaksi Pengurangan Stok

    </div>

    <form
        action="{{ route('transactions.storeKeluar') }}"
        method="POST">

        @csrf

        <div class="mb-4">

            <label class="form-label">

                Pilih Barang

            </label>

            <select
                name="product_id"
                class="form-select custom-input">

                @foreach($products as $product)

                    <option value="{{ $product->id }}">

                        {{ $product->nama_barang }}
                        (Stok:
                        {{ $product->stok_total }})

                    </option>

                @endforeach

            </select>

            <div class="stock-warning">

                Pastikan jumlah barang keluar tidak melebihi stok tersedia.

            </div>

        </div>

        <div class="row">

            <div class="col-md-6 mb-4">

                <label class="form-label">

                    Jumlah Keluar

                </label>

                <div class="input-icon">

                    <i class="bi bi-dash-circle"></i>

                    <input
                        type="number"
                        name="jumlah"
                        min="1"
                        class="form-control custom-input"
                        placeholder="Masukkan jumlah barang">

                </div>

            </div>

            <div class="col-md-6 mb-4">

                <label class="form-label">

                    Tanggal Transaksi

                </label>

                <input
                    type="date"
                    name="tanggal"
                    value="{{ date('Y-m-d') }}"
                    class="form-control custom-input">

            </div>

        </div>

        <div class="mb-4">

            <label class="form-label">

                Keterangan

            </label>

            <textarea
                name="keterangan"
                class="form-control custom-input"
                placeholder="Contoh: Penjualan, barang rusak, atau kebutuhan operasional"></textarea>

        </div>

        <hr class="border-secondary my-4">

        <div class="d-flex flex-column flex-md-row gap-2">

            <button
                type="submit"
                class="btn btn-danger-custom">

                <i class="bi bi-check-circle me-2"></i>

                Simpan Transaksi

            </button>

            <a
                href="{{ route('transactions.index') }}"
                class="btn btn-dark-custom">

                <i class="bi bi-arrow-left me-2"></i>

                Kembali

            </a>

        </div>

    </form>

</div>

</div>

@endsection
