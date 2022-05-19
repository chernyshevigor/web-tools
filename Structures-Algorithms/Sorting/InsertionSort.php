<?php

$x = [1, 3, 5, 8, 17 ,11 ,2];
InsertionSort::get($x);
print_r($x);
exit;

/*
 * Worst O(n^2)
 * Average O(n^2)
 * Best O(n)
 */
class InsertionSort
{
    /**
     * @param int[] $in
     * @return void
     */
    public static function get(array &$in): void
    {
        for ($i = 0, $iMax = count($in); $i < $iMax; $i++) {
            $val = $in[$i];
            $j = $i - 1;
            while ($j >= 0 && $in[$j] > $val){
                $in[$j + 1] = $in[$j];
                $j--;
            }
            $in[$j + 1] = $val;
        }
    }

    /**
     * @param int[] $in
     * @return void
     */
    public static function get2(array &$in): void
    {
        for ($i = 1, $count = count($in); $i < $count; $i++) {
            for ($j = $i; $j >= 1 && $in[$j] < $in[$j - 1]; $j--) {
                [$in[$j], $in[$j-1]] = [$in[$j - 1], $in[$j]];
            }
        }
    }
}

// Элементы входной последовательности просматриваются по одному,
// и каждый новый поступивший элемент размещается в подходящее место среди ранее упорядоченных элементов.
