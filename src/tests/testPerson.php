<?php
include("/var/www/Class/Person.php");

use PHPUnit\Framework\TestCase;

/**
 * 基本功能测试，执行了代码，相当于黑盒，我拿到对象，返回需要的值。
 */
class TestPerson extends TestCase {
    public function testGetName(){
        $person = new Person('some-name');
        $this->assertEquals('some-name',$person->getName());
    }

    public function testTestWhereAmI(){
        $person = new Person('some-name');
        $person->moveTo('Somewhere');
        $this->assertEquals('Somewhere', $person->whereAmI());
    }
}