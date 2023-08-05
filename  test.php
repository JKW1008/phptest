<?php
    class Car {

        public static $owner = "park";

        public $color;
        public $name;
        public $age;
        private $oil = "important";

        public function __construct($color, $name, $age) {
            $this->color = $color;
            $this->name = $name;
            $this->age = $age;
        }

        public function getOil(){
            return $this->oil;
        }

        public function setOil($data){
            $this->oil = $data;
        }
    }

    $morning = new Car("red", "morning", "3");

    echo $morning->color;
    echo "\n";
    echo $morning->color = 'blue';
    echo "\n";
    echo $morning->getOil();
    echo "\n";
    echo $morning->setOil("hello");
    echo $morning->getOil();
?>