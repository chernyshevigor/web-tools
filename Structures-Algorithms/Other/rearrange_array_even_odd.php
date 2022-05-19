<?php

function rearrangeArr(array &$arr, int $n): void
{
    // total even positions
    $evenPos = (int) ($n / 2);

    // total odd positions
    $oddPos = $n - $evenPos;

    $tempArr = array_fill(0, $n, null);

    // copy original array in an auxiliary array
    for ($i = 0; $i < $n; $i++) {
        $tempArr[$i] = $arr[$i];
    }

    // sort the auxiliary array
    sort($tempArr);

    $j = $oddPos - 1;

    // fill up odd position in original array
    for ($i = 0; $i < $n; $i += 2) {
        $arr[$i] = $tempArr[$j];
        $j--;
    }

    $j = $oddPos;

    // fill up even positions in original array
    for ($i = 1; $i < $n; $i += 2) {
        $arr[$i] = $tempArr[$j];
        $j++;
    }
}

function rearrangeArr2(array &$arr, int $n): void
{
    $b = [];
    for ($i = 0; $i < $n; $i++) {
        $b[$i] = $arr[$i];
    }
    sort($b);
    $p = 0;
    $q = $n - 1;
    for ($i = $n - 1; $i >= 0; $i--) {
        if ($i % 2 !== 0) {
            $arr[$i] = $b[$q];
            $q--;
        } else {
            $arr[$i] = $b[$p];
            $p++;
        }
    }
}
