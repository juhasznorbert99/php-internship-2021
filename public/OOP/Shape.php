<?php

    abstract class Shape
    {
        const DOMAIN = "mathematics";
        static $subdomain = "geometry";
        public $color;
        abstract function calculateArea();
        abstract function calculateLength();
        public function setColor($color){
            $this->color = $color;
        }
        public function getColor(){
            return $this->color;
        }
        static function getUsage(){
            echo static::DOMAIN.' ~ '.self::$subdomain;
        }
    }
    abstract class Polygon extends Shape{
        public $lengthArray = [];

        public function __construct($lenghts)
        {
            $this->lengthArray = $lenghts;
        }

        abstract function calculateArea();

        function calculateLength()
        {
            $sum=0;
            foreach ($this->lengthArray as $l){
                $sum+=$l;
            }
            return $sum;
        }
    }
    class Circle extends Shape{

        public $pi;
        public $r;

        public function __construct($r)
        {
            $this->pi = pi();
            $this->r = $r;
        }

        function calculateArea()
        {
            // TODO: Implement calculateArea() method.
            return $this->pi*$this->r*$this->r;
        }

        function calculateLength()
        {
            // TODO: Implement calculateLength() method.

            return $this->pi*$this->r*2;
        }
    }
    class Triangle extends Polygon{
        public function __construct($lenghts)
        {
            parent::__construct($lenghts);
            static::$subdomain = "3 side polygon";
        }

        function calculateArea()
        {
            $s = $this->calculateLength()/2;
            return sqrt($s*($s-$this->lengthArray[0])*($s-$this->lengthArray[1])*($s-$this->lengthArray[2]));
        }
    }
    class Rectangle extends Polygon{

        function calculateArea()
        {
            return $this->lengthArray[0]*$this->lengthArray[1];
        }
    }
    class Square extends Rectangle{

        public function calculateArea()
        {
            return $this->lengthArray[0]*$this->lengthArray[0];
        }
    }