<?php

$x = [1, 34, 5, 8, 17, 11, 7];
BubbleSort::get($x);
print_r($x);
exit;

// O(n^2)
class BubbleSort
{
    /**
     * @param int[] $in
     * @return void
     */
    public static function get(array &$in): void
    {
        $size = count($in) - 1;
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size - $i; $j++) {
                $k = $j + 1;
                if ($in[$k] < $in[$j]) {
                    [$in[$j], $in[$k]] = [$in[$k], $in[$j]];
                }
            }
        }
    }

    /**
     * @param int[] $in
     * @return int[]
     */
    public static function get2(array $in): array
    {
        do {
            $swapped = false;
            for ($i = 0, $c = count($in) - 1; $i < $c; $i++) {
                if($in[$i] > $in[$i + 1]) {
                    // list($in[$i + 1], $in[$i]) = [$in[$i], $in[$i + 1]];
                    [$in[$i + 1], $in[$i]] = [$in[$i], $in[$i + 1]];
                    $swapped = true;
                }
            }
        } while ($swapped);
        return $in;
    }
}
