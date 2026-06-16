<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;

use App\Services\SequentialSearchService;
use App\Services\SelectionSortService;

use PhpOffice\PhpSpreadsheet\IOFactory;

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
        // Deklarasi variabel yang dibutuhkan
        $searchComparison = 0;
        $sortComparison = 0;
        $executionTime = 0;

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
                    'tanggal_masuk' => $item->created_at->format('d-m-Y')

                ];
            })
            ->toArray();

        // Pengukur waktu (Start)
        $startTime = microtime(true);

        if(
            $request->filled('search')
            &&
            $request->filled('search_by')
        )
        {
            $result = $searchService->search(
                $products,
                $request->search,
                $request->search_by
            );

            $products = $result['data'];

            $searchComparison =
                $result['comparison'];
        }

        
        if($request->filled('sort'))
        {
            $result = $sortService->sort(
                $products,
                $request->sort
            );

            $products = $result['data'];

            $sortComparison =
                $result['comparison'];
        }

        // Pengukur waktu (end)
        $executionTime = microtime(true) - $startTime;
        $totalData=count($products);
        $totalResult = count($products);

        return view(
            'products.index',
            compact(
                'products',
                'searchComparison',
                'sortComparison',
                'executionTime',
                'totalData',
                'totalResult'
            )
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

    // Method untuk import data dengan Excel
    public function showImportForm()
    {
        return view('products.import');
    }

    public function downloadTemplate()
    {
        return response()->download(
            public_path('template-product.xlsx')
        );
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        $spreadsheet = IOFactory::load(
            $request->file('file')->getPathname()
        );

        $sheet = $spreadsheet->getActiveSheet();

        $rows = $sheet->toArray();

        foreach(array_slice($rows, 1) as $row)
        {
            $category = Category::firstOrCreate([
                'nama_kategori' => $row[2]
            ]);

            Product::updateOrCreate(

                [
                    'kode_barang' => $row[0]
                ],

                [
                    'nama_barang' => $row[1],

                    'category_id' => $category->id,

                    'harga' => $row[3],

                    'stok_total' => $row[4],

                    'stok_minimum' => $row[5]
                ]
            );
        }

        return redirect()
            ->route('products.index')
            ->with(
                'success',
                'Import berhasil'
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
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view(
            'products.edit',
            compact(
                'product',
                'categories'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request $request,
        Product $product
    )
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'category_id' => 'required',
            'harga' => 'required'

        ]);

        $product->update([
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
                'Barang berhasil diubah'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with(
                'success',
                'Barang berhasil dihapus'
            );
    }
}
