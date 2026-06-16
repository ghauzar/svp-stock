@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">

    <h3>Import Data Barang</h3>

    <a href="{{ route('products.index') }}"
       class="btn btn-secondary">

        Kembali

    </a>

</div>

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

@if($errors->any())

<div class="alert alert-danger">

    <ul class="mb-0">

        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

<div class="card">

    <div class="card-body">

        <div class="mb-3">

            <a href="{{ route('products.template') }}"
               class="btn btn-success">

                Download Template Excel

            </a>

        </div>

        <form
            action="{{ route('products.import') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="mb-3">

                <label>File Excel</label>

                <input
                    type="file"
                    name="file"
                    class="form-control"
                    accept=".xlsx,.xls"
                    required>

            </div>

            <button
                type="submit"
                class="btn btn-primary">

                Import Data

            </button>

        </form>

    </div>

</div>

<div class="card mt-3">

    <div class="card-header">

        Format Template

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <thead>

                <tr>
                    <th>kode_barang</th>
                    <th>nama_barang</th>
                    <th>kategori</th>
                    <th>harga</th>
                    <th>stok_total</th>
                    <th>stok_minimum</th>
                </tr>

            </thead>

            <tbody>

                <tr>
                    <td>BRG001</td>
                    <td>Mango Ice</td>
                    <td>Liquid</td>
                    <td>120000</td>
                    <td>50</td>
                    <td>5</td>
                </tr>

            </tbody>

        </table>

    </div>

</div>

@endsection