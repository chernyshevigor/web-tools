<?php

/**
 * Open–closed principle
 */

// Bad example

class IceCreamMaker
{
    private static array $iceCreamFlavours = ['chocolate', 'milk'];

    public static function make(string $flavour): IceCream
    {
        if (in_array($flavour, self::$iceCreamFlavours, true)) {
            return new IceCream($flavour);
        } else {
            throw new \RuntimeException('Epic fail');
        }
    }
}

class IceCream
{
    public function __construct(private string $flavour)
    {
    }
}

// Better example

class IceCreamMaker
{
    private static array $iceCreamFlavours = ['chocolate', 'milk'];

    public static function make(string $flavour): IceCream
    {
        if (in_array($flavour, self::$iceCreamFlavours, true)) {
            return new IceCream($flavour);
        } else {
            throw new \RuntimeException('Epic fail');
        }
    }

    public static function addFlavour(string $flavour): void
    {
        self::$iceCreamFlavours[] = $flavour;
    }
}
