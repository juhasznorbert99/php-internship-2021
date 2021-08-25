<?php
    require "Shape.php";
    /*
    $square = new Shape(5,7);
    $area = $square->calculateArea();
    $perimeter = $square->calculateLength();
    echo $area."</br>";
    echo $perimeter."</br>";
    $square->setColor("red");
    echo $square->getColor();*/
    $circle = new Circle(5);
    echo $circle->calculateLength()."<br>";
    echo $circle->calculateArea()."<br>";
    $triangle = new Triangle([3,4,5]);
    echo $triangle->calculateLength()."<br>";
    echo $triangle->calculateArea()."<br>";
    $rectangle = new Rectangle([3,4,3,4]);
    echo $rectangle->calculateLength()."<br>";
    echo $rectangle->calculateArea()."<br>";
    echo $triangle->getUsage();