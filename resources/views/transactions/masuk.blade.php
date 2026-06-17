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
    color:#d4af37;
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
    border-color:#d4af37!important;
    box-shadow:none!important;
}

.custom-input option{
    background:#0f172a;
    color:white;
}

textarea.custom-input{
    min-height:120px;
}

.btn-gold{
    background:#d4af37;
    border:none;
    color:#111827;
    font-weight:700;
    padding:12px 24px;
    border-radius:12px;
}

.btn-gold:hover{
    background:#c89f1f;
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
    color:#d4af37;
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
    background:rgba(25,135,84,.15);
    color:#3ddc97;
    border:1px solid rgba(25,135,84,.3);
    margin-bottom:25px;
}

/* Placeholder input */
.custom-input::placeholder{
color:#94a3b8 !important;
opacity:1;
}

/* Placeholder textarea */
textarea.custom-input::placeholder{
color:#94a3b8 !important;
opacity:1;
}

/* Date text */
input[type="date"].custom-input{
color:#ffffff !important;
}

/* Calendar icon Chrome / Edge */
input[type="date"].custom-input::-webkit-calendar-picker-indicator{
filter: invert(1);
cursor:pointer;
}

/* Jika field date kosong */
input[type="date"].custom-input:invalid{
color:#94a3b8 !important;
}

/* Autofill Chrome */
.custom-input:-webkit-autofill,
.custom-input:-webkit-autofill:hover,
.custom-input:-webkit-autofill:focus{
-webkit-text-fill-color:#fff !important;
transition: background-color 9999s ease-in-out 0s;
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

        Barang Masuk

    </h1>

    <p class="page-subtitle">

        Catat penambahan stok inventaris ke dalam gudang

    </p>

</div>

<div class="glass-card p-4 p-lg-5">

    <div class="info-badge">

        <i class="bi bi-box-arrow-in-down"></i>

        Transaksi Penambahan Stok

    </div>

    <form
        action="{{ route('transactions.storeMasuk') }}"
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

                    </option>

                @endforeach

            </select>

        </div>

        <div class="row">

            <div class="col-md-6 mb-4">

                <label class="form-label">

                    Jumlah Masuk

                </label>

                <div class="input-icon">

                    <i class="bi bi-boxes"></i>

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
                placeholder="Contoh: Restock dari supplier PT ABC"></textarea>

        </div>

        <hr class="border-secondary my-4">

        <div class="d-flex flex-column flex-md-row gap-2">

            <button
                type="submit"
                class="btn btn-gold">

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
