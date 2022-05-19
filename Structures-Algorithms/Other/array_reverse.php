<?php

function reverseArray(array &$arr, int $start, int $end)
{
    while ($start < $end) {
        $temp = $arr[$start];
        $arr[$start] = $arr[$end];
        $arr[$end] = $temp;
        $start++;
        $end--;
    }
}

function reverseArray2(array &$arr, int $start, int $end)
{
    if ($start >= $end) {
        return;
    }
    $temp = $arr[$start];
    $arr[$start] = $arr[$end];
    $arr[$end] = $temp;
    reverseArray2($arr, $start + 1, $end - 1);
}
