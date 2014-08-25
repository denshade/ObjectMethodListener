<?php


interface Observer
{
    /**
     * @param $object
     * @param string $methodName
     * @return void
     */
    public function onInterest($object, $methodName);
}