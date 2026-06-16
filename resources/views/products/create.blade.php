@extends('layouts.app')

@section('content')

<h3>Tambah Barang</h3>

<form action="{{ route('products.store') }}"
      method="POST">

    @csrf

    <div class="mb-3">

        <label>Kode Barang</label>

        <input
            type="text"
            name="kode_barang"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Nama Barang</label>

        <input
            type="text"
            name="nama_barang"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Kategori</label>

        <select
            name="category_id"
            class="form-control">

            @foreach($categories as $category)

                <option value="{{ $category->id }}">
                    {{ $category->nama_kategori }}
                </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">

        <label>Harga</label>

        <input
            type="number"
            name="harga"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Stok Awal</label>

        <input
            type="number"
            name="stok_total"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Stok Minimum</label>

        <input
            type="number"
            name="stok_minimum"
            value="5"
            class="form-control">

    </div>

    <button
        type="submit"
        class="btn btn-success">

        Simpan

    </button>

</form>

@endsection