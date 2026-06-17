@extends('layouts.app')

@section('content')

<style>

.page-title{
    color:white;
    font-size:32px;
    font-weight:700;
}

.page-subtitle{
    color:#94a3b8;
}

.glass-card{

    background:
    rgba(255,255,255,.05);

    backdrop-filter:blur(18px);

    border:1px solid rgba(255,255,255,.08);

    border-radius:24px;

    box-shadow:
    0 8px 32px rgba(0,0,0,.35);
}

.btn-gold{

    background:#d4af37;

    border:none;

    color:#111827;

    font-weight:600;

    border-radius:12px;

    padding:10px 18px;

    transition:.3s;
}

.btn-gold:hover{

    background:#e4c14c;

    color:black;

    transform:translateY(-2px);
}

.stat-box{

    background:
    rgba(212,175,55,.08);

    border:
    1px solid rgba(212,175,55,.15);

    border-radius:18px;

    padding:20px;
}

.stat-number{

    color:#d4af37;

    font-size:32px;

    font-weight:700;
}

.stat-label{

    color:#94a3b8;
}

/* =========================
   LUXURY DARK TABLE
========================= */

.table-custom{

    width:100%;

    color:#fff;

    border-collapse:separate;

    border-spacing:0;

    overflow:hidden;

    border-radius:18px;
}

/* Header */

.table-custom thead{

    background:
    rgba(212,175,55,.10);
}

.table-custom th{

    color:#d4af37;

    padding:18px;

    font-weight:600;

    border:none;
}

/* Body */

.table-custom td{

    padding:18px;

    border:none;

    color:#e5e7eb;
}

/* Zebra Stripe */

.table-custom tbody tr:nth-child(odd){

    background:
    rgba(255,255,255,.03);
}

.table-custom tbody tr:nth-child(even){

    background:
    rgba(255,255,255,.07);
}

/* Hover */

.table-custom tbody tr{

    transition:.25s;
}

.table-custom tbody tr:hover{

    background:
    rgba(212,175,55,.10);

    transform:translateX(3px);
}

/* Border antar baris */

.table-custom tbody tr:not(:last-child) td{

    border-bottom:
    1px solid rgba(255,255,255,.05);
}

/* Badge Nomor */

.number-badge{

    display:inline-flex;

    align-items:center;

    justify-content:center;

    min-width:38px;

    height:38px;

    border-radius:999px;

    background:
    rgba(212,175,55,.15);

    color:#d4af37;

    font-weight:600;
}

/* Action Button */

.btn-action{

    width:38px;

    height:38px;

    display:inline-flex;

    align-items:center;

    justify-content:center;

    border-radius:10px;
}

.empty-state{

    color:#94a3b8;

    padding:40px;
}

@media(max-width:768px){

    .page-title{

        font-size:26px;
    }

    .btn-gold{

        width:100%;

        margin-top:15px;
    }
}

</style>

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">

        <div>

            <h1 class="page-title">

                Data Kategori

            </h1>

            <p class="page-subtitle mb-0">

                Kelola seluruh kategori barang inventaris

            </p>

        </div>

        <a
            href="{{ route('categories.create') }}"
            class="btn btn-gold">

            <i class="bi bi-plus-circle me-2"></i>

            Tambah Kategori

        </a>

    </div>

    {{-- STATISTIK --}}
    <div class="row mb-4">

        <div class="col-md-3">

            <div class="stat-box">

                <div class="stat-number">

                    {{ $categories->count() }}

                </div>

                <div class="stat-label">

                    Total Kategori

                </div>

            </div>

        </div>

    </div>

    {{-- TABLE --}}
    <div class="glass-card p-4">

        <div class="table-responsive">

            <table class="table-custom w-100 align-middle">

                <thead>

                    <tr>

                        <th width="100">

                            No

                        </th>

                        <th>

                            Nama Kategori

                        </th>

                        <th width="180">

                            Aksi

                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($categories as $item)

                    <tr>

                        <td>

                            <span class="number-badge">

                                {{ $loop->iteration }}

                            </span>

                        </td>

                        <td>

                            <strong>

                                {{ $item->nama_kategori }}

                            </strong>

                        </td>

                        <td>

                            <a
                                href="{{ route('categories.edit',$item->id) }}"
                                class="btn btn-warning btn-action">

                                <i class="bi bi-pencil-square"></i>

                            </a>

                            <form
                                action="{{ route('categories.destroy',$item->id) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger btn-action"
                                    onclick="return confirm('Hapus kategori ini?')">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td
                            colspan="3"
                            class="text-center">

                            <div class="empty-state">

                                <i class="bi bi-inbox fs-1 d-block mb-3"></i>

                                Belum ada data kategori

                            </div>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection