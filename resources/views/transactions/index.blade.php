@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">

    <h3>Riwayat Transaksi</h3>

    <div>

        <a href="{{ route('transactions.masuk') }}"
           class="btn btn-success">

            Barang Masuk

        </a>

        <a href="{{ route('transactions.keluar') }}"
           class="btn btn-danger">

            Barang Keluar

        </a>

    </div>

</div>

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

@if(session('error'))

<div class="alert alert-danger">

    {{ session('error') }}

</div>

@endif

<table class="table table-bordered table-striped">

    <thead>

        <tr>

            <th>No</th>
            <th>Barang</th>
            <th>Jenis</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
            <th>Admin</th>

        </tr>

    </thead>

    <tbody>

    @forelse($transactions as $index => $trx)

        <tr>

            <td>
                {{ $index + 1 }}
            </td>

            <td>
                {{ $trx['barang'] }}
            </td>

            <td>

                @if($trx['jenis'] == 'masuk')

                    <span class="badge bg-success">

                        MASUK

                    </span>

                @else

                    <span class="badge bg-danger">

                        KELUAR

                    </span>

                @endif

            </td>

            <td>
                {{ $trx['jumlah'] }}
            </td>

            <td>
                {{ $trx['tanggal'] }}
            </td>

            <td>
                {{ $trx['admin'] }}
            </td>

        </tr>

    @empty

        <tr>

            <td colspan="6"
                class="text-center">

                Belum ada transaksi

            </td>

        </tr>

    @endforelse

    </tbody>

</table>

@endsection