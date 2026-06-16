@extends('layouts.app')

@section('content')

<h3>Transaksi Barang Masuk</h3>

<form
action="{{ route('transactions.storeMasuk') }}"
method="POST">

    @csrf

    <div class="mb-3">

        <label>Barang</label>

        <select
            name="product_id"
            class="form-control">

            @foreach($products as $product)

                <option
                    value="{{ $product->id }}">

                    {{ $product->nama_barang }}

                </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">

        <label>Jumlah</label>

        <input
            type="number"
            name="jumlah"
            min="1"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Tanggal</label>

        <input
            type="date"
            name="tanggal"
            value="{{ date('Y-m-d') }}"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Keterangan</label>

        <textarea
            name="keterangan"
            class="form-control"></textarea>

    </div>

    <button
        class="btn btn-success">

        Simpan

    </button>

    <a href="{{ route('transactions.index') }}"
       class="btn btn-secondary">

        Kembali

    </a>

</form>

@endsection