<?php


class ObjectMutation
{
    /**
     * @param $object
     * @param string $outfile
     * @return mixed
     */
    public static function wrapAsTraceObserver($object, $outfile)
    {
        $wrapper = new ObservedObject($object);
        $wrapper->addObserver(new StackTraceObserver($outfile));
        return $wrapper;
    }
} 