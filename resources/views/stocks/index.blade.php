@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">

    <h3>Data Stok Barang</h3>

    <a href="{{ route('stocks.create') }}"
       class="btn btn-primary">

        Tambah Stok

    </a>

</div>

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<table class="table table-bordered table-striped">

    <thead>

        <tr>

            <th>No</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Tanggal Masuk</th>
            <th>Tanggal Kadaluarsa</th>
            <th width="180">Aksi</th>

        </tr>

    </thead>

    <tbody>

    @forelse($stocks as $index => $stock)

        <tr>

            <td>
                {{ $index + 1 }}
            </td>

            <td>
                {{ $stock['nama_barang'] }}
            </td>

            <td>
                {{ $stock['jumlah'] }}
            </td>

            <td>
                {{ $stock['tanggal_masuk'] }}
            </td>

            <td>

                @if($stock['tanggal_kadaluarsa'])

                    {{ $stock['tanggal_kadaluarsa'] }}

                @else

                    -

                @endif

            </td>

            <td>

                <a href="{{ route('stocks.edit',$stock['id']) }}"
                   class="btn btn-warning btn-sm">

                    Edit

                </a>

                <form
                    action="{{ route('stocks.destroy',$stock['id']) }}"
                    method="POST"
                    class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Hapus stok ini?')">

                        Hapus

                    </button>

                </form>

            </td>

        </tr>

    @empty

        <tr>

            <td colspan="6"
                class="text-center">

                Belum ada data stok

            </td>

        </tr>

    @endforelse

    </tbody>

</table>

@endsection