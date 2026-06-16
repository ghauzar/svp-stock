@extends('layouts.app')

@section('content')

<h3>Tambah Stok Barang</h3>

<form
action="{{ route('stocks.store') }}"
method="POST">

    @csrf

    <div class="mb-3">

        <label>Barang</label>

        <select
            name="product_id"
            class="form-control">

            <option value="">
                Pilih Barang
            </option>

            @foreach($products as $product)

                <option value="{{ $product->id }}">

                    {{ $product->nama_barang }}

                </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">

        <label>Jumlah Stok</label>

        <input
            type="number"
            name="jumlah"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Tanggal Masuk</label>

        <input
            type="date"
            name="tanggal_masuk"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Tanggal Kadaluarsa</label>

        <input
            type="date"
            name="tanggal_kadaluarsa"
            class="form-control">

    </div>

    <button
        type="submit"
        class="btn btn-success">

        Simpan

    </button>

    <a href="{{ route('stocks.index') }}"
       class="btn btn-secondary">

        Kembali

    </a>

</form>

@endsection