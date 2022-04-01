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
}
