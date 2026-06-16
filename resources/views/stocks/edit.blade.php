@extends('layouts.app')

@section('content')

<h3>Edit Stok Barang</h3>

<form
action="{{ route('stocks.update',$stock->id) }}"
method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">

        <label>Jumlah Stok</label>

        <input
            type="number"
            name="jumlah"
            value="{{ $stock->jumlah }}"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Tanggal Masuk</label>

        <input
            type="date"
            name="tanggal_masuk"
            value="{{ $stock->tanggal_masuk }}"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Tanggal Kadaluarsa</label>

        <input
            type="date"
            name="tanggal_kadaluarsa"
            value="{{ $stock->tanggal_kadaluarsa }}"
            class="form-control">

    </div>

    <button
        type="submit"
        class="btn btn-primary">

        Update

    </button>

    <a href="{{ route('stocks.index') }}"
       class="btn btn-secondary">

        Kembali

    </a>

</form>

@endsection