<?php


class ObservedObjectTest extends PHPUnit_Framework_TestCase implements Observer
{
    /**
     * @var boolean
     */
    private $hasRun = false;
    /**
     * @test
     */
    public function registerMyFunction()
    {
        $e = new \Exception();
        $wrapper = new ObservedObject($e);
        $wrapper->addObserver($this);
        /**
         * @var Exception $wrapper
         */
        $wrapper->getCode();
        $this->assertTrue($this->hasRun);
    }

    public function onInterest($object, $method)
    {
        $this->hasRun = true;
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function validatePrimitiveWrappingThrows()
    {
        new ObservedObject(2);
    }

    /**
     * @test
     */
    public function validateAddRemove()
    {
        $wrapper = new ObservedObject(new DateTime());
        $observer = new ReadOnlyObserver();
        $wrapper->addObserver($observer);
        $this->assertCount(1, $wrapper->getObservers());
        $wrapper->addObserver($observer);
        $this->assertCount(2, $wrapper->getObservers());
        $wrapper->removeObserver($observer);
        $this->assertCount(0, $wrapper->getObservers());
    }
}
