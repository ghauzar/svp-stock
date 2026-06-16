@extends('layouts.app')

@section('content')

<h3>Edit Transaksi</h3>

<form
action="{{ route(
    'transactions.update',
    $transaction->id
) }}"
method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">

        <label>Barang</label>

        <select
            name="product_id"
            class="form-control">

            @foreach($products as $product)

            <option
                value="{{ $product->id }}"
                {{
                    $transaction->product_id
                    ==
                    $product->id
                    ?
                    'selected'
                    :
                    ''
                }}>

                {{ $product->nama_barang }}

            </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">

        <label>Jenis</label>

        <select
            name="jenis_transaksi"
            class="form-control">

            <option
                value="masuk"
                {{
                    $transaction
                    ->jenis_transaksi
                    ==
                    'masuk'
                    ?
                    'selected'
                    :
                    ''
                }}>

                Masuk

            </option>

            <option
                value="keluar"
                {{
                    $transaction
                    ->jenis_transaksi
                    ==
                    'keluar'
                    ?
                    'selected'
                    :
                    ''
                }}>

                Keluar

            </option>

        </select>

    </div>

    <div class="mb-3">

        <label>Jumlah</label>

        <input
            type="number"
            name="jumlah"
            value="{{ $transaction->jumlah }}"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Tanggal</label>

        <input
            type="date"
            name="tanggal"
            value="{{ $transaction->tanggal }}"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Keterangan</label>

        <textarea
            name="keterangan"
            class="form-control">{{ $transaction->keterangan }}</textarea>

    </div>

    <button
        class="btn btn-primary">

        Update

    </button>

</form>

@endsection