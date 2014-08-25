<?php


class ReadOnlyObserver implements Observer
{

    /**
     * @param $object
     * @param string $methodName
     */
    public function onInterest($object, $methodName)
    {
        if (mb_substr($methodName,0,3) === "set")
        {
            throw new NotSupportedException("The method call $methodName cannot be called in a readOnly context.");
        }
    }
}