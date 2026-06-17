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
    border-color:#d4af37!important;
    box-shadow:none!important;
    color:#fff!important;
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

.btn-dark-custom{
    background:rgba(255,255,255,.05);
    border:1px solid rgba(255,255,255,.08);
    color:white;
}

.btn-dark-custom:hover{
    background:rgba(255,255,255,.08);
    color:white;
}

.alert-success-custom{
    background:rgba(25,135,84,.15);
    border:1px solid rgba(25,135,84,.3);
    color:#75d39a;
    border-radius:16px;
}

.alert-danger-custom{
    background:rgba(220,53,69,.15);
    border:1px solid rgba(220,53,69,.3);
    color:#ff9ca7;
    border-radius:16px;
}

.info-box{
    background:rgba(212,175,55,.08);
    border:1px solid rgba(212,175,55,.15);
    border-radius:16px;
    padding:16px;
    color:#d4af37;
}

.template-table{
    color:white;
    margin-bottom:0;
}

.template-table th{
    background:rgba(212,175,55,.12);
    color:#d4af37;
    border-color:rgba(255,255,255,.08);
}

.template-table td{
    border-color:rgba(255,255,255,.08);
}

.template-table tbody tr:nth-child(odd){
    background:rgba(255,255,255,.03);
}

.template-table tbody tr:nth-child(even){
    background:rgba(255,255,255,.06);
}

.step-card{
    background:rgba(255,255,255,.03);
    border:1px solid rgba(255,255,255,.05);
    border-radius:18px;
    padding:20px;
    text-align:center;
    height:100%;
}

.step-icon{
    font-size:36px;
    color:#d4af37;
    margin-bottom:10px;
}

@media(max-width:768px){

    .page-title{
        font-size:30px;
    }

}

</style>

<div class="container-fluid">

    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center mb-4">

        <div>

            <h1 class="page-title">

                Import Data Barang

            </h1>

            <p class="page-subtitle">

                Upload data barang massal menggunakan file Excel

            </p>

        </div>

        <a href="{{ route('products.index') }}"
           class="btn btn-dark-custom mt-3 mt-lg-0">

            <i class="bi bi-arrow-left me-2"></i>

            Kembali

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success-custom mb-4">

            <i class="bi bi-check-circle-fill me-2"></i>

            {{ session('success') }}

        </div>

    @endif

    @if($errors->any())

        <div class="alert alert-danger-custom mb-4">

            <i class="bi bi-exclamation-triangle-fill me-2"></i>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <div class="row g-4 mb-4">

        <div class="col-md-4">

            <div class="step-card">

                <div class="step-icon">
                    <i class="bi bi-download"></i>
                </div>

                <h5 class="text-white">
                    1. Download Template
                </h5>

                <p class="text-secondary mb-0">
                    Gunakan format Excel yang telah disediakan
                </p>

            </div>

        </div>

        <div class="col-md-4">

            <div class="step-card">

                <div class="step-icon">
                    <i class="bi bi-file-earmark-excel"></i>
                </div>

                <h5 class="text-white">
                    2. Isi Data Barang
                </h5>

                <p class="text-secondary mb-0">
                    Lengkapi data sesuai format template
                </p>

            </div>

        </div>

        <div class="col-md-4">

            <div class="step-card">

                <div class="step-icon">
                    <i class="bi bi-cloud-arrow-up"></i>
                </div>

                <h5 class="text-white">
                    3. Upload File
                </h5>

                <p class="text-secondary mb-0">
                    Sistem akan mengimpor data otomatis
                </p>

            </div>

        </div>

    </div>

    <div class="glass-card p-4 mb-4">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

            <h4 class="text-white mb-0">

                <i class="bi bi-upload me-2"></i>

                Upload Excel

            </h4>

            <a href="{{ route('products.template') }}"
               class="btn btn-success">

                <i class="bi bi-download me-2"></i>

                Download Template

            </a>

        </div>

        <div class="info-box mb-4">

            <i class="bi bi-info-circle-fill me-2"></i>

            File yang didukung: XLSX dan XLS.
            Pastikan urutan kolom sesuai template.

        </div>

        <form
            action="{{ route('products.import') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="mb-4">

                <label class="form-label">

                    Pilih File Excel

                </label>

                <input
                    type="file"
                    name="file"
                    class="form-control custom-input"
                    accept=".xlsx,.xls"
                    required>

            </div>

            <button
                type="submit"
                class="btn btn-gold">

                <i class="bi bi-file-earmark-arrow-up me-2"></i>

                Import Data

            </button>

        </form>

    </div>

    <div class="glass-card p-4">

        <h4 class="text-white mb-4">

            <i class="bi bi-table me-2"></i>

            Format Template Excel

        </h4>

        <div class="table-responsive">

            <table class="table template-table">

                <thead>

                    <tr>

                        <th>kode_barang</th>
                        <th>nama_barang</th>
                        <th>kategori</th>
                        <th>harga</th>
                        <th>stok_total</th>
                        <th>stok_minimum</th>

                    </tr>

                </thead>

                <tbody>

                    <tr>

                        <td>BRG001</td>
                        <td>Mango Ice</td>
                        <td>Liquid</td>
                        <td>120000</td>
                        <td>50</td>
                        <td>5</td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection