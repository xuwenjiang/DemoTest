<?php
include(__DIR__."/../App/Event/JackGoesToShaxianForChickenRice.php");
use PHPUnit\Framework\TestCase;

class TestEvent extends TestCase {
    /**
     * 这是一个不好的测试：
     * 你觉得这个函数doEvent执行了，结果是All done，而且完美的覆盖了代码
     */
    public function testDoEventBadly() {
        $event = new JackGoesToShaxianForChickenRice();
        $this->assertEquals("All done", $event->doEvent());
    }

    /**
     * 这是一个比较好的(unit test）测试：
     * 1. mock了jack，会执行Jack该做的事情：1). 移动，2).吃
     * 2. mock了shanxian，会执行沙县小吃该做的事情：1). 返回名字，2).提供事物（同时验证我们就要吃Chicken Rice）
     * 3. mock了event，该event执行getJack等，返回上述mock
     */
    public function testDoEventCorrectly() {
        // mock jack
        $mockedJack = $this->createMock(Person::class);

        $mockedJack->expects($this->once())
            ->method('moveTo')
            ->with($this->equalTo('A-Cafe'))
            ->willReturn(null);

        $mockedJack->expects($this->once())
            ->method('eat')
            ->with($this->equalTo('A-Food'))
            ->willReturn(null);

        // mock cafe
        $mockedCafe = $this->createMock(Cafe::class);

        $mockedCafe->expects($this->once())
            ->method('getName')
            ->willReturn('A-Cafe');

        $mockedCafe->expects($this->once())
            ->method('serve')
            ->with($this->equalTo('Chicken Rice'))
            ->willReturn('A-Food');

        // mock event
        $mockedEvent = $this->getMockBuilder(JackGoesToShaxianForChickenRice::class)
            ->enableOriginalConstructor()
            ->setMethods(['_getJack','_getShaxian'])
            ->getMock();

        $mockedEvent->expects($this->exactly(1))
            ->method('_getJack')
            ->will($this->returnValue($mockedJack));

        $mockedEvent->expects($this->exactly(1))
            ->method('_getShaxian')
            ->will($this->returnValue($mockedCafe));

        $this->assertEquals('All done', $mockedEvent->doEvent());
    }
}