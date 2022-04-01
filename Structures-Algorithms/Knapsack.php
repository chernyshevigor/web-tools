<?php

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
