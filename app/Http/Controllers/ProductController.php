<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;

use App\Services\SequentialSearchService;
use App\Services\SelectionSortService;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(
        Request $request,
        SequentialSearchService $searchService,
        SelectionSortService $sortService
    )
    {
        $products = Product::with('category')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'kode_barang' => $item->kode_barang,
                    'nama_barang' => $item->nama_barang,
                    'kategori' => $item->category->nama_kategori,
                    'harga' => $item->harga,
                    'stok_total' => $item->stok_total,
                    'stok_minimum' => $item->stok_minimum,
                    'tanggal_masuk' => $item->created_at->format('Y-m-d'),
                ];
            })
            ->toArray();

        if ($request->filled('search'))
        {
            $products = $searchService->search(
                $products,
                $request->search
            );
        }

        if ($request->filled('sort'))
        {
            $products = $sortService->sort(
                $products,
                $request->sort
            );
        }

        return view(
            'products.index',
            compact('products')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view(
            'products.create',
            compact('categories')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    Product::create([
        'kode_barang' => $request->kode_barang,
        'nama_barang' => $request->nama_barang,
        'category_id' => $request->category_id,
        'harga' => $request->harga,
        'stok_total' => $request->stok_total,
        'stok_minimum' => $request->stok_minimum
    ]);

    return redirect()
        ->route('products.index')
        ->with(
            'success',
            'Barang berhasil ditambahkan'
        );
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
