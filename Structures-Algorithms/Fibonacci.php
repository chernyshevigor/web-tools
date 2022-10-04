<?php

final class Fibonacci
{
    public static function badCase(int $x): float
    {
        if ($x <= 1) {
            return $x;
        }
        return self::badCase($x - 1) + self::badCase($x - 2);
    }

    public static function betterCase(int $x): float
    {
        $out = [
            0 => 0,
            1 => 1,
        ];
        for ($i = 2; $i <= $x; $i++) {
            $out[$i] = $out[$i - 1] + $out[$i - 2];
        }
        return $out[$x];
    }

    public static function getFib(int $n): float
    {
        return round(pow((sqrt(5) + 1) / 2, $n) / sqrt(5));
    }

    public static function iterativeCase(int $x)
    {
        if ($x <= 1) {
            return 0;
        }
        $first = 0;
        $second = 1;
        echo $first . PHP_EOL;
        echo $second . PHP_EOL;
        $x -= 2;
        while ($x > 0) {
            echo ($first + $second) . PHP_EOL;
            $temp = $second;
            $second = $first + $second;
            $first = $temp;
            --$x;
        }
    }

    public static function iterativeCase2(int $x): array
    {
        if ($x <= 1) {
            return [];
        }
        $first = 0;
        $second = 1;
        $out = [$first, $second];
        $x -= 2;
        while ($x > 0) {
            $out[] = $first + $second;
            $temp = $second;
            $second = $first + $second;
            $first = $temp;
            --$x;
        }
        return $out;
    }
}

// ---------------------------------- //

function fibGen(int $n): Generator
{
    $cur = 1;
    $prev = 0;
    for ($i = 0; $i < $n; $i++) {
        yield $cur;
        $tmp = $cur;
        $cur = $prev + $cur;
        $prev = $tmp;
    }
}
foreach (fibGen(9) as $fib) {
    echo PHP_EOL . ' ' . $fib;
}

// ---------------------------------- //

function fibClosure(): Closure
{
    $f2 = 0;
    $f1 = 1;
    return static function() use (&$f2, &$f1) {
        $f = $f2;
        $f2 = $f1;
        $f1 = $f + $f1;
        return $f;
    };
}
$c = fibClosure();
for ($i = 0; $i < 10; $i++) {
    echo $c() . PHP_EOL;
}
