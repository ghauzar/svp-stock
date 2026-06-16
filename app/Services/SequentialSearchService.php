<?php

namespace App\Services;

class SequentialSearchService
{
    public function search(array $products, string $keyword)
    {
        $results = [];

        foreach ($products as $product)
        {
            if (
                str_contains(
                    strtolower($product['nama_barang']),
                    strtolower($keyword)
                )
            ) {
                $results[] = $product;
            }
        }

        return $results;
    }
}