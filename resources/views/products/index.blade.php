@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">

    <h3>Data Barang</h3>

    <a href="{{ route('products.create') }}"
       class="btn btn-primary">

        Tambah Barang

    </a>

</div>

{{-- Form Search --}}
<form method="GET">
<div class="row mb-3">
    <div class="col-md-4">
        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Cari "
            value="{{ request('search') }}">
    </div>
    <div class="col-md-3">

    <select
        name="search_by"
        class="form-control">

        <option value="nama_barang">
            Nama Barang
        </option>

        <option value="kode_barang">
            Kode Barang
        </option>

        <option value="kategori">
            Kategori
        </option>

        <option value="stok_total">
            Jumlah Stok
        </option>

    </select>

    </div>

    <div class="col-md-3">
        <select
            name="sort"
            class="form-control">

            <option value="">
                Pilih Pengurutan
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

    <div class="col-md-2">
        <button
            class="btn btn-primary">
            Proses
        </button>
    </div>
</div>
</form>


@if($searchComparison)

<div class="alert alert-info">

    Sequential Search melakukan
    {{ $searchComparison }}
    kali pemeriksaan data

</div>

@endif


@if($sortComparison)

<div class="alert alert-warning">

    Selection Sort melakukan
    {{ $sortComparison }}
    kali perbandingan data

</div>

@endif

<table class="table table-bordered table-striped">

    <thead>

        <tr>

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
                {{ $product['kode_barang'] }}
            </td>

            <td>
                {{ $product['nama_barang'] }}
            </td>

            <td>
                {{ $product['kategori'] }}
            </td>

            <td>
                Rp {{ number_format($product['harga']) }}
            </td>

            <td>
                {{ $product['tanggal_masuk'] }}
            </td>

            <td>

                @if($product['stok_total'] <= $product['stok_minimum'])

                    <span class="badge bg-danger">
                        {{ $product['stok_total'] }}
                    </span>

                @else

                    <span class="badge bg-success">
                        {{ $product['stok_total'] }}
                    </span>

                @endif

            </td>

            <td>

                <a href="{{ route('products.edit', ['product' => $product['id']]) }}"
                    class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form
                    action="{{ route('products.destroy',['product' => $product['id']]) }}"
                    method="POST"
                    class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Hapus data?')">

                        Hapus

                    </button>

                </form>

            </td>

        </tr>

    @empty

        <tr>

            <td colspan="6"
                class="text-center">

                Tidak ada data

            </td>

        </tr>

    @endforelse

    </tbody>

</table>

@endsection