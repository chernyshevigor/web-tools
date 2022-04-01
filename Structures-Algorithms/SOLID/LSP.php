<?php

/**
 * Liskov substitution principle
 */

// Bad example

class Rectangle
{
    public function __construct(protected int $width = 0, protected int $height = 0)
    {

    }

    public function setHeight(int $height): void
    {
        $this->height = $height;
    }

    public function setWidth(int $width): void
    {
        $this->width = $width;
    }

    public function getArea(): int
    {
        return $this->height * $this->width;
    }

    public function render(int $area): void
    {
        //...
    }
}

class Square extends Rectangle
{
    public function setHeight(int $height): void
    {
        $this->height = $height;
        $this->width = $height;
    }

    public function setWidth(int $width): void
    {
        $this->width = $width;
        $this->height = $width;
    }

}

/* @var Rectangle[] $rectangles */
$rectangles = [
    new Rectangle(), new Rectangle(), new Square()
];

foreach ($rectangles as $rectangle) {
    $rectangle->setWidth(4);
    $rectangle->setHeight(5);
    $area = $rectangle->getArea(); // ups. returns 25 for Square - must be 20
    $rectangle->render($rectangle->getArea());
}

// Better example

abstract class Shape
{
    public function setColor(string $color): void
    {
        $this->color = $color;
    }
    public function render(int $area): void
    {
        //...
    }
    abstract public function getArea(): int;
}

class Rectangle extends Shape
{
    public function __construct(protected int $width = 0, protected int $height = 0)
    {

    }

    public function getArea(): int
    {
        return $this->height * $this->width;
    }
}

class Square extends Shape
{
    public function __construct(protected int $length = 0)
    {

    }

    public function getArea(): int
    {
        return $this->length * $this->length;
    }
}

/* @var Rectangle[] $rectangles */
$shapes = [
    new Rectangle(4, 5), new Rectangle(6, 7), new Square(4)
];

foreach ($shapes as $shape) {
    $shape->render($shape->getArea());
}
