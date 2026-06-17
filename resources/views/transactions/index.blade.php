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

.btn-gold{
    background:#d4af37;
    border:none;
    color:#111827;
    font-weight:600;
    border-radius:12px;
    padding:12px 20px;
}

.btn-gold:hover{
    background:#c89f1f;
    color:#111827;
}

.btn-red{
    background:#dc3545;
    border:none;
    color:white;
    font-weight:600;
    border-radius:12px;
    padding:12px 20px;
}

.btn-red:hover{
    background:#bb2d3b;
    color:white;
}

.stat-card{
    background:rgba(212,175,55,.08);
    border:1px solid rgba(212,175,55,.2);
    border-radius:18px;
    padding:25px;
}

.stat-number{
    color:#d4af37;
    font-size:42px;
    font-weight:700;
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
    background:rgba(212,175,55,.12);
    color:#d4af37;
    border:none;
    padding:18px;
    font-weight:600;
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

.badge-masuk{
    background:rgba(25,135,84,.2);
    color:#3ddc97;
    padding:8px 14px;
    border-radius:999px;
    font-weight:600;
}

.badge-keluar{
    background:rgba(220,53,69,.2);
    color:#ff6b81;
    padding:8px 14px;
    border-radius:999px;
    font-weight:600;
}

.btn-action{
    width:38px;
    height:38px;
    border:none;
    border-radius:10px;
    display:inline-flex;
    align-items:center;
    justify-content:center;
}

.btn-edit{
    background:#ffc107;
    color:#111827;
}

.btn-delete{
    background:#dc3545;
    color:white;
}

.alert{
    border:none;
    border-radius:14px;
}

@media(max-width:768px){

    .page-title{
        font-size:30px;
    }

    .header-mobile{
        flex-direction:column;
        align-items:start !important;
        gap:15px;
    }

}

</style>

<div class="container-fluid">


<div class="d-flex justify-content-between align-items-center mb-4 header-mobile">

    <div>

        <h1 class="page-title">

            Riwayat Transaksi

        </h1>

        <p class="page-subtitle">

            Monitoring seluruh aktivitas barang masuk dan keluar

        </p>

    </div>

    <div class="d-flex gap-2">

        <a href="{{ route('transactions.masuk') }}"
           class="btn btn-gold">

            <i class="bi bi-box-arrow-in-down me-2"></i>

            Barang Masuk

        </a>

        <a href="{{ route('transactions.keluar') }}"
           class="btn btn-red">

            <i class="bi bi-box-arrow-up me-2"></i>

            Barang Keluar

        </a>

    </div>

</div>

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

@if(session('error'))

<div class="alert alert-danger">

    {{ session('error') }}

</div>

@endif

<div class="row mb-4">

    <div class="col-md-4">

        <div class="stat-card">

            <div class="stat-number">

                {{ count($transactions) }}

            </div>

            <div class="stat-label">

                Total Transaksi

            </div>

        </div>

    </div>

</div>

<div class="glass-card p-4">

    <div class="table-responsive">

        <table class="custom-table">

            <thead>

                <tr>

                    <th>No</th>
                    <th>Barang</th>
                    <th>Jenis</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>Admin</th>
                    <th width="120">Aksi</th>

                </tr>

            </thead>

            <tbody>

            @forelse($transactions as $index => $trx)

                <tr>

                    <td>

                        <span class="badge bg-secondary">

                            #{{ $index + 1 }}

                        </span>

                    </td>

                    <td>

                        {{ $trx['barang'] }}

                    </td>

                    <td>

                        @if($trx['jenis'] == 'masuk')

                            <span class="badge-masuk">

                                <i class="bi bi-arrow-down-circle me-1"></i>

                                MASUK

                            </span>

                        @else

                            <span class="badge-keluar">

                                <i class="bi bi-arrow-up-circle me-1"></i>

                                KELUAR

                            </span>

                        @endif

                    </td>

                    <td>

                        {{ number_format($trx['jumlah']) }}

                    </td>

                    <td>

                        {{ $trx['tanggal'] }}

                    </td>

                    <td>

                        {{ $trx['admin'] }}

                    </td>

                    <td>

                        <div class="d-flex gap-2">

                            <a href="{{ route('transactions.edit',$trx['id']) }}"
                               class="btn-action btn-edit">

                                <i class="bi bi-pencil"></i>

                            </a>

                            <form
                                action="{{ route('transactions.destroy',$trx['id']) }}"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn-action btn-delete"
                                    onclick="return confirm('Hapus transaksi?')">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7" class="text-center py-5">

                        <i class="bi bi-inbox fs-1 d-block mb-3"></i>

                        Belum ada transaksi

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

</div>

@endsection
