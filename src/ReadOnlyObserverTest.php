<?php


class ReadOnlyObserverTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @expectedException NotSupportedException
     */
    public function readOnlyDisallowsSetterCalls()
    {
        $wrapper = ObjectMutation::wrapAsReadonlyObject($this);
        $wrapper->setName('name');
    }

    /**
     * @test
     */
    public function readOnlyAllowsGetterCalls()
    {
        $wrapper = ObjectMutation::wrapAsReadonlyObject($this);
        $wrapper->getName();
    }

}
