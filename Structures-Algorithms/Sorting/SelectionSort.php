<?php

$x = [1, 34, 5, 8, 17, 11, 7];
SelectionSort::get($x);
print_r($x);
exit;

// O(n*n)
class SelectionSort
{
    /**
     * @param int[] $in
     * @return void
     */
    public static function get(array &$in): void
    {
        for ($i = 0; $i < count($in) - 1; $i++) {
            $min = $i;
            for($j = $i + 1, $jMax = count($in); $j < $jMax; $j++) {
                if ($in[$j] < $in[$min]) {
                    $min = $j;
                }
            }
            [$in[$i], $in[$min]] = [$in[$min], $in[$i]];
        }
    }
}
