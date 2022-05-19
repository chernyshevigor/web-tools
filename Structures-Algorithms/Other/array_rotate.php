<?php

$arr = [ 1, 2, 3, 4, 5, 6, 7 ];
//leftRotateModulo($arr,2, count($arr));
//leftRotateReverse($arr,2, count($arr));
//leftRotateSwap1($arr, 2, count($arr));
$arr = leftRotateSwap2($arr, 2, count($arr));
print_r($arr);
die;

function leftRotate(&$arr, $d, $n): void
{
    for ($i = 0; $i < $d; $i++) {
        leftRotatebyOne($arr, $n);
    }
}

function leftRotatebyOne(&$arr, $n): void
{
    $temp = $arr[0];
    for ($i = 0; $i < $n - 1; $i++) {
        $arr[$i] = $arr[$i + 1];
    }
    $arr[$n-1] = $temp;
}

/*Function to left rotate arr[]
  of size n by d*/

/***/

/*Function to left rotate arr[] of size n by d*/
function leftRotateModulo(array &$arr, int $d, int $n): void
{
    $d = $d % $n;
    $gcd = gcd($d, $n);
    for ($i = 0; $i < $gcd; $i++) {
        /* move i-th values of blocks */
        $temp = $arr[$i];
        $j = $i;
         while (1) {
            $k = $j + $d;
            if ($k >= $n) {
                $k = $k - $n;
            }
            if ($k === $i) {
                break;
            }
            $arr[$j] = $arr[$k];
            $j = $k;
        }
        $arr[$j] = $temp;
    }
}

function gcd(int $a, int $b): int
{
    if ($b === 0) {
        return $a;
    } else {
        return gcd($b, $a % $b);
    }
}


/****/

//Reverse A, we get ArB = [2, 1, 3, 4, 5, 6, 7]
//Reverse B, we get ArBr = [2, 1, 7, 6, 5, 4, 3]
//Reverse all, we get (ArBr)r = [3, 4, 5, 6, 7, 1, 2]

function leftRotateReverse(array &$arr, int $d, int $n)
{
    if ($d === 0) {
        return;
    }
    $d = $d % $n;
    reverseArray($arr, 0, $d - 1);
    reverseArray($arr, $d, $n - 1);
    reverseArray($arr, 0, $n - 1);
}

function reverseArray(array &$arr, int $start, int $end)
{
    while ($start < $end) {
        $temp = $arr[$start];
        $arr[$start] = $arr[$end];
        $arr[$end] = $temp;
        $start++;
        $end--;
    }
}


/**************/

function leftRotateSwap1(array &$arr, int $d, int $n)
{
    leftRotateSwapRec1($arr, 0, $d, $n);
}

function leftRotateSwapRec1(array &$arr, int $i, int $d, int $n)
{
    if ($d === 0 || $d === $n) {
        return;
    }
    if ($n - $d === $d) {
        swap($arr, $i, $n - $d + $i, $d);
        return;
    }
    if ($d < $n - $d) {
        swap($arr, $i, $n - $d + $i, $d);
        leftRotateSwapRec1($arr, $i, $d, $n - $d);
    } else {
        swap($arr, $i, $d, $n - $d);
        leftRotateSwapRec1($arr, $n - $d + $i, 2 * $d - $n, $d);
    }
}

function swap(array &$arr, int $fi, int $si, int $d)
{
    for ($i = 0; $i < $d; $i++) {
        $temp = $arr[$fi + $i];
        $arr[$fi + $i] = $arr[$si + $i];
        $arr[$si + $i] = $temp;
    }
}

function leftRotateSwap2(array $arr, int $d, int $n)
{
    if ($d === 0 || $d === $n) {
        return;
    }
    //$i = $j = 0;
    //if ($d > $n) {
        //$d = $d % $n;
        $i = $d;
        $j = $n - $d;
    //}
    while ($i !== $j) {
        if ($i < $j) {
            $arr = swap2($arr, $d - $i, $d + $j - $i, $i);
            $j -= $i;
        } else {
            $arr = swap2($arr, $d - $i, $d, $j);
            $i -= $j;
        }
    }
    $arr = swap2($arr, $d - $i, $d, $i);
    return $arr;
}

function swap2(array $arr, int $fi, int $si, int $d)
{
    for ($i = 0; $i < $d; $i++) {
        $temp = $arr[$fi + $i];
        $arr[$fi + $i] = $arr[$si + $i];
        $arr[$si + $i] = $temp;
    }
    return $arr;
}
