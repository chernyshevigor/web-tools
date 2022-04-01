<?php

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
}