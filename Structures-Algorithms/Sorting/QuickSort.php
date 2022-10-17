<?php

$x = [1,3,5,8,17,11,2];
QuickSort::get($x, 0, count($x) - 1);
print_r($x);
exit;

/*
 * Worst O(n^2)
 * Average O(n log(n))
 * Best O(n log(n))
 */
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

    private static function partition(array &$in, int $left, int $right): int
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

    public static function quick(array $arr): array
    {
        if (count($arr) < 2) {
            return $arr;
        }
        $pivot = (int) (count($arr) / 2);
        $lessArr = [];
        $moreArr = [];

        for ($i = 0, $iMax = count($arr); $i < $iMax; $i++) {
            if ($i === $pivot) {
                continue;
            }
            if ($arr[$i] < $arr[$pivot]) {
                $lessArr[] = $arr[$i];
            } else {
                $moreArr[] = $arr[$i];
            }
        }
        return array_merge(self::quick($lessArr), [$arr[$pivot]], self::quick($moreArr));
    }
}

// other PHP example: https://www.w3resource.com/php-exercises/searching-and-sorting-algorithm/searching-and-sorting-algorithm-exercise-1.php

/*
Выберем некоторый опорный элемент(пивот). После этого перекинем все элементы, меньшие его, налево, а большие – направо.
Рекурсивно вызовемся от каждой из частей. В итоге получим отсортированный массив, так как каждый элемент меньше
опорного стоял раньше каждого большего опорного. Асимптотика: O(n logn) в среднем и лучшем случае, O(n^2).
Наихудшая оценка достигается при неудачном выборе опорного элемента.
Идем одновременно слева и справа, находим пару элементов, таких, что левый элемент больше опорного,
а правый меньше, и меняем их местами.
*/
