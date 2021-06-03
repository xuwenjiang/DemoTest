<?php
include(__DIR__."/../Class/Person.php");
include(__DIR__."/../Class/Cafe.php");

class JackGoesToShaxianForChickenRice {
    protected $_jack = null;
    protected $_shaxian = null;

    public function __construct() {
        $this->_jack = new Person('Jack');
        $this->_shaxian = new Cafe('Shaxian', ['Chicken Rice', 'Pork Rice', 'Hundun', 'Chicken Noodle']);
    }

    public function doEvent() {
        $shanxian = $this->_getShaxian();
        $jack = $this->_getJack();
        
        // Jack moves to Shaxian
        $cafeName = $shanxian->getName();
        $jack->moveTo($cafeName);
        
        // order food from Shaxian
        $food = $shanxian->serve('Chicken Rice');

        // Jack eats food;
        $jack->eat($food);

        return "All done";
    }

    public function _getJack() {
        return $this->_jack;
    }

    public function _getShaxian() {
        return $this->_shaxian;
    }
}
