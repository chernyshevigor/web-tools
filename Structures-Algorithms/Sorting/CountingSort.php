<?php

$x = [3, 0, 2, 5, -1, 4, 1];
CountingSort::get($x, min($x), max($x));
print_r($x);
exit;

// O(n)
class CountingSort
{
    /**
     * @param int[] $in
     * @return void
     */
    public static function get(array &$in, int $min, int $max): void
    {
        $count = [];
        for ($i = $min; $i <= $max; $i++) {
            $count[$i] = 0;
        }
        foreach ($in as $number) {
            $count[$number]++;
        }
        $z = 0;
        for ($i = $min; $i <= $max; $i++) {
            while($count[$i]-- > 0 ) {
                $in[$z++] = $i;
            }
        }
    }
}
