<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;



class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with(
            ['product','user']
        )
        ->latest()
        ->get()
        ->map(function($trx){

            return [
                'id' => $trx->id,
                'barang' => $trx->product->nama_barang,
                'jenis' => $trx->jenis_transaksi,
                'jumlah' => $trx->jumlah,
                'tanggal' => $trx->tanggal,
                'admin' => $trx->user->name
            ];
        })
        ->toArray();

        return view(
            'transactions.index',
            compact('transactions')
        );
    }

    // Barang masuk
    public function createMasuk()
    {
        $products = Product::all();

        return view(
            'transactions.masuk',
            compact('products')
        );
    }

    public function storeMasuk(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'jumlah' => 'required|integer|min:1',
            'tanggal' => 'required'
        ]);

        Transaction::create([
            'product_id' => $request->product_id,
            'user_id' => session('user_id'),
            'jenis_transaksi' => 'masuk',
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan
        ]);

        Product::find(
            $request->product_id
        )->increment(
            'stok_total',
            $request->jumlah
        );

        return redirect()
            ->route('transactions.index');
    }


    // Barang keluar
    public function createKeluar()
    {
        $products = Product::all();

        return view(
            'transactions.keluar',
            compact('products')
        );
    }

    public function storeKeluar(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'jumlah' => 'required|integer|min:1',
            'tanggal' => 'required'
        ]);

        $product = Product::find(
            $request->product_id
        );

        if(
            $product->stok_total
            <
            $request->jumlah
        )
        {
            return back()
                ->with(
                    'error',
                    'Stok tidak mencukupi'
                );
        }

        Transaction::create([
            'product_id' => $request->product_id,
            'user_id' => session('user_id'),
            'jenis_transaksi' => 'keluar',
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan
        ]);

        $product->decrement(
            'stok_total',
            $request->jumlah
        );

        return redirect()
            ->route('transactions.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        $products = Product::all();

        return view(
            'transactions.edit',
            compact(
                'transaction',
                'products'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request $request,
        Transaction $transaction
    )
    {
        $product = Product::find(
            $transaction->product_id
        );

        // rollback transaksi lama

        if(
            $transaction->jenis_transaksi
            == 'masuk'
        )
        {
            $product->decrement(
                'stok_total',
                $transaction->jumlah
            );
        }
        else
        {
            $product->increment(
                'stok_total',
                $transaction->jumlah
            );
        }

        // terapkan transaksi baru

        if(
            $request->jenis_transaksi
            == 'masuk'
        )
        {
            $product->increment(
                'stok_total',
                $request->jumlah
            );
        }
        else
        {
            if(
                $product->stok_total
                <
                $request->jumlah
            )
            {
                return back()
                    ->with(
                        'error',
                        'Stok tidak mencukupi'
                    );
            }

            $product->decrement(
                'stok_total',
                $request->jumlah
            );
        }

        $transaction->update([

            'product_id'
                =>
            $request->product_id,

            'jenis_transaksi'
                =>
            $request->jenis_transaksi,

            'jumlah'
                =>
            $request->jumlah,

            'tanggal'
                =>
            $request->tanggal,

            'keterangan'
                =>
            $request->keterangan

        ]);

        return redirect()
            ->route('transactions.index')
            ->with(
                'success',
                'Transaksi berhasil diubah'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Transaction $transaction
    )
    {
        $product = Product::find(
            $transaction->product_id
        );

        if(
            $transaction->jenis_transaksi
            == 'masuk'
        )
        {
            $product->decrement(
                'stok_total',
                $transaction->jumlah
            );
        }
        else
        {
            $product->increment(
                'stok_total',
                $transaction->jumlah
            );
        }

        $transaction->delete();

        return redirect()
            ->route('transactions.index')
            ->with(
                'success',
                'Transaksi berhasil dihapus'
            );
    }
}
