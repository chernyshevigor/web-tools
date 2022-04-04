<?php

$x = [9, 8, 7, 6, 5, 4, 3, 2, 1, 0, 10, 1000, 0];
HeapSort::get($x);
print_r($x);
exit;

// O(n Log(n))
class HeapSort
{
    /**
     * @param int[] $in
     * @return void
     */
    public static function get(array &$in): void
    {
        $init = (int) floor((count($in) - 1) / 2);
        for ($i = $init; $i >= 0; $i--){
            $count = count($in) - 1;
            self::buildHeap($in, $i, $count);
        }
        for ($i = (count($in) - 1); $i >= 1; $i--)  {
            $tmp = $in[0];
            $in[0] = $in[$i];
            $in[$i] = $tmp;
            self::buildHeap($in, 0, $i - 1);
        }
    }

    private static function buildHeap(array &$in, int $i, int $t): void
    {
        $tmp = $in[$i];
        $j = $i * 2 + 1;
        while ($j <= $t)  {
            if ($j < $t && $in[$j] < $in[$j + 1]) {
                $j++;
            }
            if($tmp < $in[$j]) {
                $in[$i] = $in[$j];
                $i = $j;
                $j = 2 * $i + 1;
            } else {
                $j = $t + 1;
            }
        }
        $in[$i] = $tmp;
    }
}

// https://www.w3resource.com/php-exercises/searching-and-sorting-algorithm/searching-and-sorting-algorithm-exercise-2.php
