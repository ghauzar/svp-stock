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

.stat-card{
    background:rgba(255,193,7,.08);
    border:1px solid rgba(255,193,7,.15);
    border-radius:20px;
    padding:25px;
}

.stat-number{
    font-size:42px;
    font-weight:700;
    color:#ffc107;
}

.stat-label{
    color:#94a3b8;
}

.custom-table{
    width:100%;
    color:white;
    border-collapse:separate;
    border-spacing:0;
}

.custom-table thead th{
    background:rgba(255,193,7,.12);
    color:#ffc107;
    border:none;
    padding:18px;
}

.custom-table tbody tr:nth-child(odd){
    background:rgba(255,255,255,.03);
}

.custom-table tbody tr:nth-child(even){
    background:rgba(255,255,255,.06);
}

.custom-table tbody td{
    padding:18px;
    border:none;
    vertical-align:middle;
}

.stock-danger{
    background:rgba(220,53,69,.2);
    color:#ff6b81;
    padding:8px 14px;
    border-radius:999px;
    font-weight:600;
}

.stock-warning{
    background:rgba(255,193,7,.15);
    color:#ffc107;
    padding:8px 14px;
    border-radius:999px;
    font-weight:600;
}

.btn-gold{
    background:#d4af37;
    color:#111827;
    border:none;
    border-radius:12px;
    font-weight:600;
}

.btn-gold:hover{
    background:#c49b24;
    color:#111827;
}

@media(max-width:768px){

    .page-title{
        font-size:30px;
    }

}

</style>

<div class="container-fluid">

```
<div class="mb-4">

    <h1 class="page-title">

        Stok Menipis

    </h1>

    <p class="page-subtitle">

        Daftar barang yang perlu segera dilakukan restock

    </p>

</div>

<div class="row mb-4">

    <div class="col-md-4">

        <div class="stat-card">

            <div class="stat-number">

                {{ count($barangMenipis) }}

            </div>

            <div class="stat-label">

                Barang Perlu Restock

            </div>

        </div>

    </div>

</div>

<div class="glass-card p-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h4 class="text-white mb-0">

            <i class="bi bi-exclamation-triangle-fill text-warning me-2"></i>

            Daftar Barang Kritis

        </h4>

        <a
            href="{{ route('products.index') }}"
            class="btn btn-gold">

            <i class="bi bi-box-seam me-2"></i>

            Lihat Semua Barang

        </a>

    </div>

    <div class="table-responsive">

        <table class="custom-table">

            <thead>

                <tr>

                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Stok Saat Ini</th>
                    <th>Stok Minimum</th>
                    <th>Status</th>

                </tr>

            </thead>

            <tbody>

                @forelse($barangMenipis as $index => $barang)

                <tr>

                    <td>

                        {{ $index + 1 }}

                    </td>

                    <td>

                        {{ $barang->kode_barang }}

                    </td>

                    <td>

                        {{ $barang->nama_barang }}

                    </td>

                    <td>

                        {{ $barang->category->nama_kategori }}

                    </td>

                    <td>

                        <span class="stock-danger">

                            {{ $barang->stok_total }}

                        </span>

                    </td>

                    <td>

                        {{ $barang->stok_minimum }}

                    </td>

                    <td>

                        <span class="stock-warning">

                            RESTOCK

                        </span>

                    </td>

                </tr>

                @empty

                <tr>

                    <td
                        colspan="7"
                        class="text-center py-5">

                        <i class="bi bi-check-circle-fill text-success fs-1 d-block mb-3"></i>

                        Tidak ada barang yang stoknya menipis

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>
```

</div>

@endsection
