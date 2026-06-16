<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Stock;
use App\Models\Product;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks = Stock::with('product')
            ->get()
            ->map(function($stock){

                return [
                    'id' => $stock->id,
                    'nama_barang' => $stock->product->nama_barang,
                    'jumlah' => $stock->jumlah,
                    'tanggal_masuk' => $stock->tanggal_masuk,
                    'tanggal_kadaluarsa' => $stock->tanggal_kadaluarsa
                ];
            })
            ->toArray();

        return view(
            'stocks.index',
            compact('stocks')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();

        return view(
            'stocks.create',
            compact('products')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Stock::create([
            'product_id' => $request->product_id,
            'jumlah' => $request->jumlah,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa
        ]);

        $product = Product::find(
            $request->product_id
        );

        $product->increment(
            'stok_total',
            $request->jumlah
        );

        return redirect()
            ->route('stocks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        return view(
            'stocks.edit',
            compact('stock')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stock $stock)
    {
        // stok sebelum diedit
        $stokLama = $stock->jumlah;

        // stok setelah diedit
        $stokBaru = $request->jumlah;

        // hitung selisih
        $selisih = $stokBaru - $stokLama;

        // update stok_total pada product
        $stock->product->increment(
            'stok_total',
            $selisih
        );

        // update data stock
        $stock->update([
            'jumlah' => $request->jumlah,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa
        ]);

        return redirect()
            ->route('stocks.index')
            ->with(
                'success',
                'Data stok berhasil diubah'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        $stock->product->decrement(
            'stok_total',
            $stock->jumlah
        );

        $stock->delete();

        return redirect()
            ->route('stocks.index')
            ->with(
                'success',
                'Data stok berhasil dihapus'
            );
    }
}
