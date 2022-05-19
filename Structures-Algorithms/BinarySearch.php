<?php

$x = [1,2,3,4,5,6,7,8,9,10];

print_r(
    BinarySearch::get($x, 6)
);

echo PHP_EOL;

print_r(
    BinarySearch::getRecursive($x, 6, min($x), max(($x)))
);

echo PHP_EOL;

var_dump(
    BinarySearch::getRecursive2($x, 6)
);

exit;

final class BinarySearch
{
    /**
     * @param int[] $sortedArray
     * @param int $key
     * @return int
     */
    public static function get(array $sortedArray, int $key): int
    {
        $low = 0;
        $high = count($sortedArray) - 1;
        while ($low <= $high) {
            $middle = $low + ($high - $low) / 2;
            if ($key < $sortedArray[$middle]) {
                $high = $middle - 1;
            } elseif ($key > $sortedArray[$middle]) {
                $low = $middle + 1;
            } else {
                return $middle;
            }
        }
        return -1;
    }

    /**
     * @param int[] $sortedArray
     * @param int $key
     * @param int $low
     * @param int $high
     * @return int
     */
    public static function getRecursive(array $sortedArray, int $key, int $low, int $high): int
    {
        $middle = $low + ($high - $low) / 2;
        if ($low > $high) {
            return -1;
        }
        if ($key === $sortedArray[$middle]) {
            return $middle;
        } elseif ($key < $sortedArray[$middle]) {
            return self::getRecursive($sortedArray, $key, $low, $middle - 1);
        } else {
            return self::getRecursive($sortedArray, $key, $middle + 1, $high);
        }
    }

    public static function getRecursive2(array $sortedArray, int $key): bool|int
    {
        if (count($sortedArray) === 0) {
            return false;
        }
        $middle = count($sortedArray) / 2;
        if ($key === $sortedArray[$middle]) {
            return true;
        } elseif ($key < $sortedArray[$middle]) {
            return self::getRecursive(array_slice($sortedArray, 0, $middle + 1), $key);
        } else {
            return self::getRecursive(array_slice($sortedArray, $middle, count($sortedArray) - 1), $key);
        }
        return false;
    }
}
