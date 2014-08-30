<?php


class StackTraceObserverTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function verifyStackTraceWritten()
    {
        $e = new \Exception();
        $wrapper = ObjectMutation::wrapAsTraceObserver($e, 'a.log');
        /**
         * @var $wrapper Exception
         */
        $wrapper->getCode();

        $fileContents = file_get_contents('a.log');
        $this->assertNotEmpty($fileContents, 'The log file should contain data.');
        unlink('a.log');
    }
}
 