<?php

$x = [1, 3, 5, 8, 17, 11, 2];
MergeSort::get($x);
print_r($x);

$x = [1, 3, 5, 8, 17, 11, 2];
$y = MergeSortRecursive::get($x);
print_r($y);
exit;

/*
 * Worst O(n log(n))
 * Average O(n log(n))
 * Best O(n log(n))
 */
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
            $middle = floor(($low + $high) / 2);
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

class MergeSortRecursive
{
    /**
     * @param int[] $in
     */
    public static function get(array $in): array
    {
        if (count($in) <= 1) {
            return $in;
        }
        $out = [];
        $middle = floor(count($in) / 2);
        $leftArr = self::get(array_slice($in,0, $middle));
        $rightArr = self::get(array_slice($in, $middle));
        $leftIdx = 0;
        $rightIdx = 0;
        while ($leftIdx < count($leftArr) && $rightIdx < count($rightArr)) {
            if ($leftArr[$leftIdx] < $rightArr[$rightIdx]) {
                $out[] = $leftArr[$leftIdx];
                $leftIdx++;
            } else {
                $out[] = $rightArr[$rightIdx];
                $rightIdx++;
            }
        }
        return array_merge($out, array_slice($leftArr, $leftIdx), array_slice($rightArr, $rightIdx));
    }
}

class MergeSort_LinkedList
{
    public static function get(SplDoublyLinkedList $in): SplDoublyLinkedList
    {
        if ($in->isEmpty()) {
            return $in;
        } elseif ($in->top() === null) {
            return $in;
        }
        [$leftHalf, $rightHalf] = self::split($in);
        return self::merge(self::get($leftHalf), self::get($rightHalf));
    }

    /**
     * @param SplDoublyLinkedList $in
     * @return SplDoublyLinkedList[]
     */
    private static function split(SplDoublyLinkedList $in): array
    {

    }

    private static function merge(SplDoublyLinkedList $left, SplDoublyLinkedList $right): SplDoublyLinkedList
    {

    }
}

// other PHP example: https://www.w3resource.com/php-exercises/searching-and-sorting-algorithm/searching-and-sorting-algorithm-exercise-17.php

/*
Сортировка, основанная на парадигме «разделяй и властвуй». Разделим массив пополам, рекурсивно отсортируем части,
после чего выполним процедуру слияния: поддерживаем два указателя, один на текущий элемент первой части,
второй – на текущий элемент второй части. Из этих двух элементов выбираем минимальный, вставляем в ответ и
сдвигаем указатель, соответствующий минимуму. Слияние работает за O(n), уровней всего logn,
поэтому асимптотика O(n logn). Эффективно заранее создать временный массив и передать его в качестве аргумента функции.
Эта сортировка рекурсивна, как и быстрая, а потому возможен переход на квадратичную при небольшом числе элементов.
*/
