<?php

/**
 * @param int[] $nums
 * @param int $target
 * @return int[]
 */
function twoSum(array $nums, int $target): array
{
    $first = 0;
    $second = 0;
    $max = count($nums);
    for ($i = 0; $i < $max; $i++) {
        $first = $i;
        for ($j = $i + 1; $j < $max; $j++) {
            $second = $j;
            $sum = $nums[$i] + $nums[$j];
            if ($sum === $target) {
                break 2;
            }
        }
    }
    return [$first, $second];
}

print_r(twoSum([2,5,5,11],10));die;
