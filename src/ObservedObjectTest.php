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
}
