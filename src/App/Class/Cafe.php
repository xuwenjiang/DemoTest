<?php

Class Cafe {
    protected $_name = null;

    protected $_food = [];

    public function __construct($name, $food) {
        $this->_name = $name;
        $this->_food = $food;
    }

    public function getName() {
        return $this->_name;
    }

    public function serve($food) {
        if (in_array($food, $this->_food)) {
            return $food;
        }

        throw new Exception("do not server $food");
    }
}