<?php
include(__DIR__."/../Class/Person.php");
include(__DIR__."/../Class/Cafe.php");

class JackGoesToShaxianForChickenRice {
    
    public function doEvent() {
        $jack = $this->getJack();
        $shanxian = $this->getShaxian();
        
        // Jack moves to Shaxian
        $cafeName = $shanxian->getName();
        $jack->moveTo($cafeName);
        
        // order food from Shaxian
        $food = $shanxian->serve('Chicken Rice');

        // Jack eats food;
        $jack->eat($food);

        return "All done";
    }

    /**
     * @return Person
     */
    public function getJack() {
        return new Person('Jack');
    }

    public function getShaxian() {
        return new Cafe('Shaxian', ['Chicken Rice', 'Chicken Noodle', 'Pork Rice', 'Hundun']);
    }
}
