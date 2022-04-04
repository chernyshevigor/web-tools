<?php

$x = [1, 3, 5, 8, 17, 11, 2];
MergeSort::get($x);
print_r($x);
exit;

// O(n log(n))
class MergeSort
{
    /**
     * @param int[] $in
     */
    public static function get(array &$in): void
    {
        // array_filter($in, 'is_int');
        self::mergeSort($in, [], 0, count($in) - 1);
    }


    private static function mergeSort(array &$in, array $helper, int $low, int $high): void
    {
        if ($low < $high) {
            $middle = ($low + $high) / 2;
            self::mergeSort($in, $helper, $low, $middle); // sorting of the left part
            self::mergeSort($in, $helper, $middle + 1, $high); // sorting of the right part
            self::merge($in, $helper, $low, $middle, $high); // merging
        }
    }

    private static function merge(array &$in, array &$helper, int $low, int $middle, int $high): void
    {
        for ($i = $low; $i <= $high; $i++) {
            $helper[$i] = $in[$i];
        }
        $helperLeft = $low;
        $helperRight = $middle + 1;
        $current = $low;

        while ($helperLeft <= $middle && $helperRight <= $high) {
            if ($helper[$helperLeft] <= $helper[$helperRight]) {
                $in[$current] = $helper[$helperLeft];
                $helperLeft++;
            } else {
                $in[$current] = $helper[$helperRight];
                $helperRight++;
            }
            $current++;
        }
        $remaining = $middle - $helperLeft;
        for ($i = 0; $i <= $remaining; $i++) {
            $in[$current + $i] = $helper[$helperLeft + $i];
        }
    }
}

// other PHP example: https://www.w3resource.com/php-exercises/searching-and-sorting-algorithm/searching-and-sorting-algorithm-exercise-17.php
