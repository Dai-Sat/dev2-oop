<?php

class Fruit
{
    public $name;
    public $color;
    // private $weight;

    public function __construct($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    public function intro()
    {
        return "The fruit is $this->name and the color is $this->color.";
    }

    protected function intro2()
    {
        echo "This is intro 2.";
    }
}

# Inheritance
// Strawberry is inherited from Fruit
// Strawberry can be called sub-class or child-class
// child class will inherit the public and protected properties and methods from the parent class
class Strawberry extends Fruit
{
    public function msg()
    {
        echo "Am I a fruit or berry? <br>";

        $this->intro2();
    }
}

// $strawberry is the object of the child class
$strawberry = new Strawberry("Strawberry", "red");

echo $strawberry->intro() . "<br>";
$strawberry->msg() . "<br>";

# NOT OK or ERROR
// echo $strawberry->intro2() . "<br>";




// Instantiating a class

// $mango = new Fruit;

// $mango->name = "Mango";

// not permitted
// $mango->color = "Yellow";
// $mango->weight = 300;

// output
// echo "Name: " . $mango->name . "<br>";

# Inheritance
