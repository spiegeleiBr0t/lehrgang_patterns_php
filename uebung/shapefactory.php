<?php

interface shape{
    public function draw():void;
}

class rectangle implements shape{
    public function draw():void
    {
        print("□".PHP_EOL);
    }
}
class circle implements shape{
    public function draw():void
    {
        print("◎".PHP_EOL);
    }
}
class diamond implements shape{
    public function draw():void
    {
        print("◇".PHP_EOL);
    }
}
class dimson implements shape{
    public function draw():void
    {
        print("omg u requested a ◚ dimson".PHP_EOL);
    }
}

class shapeFactory{
    public const CIRCLE = 'circle';
    public const RECTANGLE = 'rectangle';
    public const DIAMOND = 'diamond';
    public const DIMSON = 'dimson';
    public static function create(string $type):shape
    {
       return match ($type) {
            self::CIRCLE => new circle(),
            self::RECTANGLE => new rectangle(),
            self::DIAMOND => new diamond(),
            self::DIMSON => new dimson(),
            default => throw new InvalidArgumentException("Unknown shape type '$type'"),
        };
    }
}


// Beispielnutzung
$factory = new ShapeFactory();

$circle = $factory->create(ShapeFactory::CIRCLE);
$circle->draw();  // Output: Drawing a Circle

$rectangle = $factory->create(ShapeFactory::RECTANGLE);
$rectangle->draw();  // Output: Drawing a Rectangle

$diamond = $factory->create(ShapeFactory::DIAMOND);
$diamond->draw();  // Output: Drawing a Diamond

$dimson = $factory->create(ShapeFactory::DIMSON);
$dimson->draw();  // Output: Drawing a Diamond
