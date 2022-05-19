<?php

$arr = [-1, -1, 6, 1, 9, 3, 2, -1, 4, -1];
//fixArray1($arr, count($arr));
fix2($arr);
print_r($arr);

function fixArray(array &$arr, int $n): void
{
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            // Check is any $arr[$j] exists such that $arr[$j] is equal to i
            if ($arr[$j] === $i) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$i];
                $arr[$i] = $temp;
                break;
            }
        }
    }
    for ($i = 0; $i < $n; $i++) {
        if ($arr[$i] !== $i) {
            $arr[$i] = -1;
        }
    }
}

function fixArray2(array &$arr, int $len): void
{
    for ($i = 0; $i < $len; $i++) {
        if ($arr[$i] !== -1 && $arr[$i] !== $i) {
            $x = $arr[$i];
            // check if desired place is not vacate
            while ($arr[$x] !== -1 && $arr[$x] !== $x) {
                // store the value from desired place
                $y = $arr[$x];
                // place the x to its correct position
                $arr[$x] = $x;
                // now y will become x, now search the place for x
                $x = $y;
            }
            // place the x to its correct position
            $arr[$x] = $x;
            // check if while loop hasn't set the correct value at A[i]
            if ($arr[$i] !== $i) {
                // if not then put -1 at the vacated place
                $arr[$i] = -1;
            }
        }
    }
}

function fix(array &$arr): void
{
    $set = new \Ds\Set();
    for ($i = 0, $iMax = count($arr); $i < $iMax; $i++) {
        $set->add($arr[$i]);
    }
    for ($i = 0, $iMax = count($arr); $i < $iMax; $i++) {
        if ($set->contains($i)) {
            $arr[$i] = $i;
        } else {
            $arr[$i] = -1;
        }
    }
}

function fix2(array &$arr): void
{
    for ($i = 0, $iMax = count($arr); $i < $iMax; $i++) {
        if ($arr[$i] >= 0 && $arr[$i] !== $i) {
            $ele = $arr[$arr[$i]];
            $arr[$arr[$i]] = $arr[$i];
            $arr[$i] = $ele;
        } else {
            $i++;
        }
    }
}
