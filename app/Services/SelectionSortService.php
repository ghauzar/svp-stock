<?php

namespace App\Services;

class SelectionSortService
{
    public function sort(
        array $data,
        string $field
    )
    {
        $comparison = 0;

        $n = count($data);

        for($i = 0; $i < $n - 1; $i++)
        {
            $min = $i;

            for($j = $i + 1; $j < $n; $j++)
            {
                $comparison++;

                if(
                    $data[$j][$field]
                    <
                    $data[$min][$field]
                )
                {
                    $min = $j;
                }
            }

            if($min != $i)
            {
                $temp = $data[$i];

                $data[$i] = $data[$min];

                $data[$min] = $temp;
            }
        }

        return [
            'data' => $data,
            'comparison' => $comparison
        ];
    }
}