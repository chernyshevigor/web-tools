<?php

$x = [1, 3, 5, 8, 17 ,11 ,2];
InsertionSort::get($x, 0, count($x) - 1);
print_r($x);
exit;

// O(n*n)
class InsertionSort
{
    /**
     * @param int[] $in
     * @return void
     */
    public static function get(array &$in): void
    {
        for($i = 0, $iMax = count($in); $i < $iMax; $i++) {
            $val = $in[$i];
            $j = $i - 1;
            while ($j >= 0 && $in[$j] > $val){
                $in[$j+1] = $in[$j];
                $j--;
            }
            $in[$j+1] = $val;
        }
    }
}
