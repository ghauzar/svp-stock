<?php

namespace App\Services;

class SequentialSearchService
{
    public function search(
        array $products,
        string $keyword,
        string $field
    )
    {
        $results = [];

        $comparison = 0;

        foreach ($products as $product)
        {
            $comparison++;

            if (
                str_contains(
                    strtolower((string)$product[$field]),
                    strtolower($keyword)
                )
            )
            {
                $results[] = $product;
            }
        }

        return [
            'data' => $results,
            'comparison' => $comparison
        ];
    }
}