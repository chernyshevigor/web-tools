<?php

Knapsack::fractional();
echo PHP_EOL;
Knapsack::unbounded();
exit;

final class Knapsack
{
    public static function fractional(): void
    {
        $w = 7;
        $items = self::getItemsSortedByWorth();
        $weightSoFar = 0;
        $valueSoFar = 0;
        $currentItem = 0;
        while ($currentItem < count($items) && $weightSoFar !== $w) {
            if ($weightSoFar + $items[$currentItem]->getWeight() < $w) {
                $valueSoFar += $items[$currentItem]->getValue();
                $weightSoFar += $items[$currentItem]->getWeight();
            } else {
                $valueSoFar += (($w - $weightSoFar) / (float) $items[$currentItem]->getWeight())
                    * $items[$currentItem]->getValue();
                $weightSoFar = $w;
            }
            $currentItem++;
        }
        echo $valueSoFar;
    }

    /**
     * @return Item[]
     */
    private static function getItemsSortedByWorth(): array
    {
        $items = [
            new Item(4, 20),
            new Item(3, 18),
            new Item(2, 14)
        ];
        usort($items, static function (Item $a, Item $b) {
            return $a->valuePerUnitOfWeight() < $b->valuePerUnitOfWeight();
        });
        return $items;
    }

    public static function unbounded(): void
    {
        $vals = [14, 27, 44, 19];
        $weight = [6, 7, 9, 8];
        $w = 50;
        echo self::unboundedAlg($w, $weight, $vals, count($vals));
    }

    /**
     * @param int $w
     * @param int[] $weight
     * @param int[] $vals
     * @param int $n
     * @return float
     */
    public static function unboundedAlg(int $w, array $weight, array $vals, int $n): float
    {
        // maxratio will store the maximum value to weight
        $maxRatio = PHP_INT_MIN;
        for ($i = 0; $i < $n; $i++) {
            if (($vals[$i] / $weight[$i]) > $maxRatio) {
                $maxRatio = ($vals[$i] / $weight[$i]);
            }
        }
        // the item with the maximum value to weight ratio will be put into the knapsack repeatedly until full
        return $w * $maxRatio;
    }
}

class Item
{
    public function __construct(private int $weight, private int $value)
    {

    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function valuePerUnitOfWeight(): float
    {
        return $this->value / (float) $this->weight;
    }
}
