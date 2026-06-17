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
    min-height:50px;
}

.custom-input:focus{
    background:rgba(255,255,255,.08)!important;
    border-color:#d4af37!important;
    box-shadow:none!important;
    color:#fff!important;
}

.custom-input::placeholder{
    color:#94a3b8;
}

.custom-input option{
    background:#0f172a;
    color:#fff;
}

.btn-gold{
    background:#d4af37;
    border:none;
    color:#111827;
    font-weight:600;
    padding:12px 24px;
}

.btn-gold:hover{
    background:#c29d24;
    color:white;
}

.btn-dark-custom{
    background:rgba(255,255,255,.05);
    border:1px solid rgba(255,255,255,.08);
    color:white;
    padding:12px 24px;
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
    top:50%;
    left:15px;
    transform:translateY(-50%);
    color:#d4af37;
}

.input-icon input{
    padding-left:45px;
}

.info-badge{
    display:inline-flex;
    align-items:center;
    gap:8px;
    padding:10px 16px;
    border-radius:999px;
    background:rgba(212,175,55,.12);
    color:#d4af37;
    border:1px solid rgba(212,175,55,.2);
    margin-bottom:25px;
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

        Edit Barang

    </h1>

    <p class="page-subtitle">

        Perbarui informasi barang inventaris

    </p>

</div>

<div class="glass-card p-4 p-lg-5">

    <div class="info-badge">

        <i class="bi bi-pencil-square"></i>

        Sedang mengedit:
        {{ $product->nama_barang }}

    </div>

    <form
        action="{{ route('products.update',$product->id) }}"
        method="POST">

        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-md-6 mb-4">

                <label class="form-label">

                    Kode Barang

                </label>

                <div class="input-icon">

                    <i class="bi bi-upc-scan"></i>

                    <input
                        type="text"
                        name="kode_barang"
                        value="{{ $product->kode_barang }}"
                        class="form-control custom-input">

                </div>

            </div>

            <div class="col-md-6 mb-4">

                <label class="form-label">

                    Nama Barang

                </label>

                <div class="input-icon">

                    <i class="bi bi-box-seam"></i>

                    <input
                        type="text"
                        name="nama_barang"
                        value="{{ $product->nama_barang }}"
                        class="form-control custom-input">

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-md-6 mb-4">

                <label class="form-label">

                    Kategori

                </label>

                <select
                    name="category_id"
                    class="form-select custom-input">

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            {{ $product->category_id == $category->id ? 'selected' : '' }}>

                            {{ $category->nama_kategori }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="col-md-6 mb-4">

                <label class="form-label">

                    Harga

                </label>

                <div class="input-icon">

                    <i class="bi bi-cash-stack"></i>

                    <input
                        type="number"
                        name="harga"
                        value="{{ $product->harga }}"
                        class="form-control custom-input">

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-md-6 mb-4">

                <label class="form-label">

                    Stok Total

                </label>

                <div class="input-icon">

                    <i class="bi bi-boxes"></i>

                    <input
                        type="number"
                        name="stok_total"
                        value="{{ $product->stok_total }}"
                        class="form-control custom-input">

                </div>

            </div>

            <div class="col-md-6 mb-4">

                <label class="form-label">

                    Stok Minimum

                </label>

                <div class="input-icon">

                    <i class="bi bi-exclamation-triangle"></i>

                    <input
                        type="number"
                        name="stok_minimum"
                        value="{{ $product->stok_minimum }}"
                        class="form-control custom-input">

                </div>

            </div>

        </div>

        <hr class="border-secondary my-4">

        <div class="d-flex flex-column flex-md-row gap-2">

            <button
                type="submit"
                class="btn btn-gold">

                <i class="bi bi-check-circle me-2"></i>

                Update Barang

            </button>

            <a
                href="{{ route('products.index') }}"
                class="btn btn-dark-custom">

                <i class="bi bi-arrow-left me-2"></i>

                Kembali

            </a>

        </div>

    </form>

</div>

</div>

@endsection
