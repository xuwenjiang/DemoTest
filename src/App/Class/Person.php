<?php

Class Person {
    protected $_name = null;
    protected $_place = null;

    public function __construct($name) {
        $this->_name = $name;
    }

    public function moveTo($place) {
        $this->_place = $place;
    }

    public function getName() {
        return $this->_name;
    }

    public function whereAmI() {
        return $this->_place;
    }

    public function eat($food) {
        return "$this->_name is eating $food now";
    }
}