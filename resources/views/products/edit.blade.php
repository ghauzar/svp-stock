@extends('layouts.app')

@section('content')

<h3>Edit Barang</h3>

<form
action="{{ route('products.update',$product->id) }}"
method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">

        <label>Kode Barang</label>

        <input
            type="text"
            name="kode_barang"
            value="{{ $product->kode_barang }}"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Nama Barang</label>

        <input
            type="text"
            name="nama_barang"
            value="{{ $product->nama_barang }}"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Kategori</label>

        <select
            name="category_id"
            class="form-control">

            @foreach($categories as $category)

                <option
                    value="{{ $category->id }}"
                    {{ $product->category_id == $category->id ? 'selected' : '' }}>

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
            value="{{ $product->harga }}"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Stok</label>

        <input
            type="number"
            name="stok_total"
            value="{{ $product->stok_total }}"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Stok Minimum</label>

        <input
            type="number"
            name="stok_minimum"
            value="{{ $product->stok_minimum }}"
            class="form-control">

    </div>

    <button
        class="btn btn-primary">
        Update
    </button>

</form>

@endsection