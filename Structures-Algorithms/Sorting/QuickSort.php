<?php

$x = [1,3,5,8,17,11,2];
QuickSort::get($x, 0, count($x) - 1);
print_r($x);
exit;

// middle case O(n log(n))
// worst case O(n^2)
class QuickSort
{
    /**
     * @param int[] $in
     * @param int $left
     * @param int $right
     * @return void
     */
    public static function get(array &$in, int $left, int $right): void
    {
        $index = self::partition($in, $left, $right);
        if ($left < $index - 1) { // sorting of the left side
            self::get($in, $left, $index - 1);
        }
        if ($left < $right) { // sorting of the right side
            self::get($in, $index, $right);
        }
    }

    public static function partition(array &$in, int $left, int $right): int
    {
        $pivot = $in[($left + $right) / 2]; // the center point
        while ($left <= $right) {
            while ($in[$left] < $pivot) {
                $left++;
            }
            while ($in[$right] > $pivot) {
                $right--;
            }
            if ($left <= $right) {
                self::swap($in, $left, $right);
                $left++;
                $right--;
            }
        }
        return $left;
    }

    private static function swap(array &$in, int $idx1, int $idx2): void
    {
        [$in[$idx1], $in[$idx2]] = [$in[$idx2], $in[$idx1]];
    }
}

// other PHP example: https://www.w3resource.com/php-exercises/searching-and-sorting-algorithm/searching-and-sorting-algorithm-exercise-1.php
