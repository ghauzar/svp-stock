<?php

namespace App\Services;

class SelectionSortService
{
    public function sort(array $data, string $field)
    {
        $n = count($data);

        for ($i = 0; $i < $n - 1; $i++)
        {
            $minIndex = $i;

            for ($j = $i + 1; $j < $n; $j++)
            {
                if (
                    $data[$j][$field]
                    <
                    $data[$minIndex][$field]
                ) {
                    $minIndex = $j;
                }
            }

            if ($minIndex != $i)
            {
                $temp = $data[$i];

                $data[$i] = $data[$minIndex];

                $data[$minIndex] = $temp;
            }
        }

        return $data;
    }
}